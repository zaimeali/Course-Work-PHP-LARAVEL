<?php

// php artisan make:test PostTest

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    // it helps in recreating dB structure by running all the migration on each single test run

    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No Posts!');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = "Test Case Title";
        $post->content = "Test Case Content";
        $post->save();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('Test Case Title');
        $this->assertDatabaseHas('blog_posts', [
            // 'title' => 'Test Title',
            'title' => 'Test Case Title',
        ]);
    }
}
