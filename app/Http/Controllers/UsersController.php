<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        //Recuperamos todos los usuarios, con una paginación sencilla
        $users = User::select('id', 'name', 'email', 'email_verified_at', 'password')->orderBy('id', 'asc')->simplePaginate(15);

        return view('users.index', compact('users'));
    }

    //Visualiza la ifnormación de un usuario
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //Vista de creación de un nuevo usuario
    public function create()
    {
        return view('users.create');
    }

    //Almacenar los datos del alta de usuario
    public function store()
    {
        //Creamos validaciones desde aquí. No las hemos puesto en la vista para probarlo desde aquí
        $data = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'between:5,10'],
        ]);

        //Encriptamos la contraseña
        $password = Hash::make(request('password'));

        //Insertar el usuario
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
        ]);

        return redirect('/users');
    }

    //Formulario de modificación un usuario pasado su ID
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    //Modificar el usuario a través de los valores introducidos
    public function update(User $user)
    {
        //Validamos el formulario, teniendo en cuenta que debemos ignorar el correo actual del usuario al validar
        $data = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required',  Rule::unique('users')->ignore($user)],
            'password' => ['required', 'between:5,10'],
        ]);

        //Encriptamos la contraseña
        $password = Hash::make(request('password'));

        //Actualizar el registro
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $password;

        $user->save();

        return redirect("/users");
    }

    //Eliminar un usuario
    public function destroy(User $user)
    {
        //Borrar el usuario introducido
        $user->delete();

        return redirect("/users");
    }
}
