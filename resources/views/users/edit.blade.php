@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Modificar usuario: {{ $user->name }}</h1>
@stop

@section('content')
    <form action="/users/{{ $user->id }}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Nombre" value="{{ old('name') ?? $user->name }}">
            @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico" value="{{ old('email') ?? $user->email }}">
            @if ($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            <small id="passHelp" class="form-text text-muted">La contraseña debe de tener entre 5 y 10 caracteres</small>
            @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
