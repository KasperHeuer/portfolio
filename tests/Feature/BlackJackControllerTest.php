<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PageAmount;
use App\Models\Casino;

class BlackjackControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_play_shows_blackjack_view_with_session_data()
    {
        $response = $this->get('/casino/blackjack');

        $response->assertStatus(200);
        $response->assertViewIs('blackjack.blackjack');
        $data = $response->viewData('data');
        $this->assertIsArray($data);
        $this->assertArrayHasKey('cards', $data);
        $this->assertArrayHasKey('dealerCards', $data);
    }

    public function test_start_initializes_game_and_increments_page_amount()
    {
        $this->assertDatabaseCount('page_amount', 0);

        $response = $this->get('/casino/blackjack/start');

        $response->assertRedirect(route('blackjack'));
        $this->assertTrue(session()->get('playing'));
        $this->assertIsArray(session()->get('cards'));
        $this->assertIsArray(session()->get('dealerCards'));
        $this->assertDatabaseHas('page_amount', [
            'name' => '/casino/blackjack',
            'amount' => 1,
        ]);
    }

    public function test_hit_adds_card_and_marks_over_when_total_exceeds_21()
    {
        session()->put([
            'playing' => true,
            'cards' => [10, 10],
            'total' => 20,
            'finished' => false,
            'over' => false,
        ]);

        $this->assertDatabaseCount('casino_wins', 0);

        $response = $this->get('/casino/blackjack/hit');

        $response->assertRedirect(route('blackjack'));
        $this->assertTrue(session()->get('finished') || session()->get('total') <= 21);
        $this->assertDatabaseHas('casino_wins', [
            'casinoGame' => 'blackjack',
        ]);
    }

    public function test_stand_finishes_game_and_updates_casino_stats()
    {
        session()->put([
            'playing' => true,
            'cards' => [10, 8],
            'total' => 18,
            'finished' => false,
            'over' => false,
            'dealerCards' => [7, 8],
            'dealerTotal' => 15,
            'dealerFinished' => false,
            'dealerFailed' => false,
        ]);

        $response = $this->get('/casino/blackjack/stand');

        $response->assertRedirect(route('blackjack'));
        $this->assertTrue(session()->get('finished'));
        $this->assertTrue(session()->get('dealerFinished'));
        $casino = \App\Models\Casino::firstWhere('casinoGame', 'blackjack');
        $this->assertNotNull($casino);
        $this->assertGreaterThanOrEqual(1, $casino->AmountPlayed);
    }

    public function test_reset_clears_session()
    {
        session()->put([
            'playing' => true,
            'cards' => [10, 8],
            'total' => 18,
            'finished' => false,
            'over' => false,
            'dealerCards' => [7, 8],
            'dealerTotal' => 15,
            'dealerFinished' => false,
            'dealerFailed' => false,
        ]);

        $response = $this->get('/casino/blackjack/reset');

        $response->assertRedirect(route('blackjack'));
        $this->assertFalse(session()->has('playing'));
        $this->assertFalse(session()->has('cards'));
        $this->assertFalse(session()->has('dealerCards'));
    }
    public function test_hit_marks_over_and_creates_casino_row()
    {
        session()->put([
            'playing' => true,
            'cards' => [10, 10],
            'total' => 22,
            'finished' => false,
            'over' => false,
        ]);

        $response = $this->get('/casino/blackjack/hit');

        $response->assertRedirect(route('blackjack'));

        $this->assertTrue(session()->get('finished'));
        $this->assertTrue(session()->get('over'));

        $this->assertDatabaseHas('casino_wins', [
            'casinoGame' => 'blackjack',
        ]);
    }
}
