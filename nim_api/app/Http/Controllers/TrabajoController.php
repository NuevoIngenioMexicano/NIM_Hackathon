<?php

namespace App\Http\Controllers;

use App\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
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
    // Postea un nuevo trabajo
    public function postTrabajos(Request $request){
        try {
            $clienteId = $request->input('cid');
            if ($clienteId == "") {
                throw new \Exception('No se encontro el cliente.');
            }

            $trabajo = new Trabajo;
            $trabajo->nim_clientes_id = $clienteId;
            $trabajo->titulo = $request->input('titulo');
            $trabajo->descripcion = $request->input('descripcion');
            $trabajo->fecha_publicacion = $request->input('fecha_publicacion');
            $trabajo->fecha_expiracion = $request->input('fecha_expiracion');
            $trabajo->status = 1; // Nuevo= 1 Proceso=2 Terminado=3
            $trabajo->save();

            return $trabajo;
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

    // Obtiene todos los trabajos
    public function getTrabajos() {
        try {
            return Trabajo::all();
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

    public function updateTrabajo(Request $request, $id) {
        try {
            $clienteId = $request->input('cid');
            if ($clienteId == "") {
                throw new \Exception('No se encontro el cliente.');
            }

            $trabajo = new Trabajo::find($id);
            $trabajo->status = 2; // Nuevo= 1 Proceso=2 Terminado=3
            $trabajo->save();

            return $trabajo;
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