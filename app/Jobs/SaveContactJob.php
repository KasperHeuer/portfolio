<?php

namespace App\Jobs;

use App\Models\Contact;
use App\Models\JobAmount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class SaveContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $note;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->name  = $data['naam'];
        $this->email = $data['email'];
        $this->note  = $data['note'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Contact::create([
            'name'  => $this->name,
            'email' => $this->email,
            'note'  => $this->note,
        ]);

        JobAmount::firstOrCreate(
            ['name' => 'Mail to me'],
            ['amount' => 0],
        )->increment('amount');
    }
}
