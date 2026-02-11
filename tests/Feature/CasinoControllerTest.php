<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CasinoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_views_correctly()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/casino/home');

        $response->assertStatus(200);
        $response->assertViewIs('blackjack.index');

        $this->assertDatabaseHas('page_amount', ['name' => '/casino/home', 'amount' => 1]);
    }
}