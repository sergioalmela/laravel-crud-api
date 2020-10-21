<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiUsersController extends Controller
{
    //Devolver un JSON de todos los usuarios de la base de datos
    //TODO: Devolver estado de la llamada (si devuelve OK o falla) y devolver sólo los campos necesarios
    //TODO: Usar una API key para mayor seguridad
    public function index()
    {
        return User::all();
    }

    //Ver la información de un usuario en concreto y devolver un JSON
    public function show(User $user)
    {
        return $user;
    }

    //Insertar la información de un usuario
    public function store(Request $request)
    {
        //Validamos los datos también desde la API
        $validator = Validator::make($request->json()->all(), [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'between:5,10'],
        ]);

        $user = false;

        //Asignamos código de estado para devolverlo en la llamada
        $status = 500;

        if(!$validator->fails()){
            //Encriptamos la contraseña
            $request->merge([
                'password' => Hash::make($request->password),
            ]);

            $user = User::create($request->all());

            $status = $user ? 201 : $status;
        }

        return response()->json($user, $status);
    }

    //Actualizar un usuario y devolver el estado
    public function update(Request $request, User $user)
    {
        //Validamos los datos teniendo en cuenta que estamos actualizando y el correo se puede repetir
        $validator = Validator::make($request->json()->all(), [
            'name' => ['required', 'max:255'],
            'email' => ['required',  Rule::unique('users')->ignore($user)],
        ]);

        //Código de estado para devolver la llamada
        $status = 500;

        if(!$validator->fails()) {
            $user->update($request->all());

            $status = 200;
        }

        return response()->json($user, $status);
    }

    //Eliminar un usuario y devolver el estado
    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
