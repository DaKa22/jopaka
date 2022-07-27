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
        return view('clientes.cliente', ['clientes' => $consulta]);
        // return $consulta;
        // return response()->json($clientes=cliente::paginate(2));

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
                $cliente=cliente::find($request['id']);
                if(!$cliente) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe El Cliente.'
                    ]);
                }
                $cliente->update([
                    'identificacion'=>$request['identificacion'],
                    'nombres'=>$request['nombres'],
                    'apellidos'=>$request['apellidos'],
                    'telefono'=>$request['telefono'],
                    'direccion'=>$request['direccion'],
                ]);
                if($cliente->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El Cliente se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El Cliente NO se  Actualizo Correctamente'
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
                $cliente=cliente::create([
                    'identificacion'=>$request['identificacion'],
                    'nombres'=>$request['nombres'],
                    'apellidos'=>$request['apellidos'],
                    'telefono'=>$request['telefono'],
                    'direccion'=>$request['direccion'],
                ]);
                if($cliente){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El Cliente se creo correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El Cliente NO se creo correctamente'
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
            $consulta=cliente::find($id);


            if(!$consulta){
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'Cliente NO fue encontrado'
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
            $cliente=cliente::find($id);
            if (!$cliente) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el cliente'
                ]);
            }
            if($cliente->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'El Cliente se Elimino Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'El Cliente NO se Elimino Correctamente'
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
