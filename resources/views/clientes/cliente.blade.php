@extends('layouts.app')
@section('titulo') Clientes @endsection
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
                    <h4 class="page-title mb-1">TABLA DE CLIENTES</h4>

                </div>
                <div class="col-md-4">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearCliente">
                                <i class="mdi mdi-plus mr-1"></i> Agregar
                            </button>
                            <a href="{{route('pdf.cliente')}}">
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
                    <th scope="col">Identificacion</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <th scope="row">
                        {{$cliente['id']}}
                    </th>
                    <td>{{$cliente['identificacion']}}</td>
                    <td>{{$cliente['nombres']}}</td>
                    <td>
                        {{$cliente['apellidos']}}
                    </td>
                    <td>{{$cliente['telefono']}}</td>
                    <td>{{$cliente['direccion']}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                <i class="mdi mdi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="updateCliente({{ $cliente['id'] }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deleteCliente({{ $cliente['id'] }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
<div class="modal fade bs-example-modal-center" id="modal_crearCliente" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="identificacion">Identificacion</label>
                            <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba La identificacion " required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escriba El nombre" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escriba Apellidos" required>
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
