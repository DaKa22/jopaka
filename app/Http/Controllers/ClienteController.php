<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=cliente::all();
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
            $cliente=cliente::create([
                'identificacion'=>$request['identificacion'],
                'nombres'=>$request['nombres'],
                'apellidos'=>$request['apellidos'],
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
                'message' => $cliente
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
            $consulta=cliente::where('id',$id)->first();



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
            $cliente=cliente::where('id',$id)->first();
            if (!$cliente) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el cliente'
                ]);
            }
            $cliente->update([

                'identificacion'=>$request['identificacion'],
                'nombres'=>$request['nombres'],
                'apellidos'=>$request['apellidos'],
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
                'message' => $cliente
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
            $cliente=cliente::where('id',$id)->first();
            if (!$cliente) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el cliente'
                ]);
            }
            if(!$cliente->delete()){
                return response()->json([
                    'status'=>'ERROR',
                    'mensaje'=>'El Cliente no fue Eliminado correctamente'
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
                'mensaje'=>'El Cliente  fue Eliminado correctamente'

            ]);
        }

    }
}
