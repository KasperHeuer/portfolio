<?php

namespace App\Jobs;

use App\Models\JobAmount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $name;
    protected string $email;
    protected string $note;

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
        $body = "Geachte {$this->name},\n\n"
            . "Hartelijk dank voor uw bericht. Ik bevestig graag dat ik uw bericht heb ontvangen "
            . "en het zo snel mogelijk zal doornemen.\n\n"
            . "Met vriendelijke groet,\n"
            . "Kasper Heuer";

        Mail::raw($body, function ($message) {
            $message->to($this->email)
                ->subject("Contact op gelegd met Kasper Heuer")
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });

        $body = "Er is contact opgelegd met jouw door: \n\n
            Naam    $this->name \n\n
            Email   $this->email \n\n
            Notitie $this->note \n\n
        ";
        Mail::raw($body, function($message) {
            $message->to(env('MAIL_FROM_ADDRESS'))
                ->subject("Contact op gelegd met mij")
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });

        JobAmount::firstOrCreate(
            ['name' => 'Email to contact'],
            ['amount' => 0],
        )->increment('amount');
    }
}
