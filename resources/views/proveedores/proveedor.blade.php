@extends('layouts.app')
@section('titulo') Proveedores @endsection
@section('content')

<div class="card-body">
    {{-- <div class="float-right ml-2">
        <a href="#">View all</a>
    </div> --}}
    <h1 class="header-title mb-4">TABLA DE PROVEEDORES</h1>

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
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                <i class="mdi mdi-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
