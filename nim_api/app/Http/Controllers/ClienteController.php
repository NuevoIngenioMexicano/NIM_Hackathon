<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Trabajo;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // Login
    public function login(Request $request){
        try {
            $name = $request->input('username');
            $secret = $request->input('password');
            $model = Cliente::where(array('email' => $name, 'password' => $secret))->firstOrFail();
            return $model->toJson();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Usuario/Password Incorrectos'
                ]
            ], 404);
        }
    }
    // Agrega usuario
    public function signup(Request $request) {
        try {
            // Datos
            $nombre = $request->input('nombre');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            $direccion = $request->input('direccion');
            $password = $request->input('password');
            if (!$request->hasFile('documento')) {
                throw new \Exception('No se subio ninguna foto');
            }
            $documento = $request->file('documento')->getClientOriginalName();
            // Que no exista otro usuario con el mismo correo
            $count = Cliente::where(array('email' => $email))->count();
            if ($count > 0) {
                throw new \Exception('El usuario ya existe');
            } else {
                $cliente = new Cliente;
                $cliente->nombre = $nombre;
                $cliente->email = $telefono;
                $cliente->password = $password;
                $cliente->telefono = $telefono;
                $cliente->direccion = $direccion;
                $cliente->documento = $documento;
                $cliente->save();

                // subimos el archivo a nuestro directorio
                $request->file('documento')->move(app()->basePath('public/images'), $request->file('documento')->getClientOriginalName());

                return $cliente;
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ], 404);
        }
    }
    // Busca todos los trabajos del cliente.
    public function getTrabajos($id = 0) {
        try {
            if ($id == 0) {
                throw new \Exception('No se encontraron trabajos publicados de este cliente');
            }
            
            return Trabajo::where(array("nim_clientes_id" => $id))->get();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ], 404);
        }
    }

}