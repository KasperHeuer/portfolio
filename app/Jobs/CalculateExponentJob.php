<?php

namespace App\Jobs;

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
        return [
            'number' => $this->number,
            'exponent' => $this->exponent,
            'result' => $this->number ** $this->exponent,
        ];
    }
}
