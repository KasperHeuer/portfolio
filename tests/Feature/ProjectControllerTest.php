<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_projects_page_increments_pageviews()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/projects');

        $response->assertStatus(200);
        $response->assertViewIs('projects');

        $codetalen = $response->viewData('codetalen');
        $this->assertArrayHasKey('github', $codetalen);
        $this->assertArrayHasKey('math', $codetalen);
        $this->assertCount(5, $codetalen['github']);
        $this->assertCount(4, $codetalen['math']);

        $this->assertDatabaseHas('page_amount', [
            'name' => '/projects',
            'amount' => 1,
        ]);
    }

    public function test_multiple_views_increment_pageviews()
    {
        $this->get('/projects');

        $this->get('/projects');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/projects',
            'amount' => 2,
        ]);
    }
}
