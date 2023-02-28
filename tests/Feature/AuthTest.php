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
}
