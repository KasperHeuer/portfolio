<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerfectNumberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_perfect_numbers_page()
    {
        // Ensure the page_amount table is empty initially
        $this->assertDatabaseCount('page_amount', 0);

        // Visit the perfect numbers page
        $response = $this->get('/math/perfect-numbers');

        // Check response
        $response->assertStatus(200);
        $response->assertViewIs('math.perfect');

        // Check database increment
        $this->assertDatabaseHas('page_amount', [
            'name' => '/math/perfect-numbers',
            'amount' => 1,
        ]);
    }

    public function test_perfect_number_functionality_with_perfect_number()
    {
        // Ensure jobs_amount table is empty
        $this->assertDatabaseCount('jobs_amount', 0);

        $postData = ['number' => 6]; // perfect number

        $response = $this->post('/math/perfect-numbers', $postData);

        $response->assertOk();
        $response->assertViewIs('math.perfect');

        $result = $response->viewData('result');

        $this->assertEquals(6, $result['number']);
        $this->assertTrue($result['result']);
        $this->assertEquals([1, 2, 3], $result['devisors']);

        $this->assertDatabaseHas('jobs_amount', [
            'name' => 'perfect',
            'amount' => 1,
        ]);
    }

    public function test_perfect_number_functionality_with_non_perfect_number()
    {
        $postData = ['number' => 8]; // not perfect

        $response = $this->post('/math/perfect-numbers', $postData);

        $response->assertOk();
        $response->assertViewIs('math.perfect');

        $result = $response->viewData('result');

        $this->assertEquals(8, $result['number']);
        $this->assertFalse($result['result']);
        $this->assertEquals([1, 2, 4], $result['devisors']);

        $this->assertDatabaseHas('jobs_amount', [
            'name' => 'perfect',
            'amount' => 1,
        ]);
    }

    public function test_validation_fails_for_invalid_number()
    {
        // Missing number
        $response = $this->post('/math/perfect-numbers', []);
        $response->assertSessionHasErrors('number');

        // Invalid number (non-integer)
        $response = $this->post('/math/perfect-numbers', ['number' => 'abc']);
        $response->assertSessionHasErrors('number');

        // Invalid number (less than 1)
        $response = $this->post('/math/perfect-numbers', ['number' => 0]);
        $response->assertSessionHasErrors('number');
    }
}
