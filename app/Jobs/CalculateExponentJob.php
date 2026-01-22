<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Foundation\Queue\Queueable;

class CalculateExponentJob
{
    use Queueable;

    private int $number;
    private int $exponent;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->number = $data['number'];
        $this->exponent = $data['exponent'];
    }

    /**
     * Execute the job.
     */
    public function handle(): array
    {
        JobAmount::firstOrCreate(
            ['name' => 'exponent'],
            ['amount' => 0],
        )->increment('amount');
        return [
            'number' => $this->number,
            'exponent' => $this->exponent,
            'result' => $this->number ** $this->exponent,
        ];
    }
}
