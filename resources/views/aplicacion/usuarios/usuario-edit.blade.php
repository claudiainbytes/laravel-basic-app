@extends('layouts.app')
@section('content')

<h1 class="page-header">
    Usuario
    @if ( $alm->id != null )
       <i> {{ $alm->nombres }} {{ $alm->apellidos }} </i> - Editar
    @else
        - Nuevo Usuario
    @endif
</h1>

<ol class="breadcrumb">
  <li><a href="/usuarios">Usuarios</a></li>
  <li class="active"> @php echo $alm->id != null ? $alm->nombres.' '.$alm->apellidos : 'Nuevo Registro'; @endphp</li>
</ol>

@php $guardar = ( $alm->id != null ? 'usuarios/'.$alm->id.'/guardar' :  'usuarios/guardar' ); @endphp

<form id="frm-User" action="/{{ $guardar }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{ $alm->id }}" />

    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="{{ $alm->nombres }}" class="form-control" placeholder="Nombres"/>
    </div>

    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="{{ $alm->apellidos }}" class="form-control" placeholder="Apellidos"/>
    </div>

    <div class="form-group">
        <label>Cédula</label>
        <input type="text" name="cedula" value="{{ $alm->cedula }}" class="form-control" placeholder="Cédula"/>
    </div>

    <div class="form-group">
        <label>E-mail</label>
        <input type="text" name="email" value="{{ $alm->email }}" class="form-control" placeholder="E-mail"/>
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ $alm->telefono }}" class="form-control" placeholder="Teléfono"/>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
        <a href="/usuarios" class="btn btn-primary" role="button">Cancelar</a>
    </div>
</form>


@endsection
