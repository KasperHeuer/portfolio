<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Foundation\Queue\Queueable;

class CalculateFibonacciJob
{
    use Queueable;

    private int $number;

    public function __construct(array $data)
    {
        $this->number = $data['number'];
    }

    public function handle(): array
    {
        $sequence = [];

        $a = 0;
        $b = 1;

        for ($i = 0; $i < $this->number; $i++) {
            $sequence[] = $a;
            $next = $a + $b;
            $a = $b;
            $b = $next;
        }

        JobAmount::firstOrCreate(
            ['name' => 'fobonacci'],
            ['amount' => 0],
        )->increment('amount');
        
        return [
            'sequence' => $sequence,
        ];
    }
}
