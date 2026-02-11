<?php

namespace Tests\Feature;

use App\Models\PageViews;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_login_page_and_increments_pageviews()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.login');

        $this->assertDatabaseHas('page_amount', [
            'name' => '/dashboard',
            'amount' => 1,
        ]);
    }

    /** @test */
    public function it_logs_in_with_correct_credentials_and_shows_dashboard()
    {
        $username = config('dashboard.username');
        $password = config('dashboard.password');

        $response = $this->post('/dashboard', [
            'username' => $username,
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.dashboard');
        $response->assertViewHas('username', $username);
        $response->assertViewHas('data', function ($data) {
            return isset($data['contactAttempts'])
                && isset($data['jobs'])
                && isset($data['pages'])
                && isset($data['casinoGames']);
        });
    }

    /** @test */
    public function it_redirects_back_with_invalid_credentials()
    {
        $response = $this->post('/dashboard', [
            'username' => 'wronguser',
            'password' => 'wrongpass',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['login' => 'Invalid credentials']);
    }

    /** @test */
    public function dashboard_home_redirects_when_not_logged_in()
    {
        $response = $this->get('/dashboard/home');

        $response->assertRedirect(route('dashboard.login'));
    }

    /** @test */
    public function dashboard_home_shows_dashboard_when_logged_in()
    {
        $username = config('dashboard.username');

        $response = $this->withSession(['dashboard_user' => $username])
                         ->get('/dashboard/home');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.dashboard');
        $response->assertViewHas('username', $username);
        $response->assertViewHas('data', function ($data) {
            return isset($data['contactAttempts'])
                && isset($data['jobs'])
                && isset($data['pages'])
                && isset($data['casinoGames']);
        });
    }

    /** @test */
    public function dashboard_home_redirects_when_logged_in_as_unauthorized_user()
    {
        $response = $this->withSession(['dashboard_user' => 'unauthorized'])
                         ->get('/dashboard/home');

        $response->assertRedirect(route('dashboard.login'));
        $response->assertSessionHasErrors(['login' => 'Unauthorized user']);
    }

    /** @test */
    public function visiting_dashboard_when_already_logged_in_shows_dashboard()
    {
        $username = config('dashboard.username');

        // Simulate a logged-in user visiting /dashboard
        $response = $this->withSession(['dashboard_user' => $username])
                         ->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.dashboard');
        $response->assertViewHas('username', $username);
        $response->assertViewHas('data', function ($data) {
            return isset($data['contactAttempts'])
                && isset($data['jobs'])
                && isset($data['pages'])
                && isset($data['casinoGames']);
        });
    }
}
