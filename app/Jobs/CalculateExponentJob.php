<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Foundation\Queue\Queueable;

class CalculateExponentJob
{
    use Queueable;

    private int $number;
    private int $exponent;
    protected bool $incrementAmount;
    /**
     * Create a new job instance.
     */
    public function __construct(array $data, bool $incrementAmount = true)
    {
        $this->number = $data['number'];
        $this->exponent = $data['exponent'];
        $this->incrementAmount = $incrementAmount;
    }

    /**
     * Execute the job.
     */
    public function handle(): array
    {
        if ($this->incrementAmount) {
            JobAmount::firstOrCreate(
                ['name' => 'exponent'],
                ['amount' => 0],
            )->increment('amount');
        }
        return [
            'number' => $this->number,
            'exponent' => $this->exponent,
            'result' => $this->number ** $this->exponent,
        ];
    }
}
