<?php

// php artisan make:test PostTest

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
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
        $response->assertSeeText('No comments yet');

        $this->assertDatabaseHas('blog_posts', [
            // 'title' => 'Test Title',
            'title' => 'Test Case Title',
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid Title',
            'content' => 'At least 10 characters',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302) // status for successful request
            ->assertSessionHas('status'); // to check session value
        $this->assertEquals(session('status'), 'Blog Post was created successfully');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 't',
            'content' => 'c',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors');
        // $messages = session('errors')->getMessages(); // if use this then don't use getBag
        // and in assert use
        // $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        // like this

        // dd($messages->getBag('default')->first('content'));

        $this->assertEquals($messages->getBag('default')->first('title'), 'The title must be at least 5 characters.');
        $this->assertEquals($messages->getBag('default')->first('content'), 'The content must be at least 10 characters.');
        // dd($messages->getMessages());
    }

    public function testUpdateValid()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = "New Title";
        $post->content = "New Content";
        $post->save();

        $this->assertDatabaseHas('blog_posts', $post->getAttributes());

        $params = [
            'title' => 'Updated Title',
            'content' => 'Update Content',
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post has been updated!');
        $this->assertDatabaseMissing('blog_posts', $post->getAttributes());
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Updated Title',
        ]);
    }

    public function testDelete()
    {
        $post = $this->createDummyPost();

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post has been deleted!');
        $this->assertDatabaseMissing('blog_posts', $post->toArray());
    }

    // it'll create the instance of the BlogPost
    private function createDummyPost(): BlogPost
    {
        // $post = new BlogPost();
        // $post->title = "Delete Title";
        // $post->content = "Delete Content";
        // $post->save();

        // calling state here which is defined in BlogPostFactory
        return BlogPost::factory()->newTitle()->create();

        // return $post;
    }

    public function testSee1BlogPostWithComments()
    {
        // Arrange
        $post = $this->createDummyPost();
        Comment::factory()->count(4)->create(['blog_post_id' => $post->id]);

        $response = $this->get('/posts');
        $response->assertSeeText('4 comments');
    }
}
