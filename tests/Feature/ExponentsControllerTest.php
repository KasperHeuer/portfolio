<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExponentsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_exponents_view()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/exponents');

        $response->assertStatus(200);
        $response->assertViewIs('math.exponents');

        $this->assertDatabaseHas('page_amount', [
            'name'   => '/math/exponents',
            'amount' => 1,
        ]);
    }

    public function test_exponent_functionality()
    {
        $this->assertDatabaseCount('jobs_amount', 0);

        $response = $this->post('/math/exponents', [
            'number'   => 2,
            'exponent' => 3,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('math.exponents');

        $response->assertViewHas('result', function ($result) {
            return isset($result['number'])
                && isset($result['exponent'])
                && isset($result['result'])
                && $result['number'] === 2
                && $result['exponent'] === 3
                && $result['result'] === 8;
        });

        $this->assertDatabaseHas('jobs_amount', [
            'name'   => 'exponent',
            'amount' => 1,
        ]);
    }
}
