@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <p>Lista de usuarios del sistema ({{ count($users) }})</p>

    @if (count($users))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Verificado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at ? 'Sí' : 'No' }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <a href="/users/{{ $user->id }}">Ver</a>
                            <a href="/users/{{ $user->id }}/edit">Modificar</a>
                            <form action="/users/{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <span>No hay usuarios en el sistema, crea uno desde el siguiente enlace:</span> <a href="/users/create">Alta de usuario</a>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
