<?php

namespace App\Http\Controllers;

use App\Models\detalle_factura;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Detalle_FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=detalle_factura::all();
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
            $detalle_factura=detalle_factura::create([
                'facturas_id'=>$request['facturas_id'],
                'productos_id'=>$request['productos_id'],
                'cantidad_pedida'=>$request['cantidad_pedida'],
                'precio_total'=>$request['precio_total'],
            ]);



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $detalle_factura
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
            $consulta=detalle_factura::where('id',$id)->first();



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
            $detalle_factura=detalle_factura::where('id',$id)->first();
            if (!$detalle_factura) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el detalle_factura'
                ]);
            }
            $detalle_factura->update([
                'facturas_id'=>$request['facturas_id'],
                'productos_id'=>$request['productos_id'],
                'cantidad_pedida'=>$request['cantidad_pedida'],
                'precio_total'=>$request['precio_total'],
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $detalle_factura
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
            $detalle_factura=detalle_factura::where('id',$id)->first();
            if (!$detalle_factura) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el detalle_factura'
                ]);
            }
            if(!$detalle_factura->delete()){
                return response()->json([
                    'status'=>'ERROR',
                    'mensaje'=>'El detalle_factura no fue Eliminado correctamente'
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
                'mensaje'=>'El detalle_factura  fue Eliminado correctamente'

            ]);
        }

    }
}
