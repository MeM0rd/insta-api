<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function testPostCreate(): void
    {
        $post = [
            'user_id' => fake()->numberBetween(1, 3),
            'user_nickname' => 'test' . fake()->name,
            'text' => fake()->text(30),
            'is_public' => true
        ];

        $response = $this->actingAs(User::factory()->create())
            ->post('api/post/create', $post);

        $response->assertStatus(200);
    }

    public function testPublicPostGet(): void
    {
        $publicPosts = $this->get('api/post/');

        $user = User::where('email', 'ilike', '%@example%')->first();

        $allPosts = $this->actingAs($user)->get('api/post/');

        $this->assertTrue(count($publicPosts['data']) <= count($allPosts['data']));
    }

    public function testLikeCreate(): void
    {
        $like = [
            'post_id' => fake()->numberBetween(1, 5),
            'liker_id' => fake()->numberBetween(1, 3)
        ];

        $user = User::where('email', 'ilike', '%@example%')->first();

        $response = $this->actingAs($user)->post('api/post/like/create', $like);

        $response->assertStatus(200);
    }
}
