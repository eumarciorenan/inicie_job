<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_post_register()
    {
        $data = [
            "user_id" => User::orderBy("id", "DESC")->first()->id,
            "title" => "Teste post",
            "body" =>  "Mensagem do post"
        ];
        $response = $this->json('POST', '/posts', $data);

        $response->assertStatus(201)
        ->assertJson(['success' => true]);
        $this->assertTrue($response['success']);

        $data['title'] = null;
        $response = $this->json('POST', '/posts', $data);
        $response->assertStatus(400)
        ->assertJson(['success' => false]);
    }
}
