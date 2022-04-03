<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

class CommentTest extends TestCase
{
    public function test_comment_register()
    {
        $data = [
            "post_id" => Post::orderBy("id", "DESC")->first()->id,
            "name" => "Test",
            "email" =>  "test@test.com",
            "body" =>  "comment description"
        ];
        $response = $this->postJson('/comments', $data);

        $response //->assertStatus(201)
        ->assertJson(['success' => true]);
        $this->assertTrue($response['success']);

        $data['email'] = null;
        $response = $this->postJson('/comments', $data);
        $response->assertStatus(400)
        ->assertJson(['success' => false]);
    }
}
