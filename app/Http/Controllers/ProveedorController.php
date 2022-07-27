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
        return view('proveedores.proveedor', ['proveedores' => $consulta]);

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
        if($request['id']){
            try {
                $proveedor=proveedor::find($request['id']);
                if(!$proveedor) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe El proveedor.'
                    ]);
                }
                $proveedor->update([
                    'nombre'=>$request['nombre'],
                    'nit'=>$request['nit'],
                    'telefono'=>$request['telefono'],
                    'direccion'=>$request['direccion'],
                ]);
                if($proveedor->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El Proveedor se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El Proveedor NO se  Actualizo Correctamente'
                    ]);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => $e->getMessage()
                ]);
            }
        }else{
            try {
                $proveedor=proveedor::create([
                    'nombre'=>$request['nombre'],
                    'nit'=>$request['nit'],
                    'telefono'=>$request['telefono'],
                    'direccion'=>$request['direccion'],
                ]);
                if($proveedor){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El Proveedor se creo correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El Proveedor NO se creo correctamente'
                    ]);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => $e->getMessage()
                ]);
            }
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
            $consulta=proveedor::find($id);
            if(!$consulta){
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'Proveedor NO fue encontrado'
                ]);
            }


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
