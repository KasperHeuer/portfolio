<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_view()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('index');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/',
            'amount' => 1,
        ]);
    }
}