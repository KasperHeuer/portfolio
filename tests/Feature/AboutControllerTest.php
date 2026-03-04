<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_views_correctly()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/about'); 

        $response->assertStatus(200);
        $response->assertViewIs('about');

        $jaren = $response->viewData('jaren');
        $einde = $response->viewData('einde');

        $this->assertIsInt($jaren);
        $this->assertGreaterThan(0, $jaren);

        $this->assertContains($einde, ['2027', 'heden']);

        $this->assertDatabaseHas('page_amount', ['name' => '/about', 'amount' => 1]);
    }
}
