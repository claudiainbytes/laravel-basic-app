@extends('layouts.app')
@section('content')

<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="/usuarios/nuevo">Nuevo Usuario</a>
</div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

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
                <a class="btn btn-primary btn-sm btn-block" href="/usuarios/{{ $r->id }}/editar">Editar</a>
            </td>
            <td>
                <button class="btn btn-danger btn-sm btn-block "  data-toggle="modal" data-target=".confirm-delete" data-href="/usuarios/{{ $r->id }}/borrar">Borrar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmar Borrado</h4>
            </div>

            <div class="modal-body">
                <p>Estas seguro de eliminar este registro? Este procedimiento es irreversible.</p>
                <p>Deseas continuar?</p>
                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Borrar</a>
            </div>
        </div>
    </div>
</div>
@endsection