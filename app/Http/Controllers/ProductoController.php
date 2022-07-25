<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=producto::all();
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
            $producto=producto::create([
                'descripcion'=>$request['descripcion'],
                'proveedores_id'=>$request['proveedores_id'],
                'precio_costo'=>$request['precio_costo'],
                'precio_venta'=>$request['precio_venta'],
                'foto'=>$request['foto'],
            ]);



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $producto
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
            $consulta=producto::where('id',$id)->first();



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
            $producto=producto::where('id',$id)->first();
            if (!$producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el producto'
                ]);
            }
            $producto->update([
                'descripcion'=>$request['descripcion'],
                'proveedores_id'=>$request['proveedores_id'],
                'precio_costo'=>$request['precio_costo'],
                'precio_venta'=>$request['precio_venta'],
                'foto'=>$request['foto'],
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }finally{
            return response()->json([
                'status' => 'OK',
                'message' => $producto
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
            $producto=producto::where('id',$id)->first();
            if (!$producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el producto'
                ]);
            }
            if(!$producto->delete()){
                return response()->json([
                    'status'=>'ERROR',
                    'mensaje'=>'El producto no fue Eliminado correctamente'
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
                'mensaje'=>'El producto  fue Eliminado correctamente'

            ]);
        }

    }
}
