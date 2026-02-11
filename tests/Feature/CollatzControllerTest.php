<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollatzControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_views_correctly()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/collatz-sequence');

        $response->assertStatus(200);
        $response->assertViewIs('math.collatz');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/math/collatz-sequence',
            'amount' => 1,
        ]);
    }

    public function test_create_with_valid_number()
    {
        $this->assertDatabaseCount('jobs_amount', 0);

        $response = $this->post('/math/collatz-sequence', [
            'number' => 6,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('math.collatz');

        $response->assertViewHas('result', function ($result) {
            return isset($result['sequence'])
                && isset($result['steps'])
                && isset($result['maxValue'])
                && $result['sequence'][0] === 6;
        });

        $this->assertDatabaseHas('jobs_amount', [
            'name' => 'collatz',
            'amount' => 1,
        ]);
    }

    public function test_create_with_invalid_number()
    {
        $response = $this->post('/math/collatz-sequence', [
            'number' => 0,
        ]);

        $response->assertSessionHasErrors(['number']);
    }
}
