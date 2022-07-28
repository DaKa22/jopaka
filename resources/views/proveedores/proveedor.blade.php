@extends('layouts.app')
@section('titulo') Proveedores @endsection
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
                    <h4 class="page-title mb-1">TABLA DE PROVEEDORES</h4>

                </div>
                <div class="col-md-4">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-light btn-rounded" type="button"onclick="crearProveedor()" data-toggle="tooltip" data-placement="top">

                                <i class="mdi mdi-plus mr-1"></i> Agregar
                            </button>
                            <a href="{{route('pdf.proveedor')}}">
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Nit</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                <tr>
                    <th scope="row">
                        {{$proveedor['id']}}
                    </th>
                    <td>{{$proveedor['nombre']}}</td>
                    <td>{{$proveedor['nit']}}</td>
                    <td>
                        {{$proveedor['telefono']}}
                    </td>
                    <td>{{$proveedor['direccion']}}</td>

                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                <i class="mdi mdi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="updateProveedor({{ $proveedor['id'] }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deleteProveedor({{ $proveedor['id'] }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
<div class="modal fade bs-example-modal-center" id="modal_crearProveedor" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-md-12 mb-3">
                            <label for="identificacion">Identificacion</label>
                            <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba La identificacion " required>
                        </div> --}}
                        <div class="col-md-12 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba El nombre" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nit">Nit</label>
                            <input type="number" class="form-control" id="nit" name="nit" placeholder="Escriba El Nit " required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Escriba El Telefono" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escriba La Direccion" required>
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
