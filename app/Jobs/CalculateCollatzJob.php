<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateCollatzJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $number;
    protected bool $incrementAmount;

    public function __construct(array $data, bool $incrementAmount = true)
    {
        $this->number = $data['number'];
        $this->incrementAmount = $incrementAmount;
    }

    public function handle(): array
    {
        $number = $this->number;
        $steps = 0;
        $maxValue = $number;
        $sequence = [$number];

        while ($number !== 1) {
            $number = ($number % 2 === 0) ? intdiv($number, 2) : ($number * 3 + 1);
            $sequence[] = $number;
            $maxValue = max($maxValue, $number);
            $steps++;
        }

        if ($this->incrementAmount) {
            JobAmount::firstOrCreate(['name' => 'collatz'], ['amount' => 0])->increment('amount');
        }

        return [
            'sequence' => $sequence,
            'steps' => $steps,
            'maxValue' => $maxValue,
        ];
    }
}
