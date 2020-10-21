<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Comprueba si funciona la página principal
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Comprueba que se pueda insertar un usuario en la base de datos
     *
     * @return void
     */
    public function testInsert()
    {
        $data = [
            'name' => 'Sergio',
            'email' => 'sergioalmela@gmail.com'
        ];

        $user = User::factory()->create($data);

        $this->assertDatabaseHas('users', [
            'email' => 'sergioalmela@gmail.com'
        ]);

        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
    }

    /**
     * Comprueba que se pueda modificar un usuario de la base de datos
     *
     * @return void
     */
    public function testModify()
    {
        $user = User::factory()->create();
        $old_name = $user->name;
        $old_email = $user->email;

        $user->name = 'David';
        $user->email = 'david@gmail.com';
        $update = $user->save();

        $this->assertTrue($update);
        $this->assertNotEquals($old_name, $user->name);
        $this->assertNotEquals($old_email, $user->email);
    }

    /**
     * Elimina un usuario
     *
     * @return void
     */
    public function testDelete()
    {
        $user = User::factory()->create(
            [
                'name' => 'Victor',
                'email' => 'victor@gmail.com'
            ]
        );

        $this->assertDatabaseHas('users', [
            'email' => 'victor@gmail.com'
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'email' => 'victor@gmail.com'
        ]);
    }

}
