<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Barryvdh\DomPDF\Facade\Pdf;
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
        // $consulta=producto::all();
        $consulta=producto::with('proveedores')->get();
        return view('productos.producto', ['productos' => $consulta]);
        // return $consulta;
    }
    public function imprimir()
    {
        $producto=producto::all();
        $pdf= Pdf::loadView('productos.pdf',['productos' => $producto]);
        $pdf->setPaper('A3', 'landscape');
        // $pdf->setPaper('A3');
        return $pdf->download('productos.pdf');
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
                $producto=producto::find($request['id']);
                if(!$producto) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe El producto.'
                    ]);
                }
                $producto->update([
                    'descripcion'=>$request['descripcion'],
                    'proveedores_id'=>$request['proveedores_id'],
                    'precio_costo'=>$request['precio_costo'],
                    'precio_venta'=>$request['precio_venta'],
                    'foto'=>$request['foto'],
                ]);
                if($producto->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El producto se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El producto NO se  Actualizo Correctamente'
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
                $producto=producto::create([
                    'descripcion'=>$request['descripcion'],
                    'proveedores_id'=>$request['proveedores_id'],
                    'precio_costo'=>$request['precio_costo'],
                    'precio_venta'=>$request['precio_venta'],
                    'foto'=>$request['foto'],
                ]);
                if($producto){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El producto se creo correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El producto NO se creo correctamente'
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
            $consulta=producto::find($id);



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
            $producto=producto::find($id);
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
            $producto=producto::find($id);
            if (!$producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el producto'
                ]);
            }
            if($producto->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'El producto se Elimino Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'El producto NO se Elimino Correctamente'
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
