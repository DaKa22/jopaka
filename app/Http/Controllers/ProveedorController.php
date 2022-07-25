<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=proveedor::all();
        return $consulta;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $proveedor=proveedor::create([
                'nombre'=>$request['nombre'],
                'nit'=>$request['nit'],
                'telefono'=>$request['telefono'],
                'direccion'=>$request['direccion'],
            ]);



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $proveedor
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $consulta=proveedor::where('id',$id)->first();



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $consulta
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $proveedor=proveedor::where('id',$id)->first();
            if (!$proveedor) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el proveedor'
                ]);
            }
            $proveedor->update([

                'nombre'=>$request['nombre'],
                'nit'=>$request['nit'],
                'telefono'=>$request['telefono'],
                'direccion'=>$request['direccion'],
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $proveedor
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $proveedor=proveedor::where('id',$id)->first();
            if (!$proveedor) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el proveedor'
                ]);
            }
            if(!$proveedor->delete()){
                return response()->json([
                    'status'=>'ERROR',
                    'mensaje'=>'El proveedor no fue Eliminado correctamente'
                ]);
            }

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'ELIMINADO',
                'mensaje'=>'El proveedor  fue Eliminado correctamente'

            ]);
        }

    }
}
