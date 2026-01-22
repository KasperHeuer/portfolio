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

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->number = $data['number'];
    }

    /**
     * Execute the job.
     */
    public function handle(): array
    {
        $number = $this->number;
        $steps = 0;
        $maxValue = $number;
        $sequence = [$number];

        while ($number !== 1) {
            if ($number % 2 === 0) {
                $number = intdiv($number, 2);
            } else {
                $number = ($number * 3) + 1;
            }

            $sequence[] = $number;

            if ($number > $maxValue) {
                $maxValue = $number;
            }

            $steps++;
        }

        JobAmount::firstOrCreate(
            ['name' => 'collatz'],
            ['amount' => 0],
        )->increment('amount');
        
        return [
            'sequence' => $sequence,
            'steps' => $steps,
            'maxValue' => $maxValue,
        ];
    }
}
