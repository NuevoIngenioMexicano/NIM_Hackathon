<?php

namespace App\Http\Controllers;

use App\Trabajador;
use App\Oficio;
use App\Trabajo;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrabajadorController extends Controller
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

    //
    public function login(Request $request){
        try {
            $name = $request->input('username');
            $secret = $request->input('password');
            $model = Trabajador::where(array('email' => $name, 'password' => $secret))->firstOrFail();
            return $model->toJson();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Usuario/Password Incorrectos'
                ]
            ], 404);
        }
    }

    // Agrega trabajador
    public function signup(Request $request) {
        try {
            // Datos
            $nombre = $request->input('nombre');
            $telefono = $request->input('telefono');
            $direccion = $request->input('direccion');
            $experiencia = $request->input('experiencia');

            $oficios = preg_split('/,/', $request->input('oficios'));
            if (!$request->hasFile('documento')) {
                throw new \Exception('No se subio ninguna foto');
            }
            $documento = $request->file('documento')->getClientOriginalName();
            
            $trabajador = new Trabajador;
            $trabajador->nombre = $nombre;
            $trabajador->telefono = $telefono;
            $trabajador->direccion = $direccion;
            $trabajador->experiencia = $experiencia;
            $trabajador->documento = $documento;
            $trabajador->save();

            //los oficios
            foreach($oficios as $oficio) {
                $Oficio = new Oficio;
                $Oficio->oficio = $oficio;
                $Oficio->nim_trabajadores_id = $trabajador->id;
                $Oficio->save();
            }

            // subimos el archivo a nuestro directorio
            $request->file('documento')->move(app()->basePath('public/images'), $request->file('documento')->getClientOriginalName());

            return $trabajador;
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

    // Califica a un trabajador
    public function reviewTrabajador(Request $request) {
        try {
            $review = new Review;
            $review->nim_trabajadores_id = $request->input('idTrabajador');
            $review->nim_trabajos_id = $request->input('idTrabajo');
            $review->comentario = $request->input('comentario');
            $review->calificacion = $request->input('calificacion');
            $review->save();

            // Una vez que se califica, el trabajo se da por terminado.
            $trabajo = Trabajo::find($request->input('idTrabajo'));
            $trabajo->status = 3;
            $trabajo->save();

            return response()->json([
                'message' => 'Gracias por calificar, esto servira en un futuro para encontrar mejores trabajadores'
            ]);
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

    // Busca a los candidatos mas idoneos
    public function searchTrabajadores(Request $request) {
        try {
            $trabajadores = [];
            $Review = Review::orderBy('calificacion', 'desc')->get();
            foreach($Review as $review) {
                $trabajadores[] = $review->trabajador;
            }
            return $trabajadores;
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