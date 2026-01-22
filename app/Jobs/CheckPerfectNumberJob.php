<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CheckPerfectNumberJob
{
    use Queueable;

    private int $number;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->number = $data['number'];
    }

    /**
     * Execute the job.
     */
    public function handle(): array
    {
        $sum = 0;
        $devisors = [];

        for ($i = 1; $i < $this->number; $i++) {
            if ($this->number % $i == 0) {
                $sum = $sum + $i;
                $devisors[] = $i;
            }
        }

        JobAmount::firstOrCreate(
            ['name' => 'perfect'],
            ['amount' => 0],
        )->increment('amount');

        return [
            'result' => $sum === $this->number,
            'devisors' => $devisors,
            'number' => $this->number,
        ];
    }
}
