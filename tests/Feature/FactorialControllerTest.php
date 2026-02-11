<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FactorialControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_factorial_view()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/factorial');

        $response->assertStatus(200);
        $response->assertViewIs('math.factorial');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/math/factorial',
            'amount' => 1,
        ]);
    }

    public function test_factorial_function()
    {
        $this->assertDatabaseCount('jobs_amount', 0);

        $response = $this->post('/math/factorial', [
            'number' => 5,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('math.factorial');

        $response->assertViewHas('result', function ($result) {
            return isset($result['result'])
                && isset($result['sequence'])
                && $result['result'] === 120
                && $result['sequence'] === [5, 4, 3, 2, 1];
        });

        $this->assertDatabaseHas('jobs_amount', [
            'name'   => 'factorial',
            'amount' => 1,
        ]);
    }
}
