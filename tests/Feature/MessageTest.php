<?php

namespace Tests\Feature;

use App\Models\Message;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetMessages(): void
    {
        $a = Message::factory(5)->create();

        $response = $this->get('api/message/?user_id=1');

        foreach ($a as $b) {
            $b->delete();
        }

        $response->assertStatus(200);
    }
}
