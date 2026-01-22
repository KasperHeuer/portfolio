<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateFactorialJob
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
        $result = 1;
        $sequence = [];

        for ($i = $number; $i >= 1; $i--) {
            $result *= $i;
            $sequence[] = $i;
        }

        JobAmount::firstOrCreate(
            ['name' => 'factorial'],
            ['amount' => 0],
        )->increment('amount');

        return [
            'result' => $result,
            'sequence' => $sequence,
        ];
    }
}
