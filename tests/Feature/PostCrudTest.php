<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCrudTest extends TestCase
{
   // Test Creating POST
    public function test_post_is_created_successfully()
    {
        $data = [
            'title' => 'My First Test Post',
            'content' => 'This is the body of the test post',
        ];

        $response = $this->post('/posts', $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('posts', [
            'title' => 'My First Test Post',
            'content' => 'This is the body of the test post',
        ]);
    }

    // Test Fetching POSTS
    public function test_posts_index_shows_all_posts()
    {
        $posts = Post::factory()->count(3)->create();

        $response = $this->get('/posts');

        $response->assertStatus(200);

        foreach ($posts as $post) {
            $response->assertSee($post->title);
        }
    }

    // Test Get POST
    public function test_post_is_shown_successfully()
    {
        $post = Post::factory()->create();

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee($post->content);
    }

    // Test Updating POST
    public function test_post_is_updated_successfully()
    {
        $post = Post::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ];

        $response = $this->put("/posts/{$post->id}", $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);
    }

    // Test Deleting POST
    public function test_post_is_deleted_successfully()
    {
        $post = Post::factory()->create();

        $response = $this->delete("/posts/{$post->id}");

        $response->assertStatus(302);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
