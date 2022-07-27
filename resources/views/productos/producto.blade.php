@extends('layouts.app')
@section('titulo') Productos @endsection
@section('content')

<div class="card-body ">
    <div class="page-title-box bg-danger">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    @if (session()->has('created') && session()->has('mensaje'))
                            <div class="alert {{ session('created') == 1 ? 'alert-success' : 'alert-danger' }} mb-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif
                    <h4 class="page-title mb-1">TABLA DE PRODUCTOS</h4>

                </div>
                <div class="col-md-4">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearProducto">
                                <i class="mdi mdi-plus mr-1"></i> Agregar
                            </button>
                            {{-- <a href="{{route('pdf.producto')}}"> --}}
                                <button class="btn btn-light btn-rounded" type="button" >
                                    <i class="mdi mdi-plus mr-1"></i> PDF
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="table-responsive table-bordered">
        <table class="table table-centered table-hover mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Proveevor_Id</th>
                    <th scope="col">Precio Costo</th>
                    <th scope="col">Precio Venta</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <th scope="row">
                        {{$producto['id']}}
                    </th>
                    <td>
                        <img src="{{$producto['foto']}}" alt="" height=34 >

                    </td>
                    <td>{{$producto['descripcion']}}</td>
                    <td>
                        {{$producto['proveedores']['nombre']}}
                    </td>
                    <td>{{$producto['precio_costo']}}</td>
                    <td>{{$producto['precio_venta']}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                <i class="mdi mdi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="updateProducto({{ $producto['id'] }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deleteProducto({{ $producto['id'] }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                <i class="mdi mdi-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal para crear Users o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="foto">Foto</label>
                            <input type="text" class="form-control" id="foto" name="foto" placeholder="Digite el url de la foto " required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba La Descripcion" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="proveedores_id">Provedores_Id</label>
                            <input type="text" class="form-control" id="proveedores_id" name="proveedores_id" placeholder="Escriba Id Del Provedor" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="precio_costo">Precio Costo</label>
                            <input type="number" class="form-control" id="precio_costo" name="precio_costo" placeholder="Escriba El Precio De Costo" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="precio_venta">Precio Venta</label>
                            <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="Escriba El Precio De Venta" required>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <button class="btn btn-primary" type="submit">Enviar</button>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>

@endsection
