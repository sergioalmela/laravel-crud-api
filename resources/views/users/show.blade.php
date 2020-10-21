@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuario: {{ $user->name }}</h1>
@stop

@section('content')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Correo electrónico" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label>Verificado</label>
            <input type="text" class="form-control" value="{{ $user->email_verified_at ? 'Sí' : 'No' }}">
        </div>

        <div class="form-group">
            <label>Creado en</label>
            <input type="datetime" class="form-control" value="{{ $user->created_at }}">
        </div>

        <div class="form-group">
            <label>Modificado en</label>
            <input type="datetime" class="form-control" value="{{ $user->updated_at }}">
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
