<?php

// php artisan make:test PostTest

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    // it helps in recreating dB structure by running all the migration on each single test run

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
