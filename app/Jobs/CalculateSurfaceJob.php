<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Foundation\Queue\Queueable;

class CalculateSurfaceJob
{
    use Queueable;

    private string $shape;
    private int $length;
    private int $width;
    private int $diameter;
    private int $base;
    private int $height;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->shape = $data['shape'];
        $this->length = $data['length'] ?? 0;
        $this->width = $data['width'] ?? 0;
        $this->diameter = $data['diameter'] ?? 0;
        $this->base = $data['base'] ?? 0;
        $this->height = $data['height'] ?? 0;
    }

    /**
     * Execute the job.
     */
    public function handle(): array
    {
        JobAmount::firstOrCreate(
            ['name' => 'surface'],
            ['amount' => 0],
        )->increment('amount');

        if ($this->shape === 'square') {
            return
                [
                    'result' => $this->length * $this->width,
                    'shape' => $this->shape,
                    'width' => $this->width,
                    'length' => $this->length,
                ];
        } elseif ($this->shape === 'rectangle') {
            return
                [
                    'result' => $this->length * $this->width,
                    'shape' => $this->shape,
                    'width' => $this->width,
                    'length' => $this->length,
                ];
        } elseif ($this->shape === 'circle') {
            return
                [
                    'result' => (($this->diameter / 2) * ($this->diameter / 2)) * pi(),
                    'shape' => $this->shape,
                    'diameter' => $this->diameter,
                ];
        } elseif ($this->shape === 'triangle') {
            return
                [
                    'result' => (0.5 * $this->base) * $this->height,
                    'shape' => $this->shape,
                    'base' => $this->base,
                    'height' => $this->height,
                ];
        } else {
            return [
                false,
            ];
        }
    }
}
