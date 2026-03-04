<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FibonacciControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_fibonacci_view()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/fibonacci-sequence');

        $response->assertStatus(200);
        $response->assertViewIs('math.fibonacci');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/math/fibonacci-sequence',
            'amount' => 1,
        ]);
    }

    public function test_fibonacci_functionality_post()
    {
        $this->assertDatabaseCount('jobs_amount', 0);

        $postData = [
            'number' => 5,
        ];

        $response = $this->post('/math/fibonacci-sequence', $postData);

        $response->assertStatus(200);
        $response->assertViewIs('math.fibonacci');

        $response->assertViewHas('result', function ($result) {
            return $result['sequence'] === [0, 1, 1, 2, 3];
        });

        $this->assertDatabaseHas('jobs_amount', [
            'name' => 'fibonacci',
            'amount' => 1,
        ]);
    }

    public function test_fibonacci_validation_error()
    {
        $postData = [
            'number' => 0, 
        ];

        $response = $this->post('/math/fibonacci-sequence', $postData);

        $response->assertSessionHasErrors('number');
    }
}
