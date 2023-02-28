<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    private const PASSWORD = '12345';

    public function testRegister(): void
    {
        $email = fake()->randomLetter . '@mail.ru';
        $password = self::PASSWORD;
        $name = 'TestTest';

        $response = $this->post('api/auth/register', [
            'email' => $email,
            'password' => $password,
            'name' => $name
        ]);

        $response->assertStatus(200);
    }

    public function testLogin(): void
    {
        $user = User::where('name', 'ilike', 'TestTest')->first();

        $response = $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => self::PASSWORD
        ]);

        $user->delete();

        $response->assertStatus(200);
    }

    public function testWrongLogin()
    {
        $email = fake()->email;

        while (User::whereEmail($email)->exists()) {
            $email = fake()->email;
        }

        $response = $this->post('api/auth/login', [
            'email' => $email,
            'password' => self::PASSWORD
        ]);

        $this->assertTrue($response->exception->getMessage() === 'Такого пользователя не существует');
    }

    public function testWrongPassword()
    {
        $user = User::first();

        $response = $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => $user->password . 'abc'
        ]);

        $this->assertTrue($response->exception->getMessage() === 'Неверные данные пользователя');
    }
}
