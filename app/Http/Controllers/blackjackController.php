<?php

namespace App\Http\Controllers;


use App\Models\casino;
use App\Models\PageViews;
use Illuminate\Http\Request;

class blackjackController extends Controller
{
    public function play(Request $request)
    {
        $playing = $request->session()->get('playing', false);
        $cards = $request->session()->get('cards', []);
        $total = $request->session()->get('total', 0);
        $finished = $request->session()->get('finished', false);
        $over = $request->session()->get('over', false);

        $dealerCards = $request->session()->get('dealerCards', []);
        $dealerTotal = $request->session()->get('dealerTotal', 0);
        $dealerFinished = $request->session()->get('dealerFinished', false);
        $dealerFailed = $request->session()->get('dealerFailed', false);

        $data = [
            'playing' => $playing,
            'cards' => $cards,
            'total' => $total,
            'finished' => $finished,
            'over' => $over,

            'dealerCards' => $dealerCards,
            'dealerTotal' => $dealerTotal,
            'dealerFinished' => $dealerFinished,
            'dealerFailed' => $dealerFailed,
        ];



        return view('blackjack.blackjack', compact('data'));
    }

    public function start(Request $request)
    {
        if (!$request->session()->get('playing', false)) {
            $card1 = rand(1, 11);
            $card2 = rand(1, 11);

            if ($card1 == 11 && $card2 == 11) $card2 = 1;

            $cards = [$card1, $card2];
            $total = $card1 + $card2;

            $dealerCard1 = rand(1, 11);
            $dealerCard2 = rand(1, 11);
            $dealerCards = [$dealerCard1, $dealerCard2];
            $dealerTotal = $dealerCard1 + $dealerCard2;

            $request->session()->put('playing', true);
            $request->session()->put('cards', $cards);
            $request->session()->put('total', $total);
            $request->session()->put('finished', false);
            $request->session()->put('over', false);

            $request->session()->put('dealerCards', $dealerCards);
            $request->session()->put('dealerTotal', $dealerTotal);
            $request->session()->put('dealerFinished', false);
            $request->session()->put('dealerFailed', false);

            PageViews::firstOrCreate(
                ['name' => '/casino/blackjack'],
                ['amount' => 0],
            )->increment('amount');
        }

        return redirect()->route('blackjack');
    }

    public function hit(Request $request)
    {
        if ($request->session()->get('playing', false) && !$request->session()->get('finished', false)) {
            $cards = $request->session()->get('cards', []);
            $total = $request->session()->get('total', 0);

            $newCard = rand(1, 11);
            $cards[] = $newCard;
            $total += $newCard;

            $request->session()->put('cards', $cards);
            $request->session()->put('total', $total);

            if ($total > 21) {
                $request->session()->put('finished', true);
                $request->session()->put('over', true);

                $casino = casino::firstOrCreate(
                    ['casinoGame' => 'blackjack'],
                    ['AmountPlayed' => 0, 'AmountWon' => 0]
                );

                $casino->increment('AmountPlayed');
            }
        }

        return redirect()->route('blackjack');
    }


    public function stand(Request $request)
    {
        if ($request->session()->get('playing', false)) {
            $dealerCards = $request->session()->get('dealerCards', []);
            $dealerTotal = $request->session()->get('dealerTotal', 0);
            $dealerFailed = false;

            while ($dealerTotal <= 16) {
                $newCard = rand(1, 11);
                $dealerCards[] = $newCard;
                $dealerTotal += $newCard;
                if ($dealerTotal > 21) {
                    $dealerFailed = true;
                }
            }

            $request->session()->put('dealerCards', $dealerCards);
            $request->session()->put('dealerTotal', $dealerTotal);
            $request->session()->put('dealerFinished', true);
            $request->session()->put('dealerFailed', $dealerFailed);

            $request->session()->put('finished', true);

            $playerTotal = $request->session()->get('total', 0);
            $playerOver = $request->session()->get('over', false);

            $casino = casino::firstOrCreate(
                ['casinoGame' => 'blackjack'],
                ['AmountPlayed' => 0, 'AmountWon' => 0]
            );

            $casino->increment('AmountPlayed');

            if (($playerTotal > $dealerTotal || $dealerFailed) && !$playerOver && $playerTotal <= 21) {
                $casino->increment('AmountWon');
            }
        }

        return redirect()->route('blackjack');
    }

    public function reset(Request $request)
    {
        $request->session()->forget([
            'playing',
            'cards',
            'total',
            'finished',
            'over',
            'dealerCards',
            'dealerTotal',
            'dealerFinished',
            'dealerFailed',
        ]);

        return redirect()->route('blackjack');
    }
}
