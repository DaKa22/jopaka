<?php

namespace App\Http\Controllers;

use App\Models\factura;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=factura::all();
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
            $factura=factura::create([
                'fecha'=>$request['fecha'],
                'clientes_id'=>$request['clientes_id'],
                'total_factura'=>$request['total_factura'],
            ]);



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $factura
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
            $consulta=factura::where('id',$id)->first();



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
            $factura=factura::where('id',$id)->first();
            if (!$factura) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el factura'
                ]);
            }
            $factura->update([
                'fecha'=>$request['fecha'],
                'clientes_id'=>$request['clientes_id'],
                'total_factura'=>$request['total_factura'],
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $factura
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
            $factura=factura::where('id',$id)->first();
            if (!$factura) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el factura'
                ]);
            }
            if(!$factura->delete()){
                return response()->json([
                    'status'=>'ERROR',
                    'mensaje'=>'El factura no fue Eliminado correctamente'
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
                'mensaje'=>'El factura  fue Eliminado correctamente'

            ]);
        }

    }
}
