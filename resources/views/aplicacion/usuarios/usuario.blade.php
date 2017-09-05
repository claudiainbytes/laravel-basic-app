@extends('layouts.app')
@section('content')

<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="/usuarios/nuevo">Nuevo Usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cédula</th>
            <th>E-mail</th>
            <th>Teléfono</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $r)
        <tr>
            <td>{{ $r->nombres }}</td>
            <td>{{ $r->apellidos }}</td>
            <td>{{ $r->cedula }}</td>
            <td>{{ $r->email }}</td>
            <td>{{ $r->telefono }}</td>
            <td>
                <a href="/usuarios/{{ $r->id }}/editar">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('Está seguro de eliminar este registro?');" href="/usuarios/{{ $r->id }}/borrar">Borrar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
