<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PageViews;
use App\Models\Wisdom;

class WisdomControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_wisdom_page_increments_pageviews()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/math/wisdom-of-the-crowd');

        $response->assertStatus(200);
        $response->assertViewIs('math.wisdom');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/math/wisdom-of-the-crowd',
            'amount' => 1,
        ]);
    }

    public function test_submit_wisdom_number_creates_record_and_returns_result()
    {
        $this->assertDatabaseCount('wisdom_of_the_crowd', 0);

        $postData = ['number' => 10];

        $response = $this->post('/math/wisdom-of-the-crowd', $postData);

        $response->assertStatus(200);
        $response->assertViewIs('math.wisdom');

        $this->assertDatabaseHas('wisdom_of_the_crowd', [
            'guess' => 10,
        ]);

        $result = $response->viewData('result');
        $this->assertEquals(10, $result['guess']);
        $this->assertEquals(10, $result['avg']);
        $this->assertEquals(1, $result['total_participants']);
    }

    public function test_submit_multiple_wisdom_numbers_calculates_avg()
    {
        Wisdom::create(['guess' => 5]);
        Wisdom::create(['guess' => 15]);

        $postData = ['number' => 10];

        $response = $this->post('/math/wisdom-of-the-crowd', $postData);
        $response->assertStatus(200);

        $result = $response->viewData('result');

        $this->assertEquals(10, $result['guess']);
        $this->assertEquals(10, $result['avg']);
        $this->assertEquals(3, $result['total_participants']);
    }

    public function test_validation_fails_for_invalid_number()
    {
        $response = $this->post('/math/wisdom-of-the-crowd', []);
        $response->assertSessionHasErrors('number');

        $response = $this->post('/math/wisdom-of-the-crowd', ['number' => 'abc']);
        $response->assertSessionHasErrors('number');

        $response = $this->post('/math/wisdom-of-the-crowd', ['number' => 0]);
        $response->assertSessionHasErrors('number');
    }
}
