@extends('layouts.app')
@section('titulo') Clientes @endsection
@section('content')

<div class="card-body">
    {{-- <div class="float-right ml-2">
        <a href="#">View all</a>
    </div> --}}
    <h1 class="header-title mb-4">TABLA DE CLIENTES</h1>

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

    {{--  <div class="mt-4">
        <ul class="pagination pagination-rounded justify-content-center mb-0">
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <i class="mdi mdi-chevron-left"></i>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="mdi mdi-chevron-right"></i>
                </a>
            </li>
        </ul>
    </div>  --}}
</div>

@endsection
