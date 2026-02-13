<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Foundation\Queue\Queueable;

class CalculateFibonacciJob
{
    use Queueable;

    private int $number;
    protected bool $incrementAmount;

    public function __construct(array $data, bool $incrementAmount = true)
    {
        $this->number = $data['number'];
        $this->incrementAmount = $incrementAmount;
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

        if ($this->incrementAmount) {
            JobAmount::firstOrCreate(
                ['name' => 'fibonacci'],
                ['amount' => 0],
            )->increment('amount');
        }

        return [
            'sequence' => $sequence,
        ];
    }
}
