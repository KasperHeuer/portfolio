<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Foundation\Queue\Queueable;

class CheckPerfectNumberJob
{
    use Queueable;

    private int $number;
    protected bool $incrementAmount;

    /**
     * Create a new job instance.
     */
    public function __construct($data, bool $incrementAmount = true)
    {
        $this->number = $data['number'];
        $this->incrementAmount = $incrementAmount;
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

        if ($this->incrementAmount) {
            JobAmount::firstOrCreate(
                ['name' => 'perfect'],
                ['amount' => 0],
            )->increment('amount');
        }

        return [
            'result' => $sum === $this->number,
            'devisors' => $devisors,
            'number' => $this->number,
        ];
    }
}
