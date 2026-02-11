<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MathHomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_view()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/home');

        $response->assertStatus(200);
        $response->assertViewIs('math.home');

        $this->assertDatabaseHas('page_amount', [
            'name' => 'math/home',
            'amount' => 1,
        ]);
    }
}