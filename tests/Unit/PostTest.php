<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_insert_rules()
    {
        $post = new Post();
        $rules = $post->rules();

        $this->assertArrayHasKey('title', $rules);
        $this->assertArrayHasKey('body', $rules);
        $this->assertArrayNotHasKey('id', $rules);

        $this->assertEquals( 'required|unique:posts|max:255', $rules['title']);
        $this->assertEquals( 'required', $rules['body']);
    }

    public function test_update_rules()
    {
        $post = new Post();
        $post->id = 99;
        $rules = $post->rules();

        $this->assertArrayHasKey('title', $rules);
        $this->assertArrayHasKey('body', $rules);
        $this->assertArrayHasKey('id', $rules);

        $this->assertEquals( 'required|unique:posts,title,99,id|max:255', $rules['title']);
        $this->assertEquals( 'required', $rules['body']);
        $this->assertEquals( 'exists:App\Models\Post,id', $rules['id']);
    }
}
