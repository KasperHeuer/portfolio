<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculatorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_views_correctly()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/calculator');

        $response->assertStatus(200);
        $response->assertViewIs('math.calculator');

        $this->assertDatabaseHas('page_amount', ['name' => '/math/calculator', 'amount' => 1]);
    }

    public function test_calculates_correctly()
    {
        $operators = ['+', '-', '*', '/', '^', '%'];

        foreach ($operators as $operator) {
            $number1 = 10;
            $number2 = 5;

            // Calculate expected result based on operator
            switch ($operator) {
                case '+':
                    $expected = $number1 + $number2;
                    break;
                case '-':
                    $expected = $number1 - $number2;
                    break;
                case '*':
                    $expected = $number1 * $number2;
                    break;
                case '/':
                    $expected = $number2 != 0 ? $number1 / $number2 : null;
                    break;
                case '^':
                    $expected = pow($number1, $number2);
                    break;
                case '%':
                    $expected = $number1 * ($number2 / 100);
                    break;
            }

            $response = $this->post('/math/calculator', [
                'number' => $number1,
                'operator' => $operator,
                'number2' => $number2,
            ]);


            $response->assertStatus(200);
            $response->assertViewIs('math.calculator');
            $response->assertViewHas('result', $expected);
            $response->assertViewHas('number1', $number1);
            $response->assertViewHas('number2', $number2);
            $response->assertViewHas('operator', $operator);
        }
    }

    public function test_division_by_zero()
    {
        $response = $this->post('/math/calculator', [
            'number' => 10,
            'operator' => '/',
            'number2' => 0,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('math.calculator');
        $response->assertViewHas('result', 'Error');
    }
}
