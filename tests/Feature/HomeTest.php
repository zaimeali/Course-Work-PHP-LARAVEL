<?php
// php artisan make:test HomeTest

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');

        // $response->assertSeeText('Home Nice');
        $response->assertSeeText('Home Page');
    }

    public function testContactPageIsWorkingCorrectly()
    {
        $response = $this->get('/contact');
        $response->assertSeeText('Contact Page');
    }
}
