<?php

namespace Tests\Unit\Jobs;

use App\Jobs\EmailContactJob;
use App\Models\JobAmount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class EmailContactJobTest extends TestCase
{
    use RefreshDatabase;

    public function test_constructor_with_valid_data_does_not_throw()
    {
        $data = [
            'naam' => 'John Doe',
            'email' => 'john@example.com',
            'note' => 'Hello there!',
        ];

        $job = new EmailContactJob($data);
        $this->assertInstanceOf(EmailContactJob::class, $job);
    }

    public function test_constructor_with_invalid_data_throws_exception()
    {
        $this->expectException(ValidationException::class);

        new EmailContactJob([
            'naam' => '',
            'email' => 'not-an-email',
            'note' => '',
        ]);
    }

    public function test_handle_sends_emails_and_logs_when_email_present()
    {
        Log::spy();
        Mail::shouldReceive('raw')
            ->twice()
            ->withArgs(function ($text, $callback) {
                return is_string($text) && is_callable($callback);
            });

        $data = [
            'naam' => 'John Doe',
            'email' => 'john@example.com',
            'note' => 'Test note',
        ];

        $job = new EmailContactJob($data);
        $job->handle();

        $this->assertDatabaseHas('jobs_amount', [
            'name' => 'Email to contact',
            'amount' => 1,
        ]);

        Log::shouldNotHaveReceived('warning');
    }

    public function test_handle_logs_warning_when_email_missing()
    {
        Log::spy();
        Mail::shouldReceive('raw')
            ->once()
            ->withArgs(function ($text, $callback) {
                return is_string($text) && is_callable($callback);
            });

        $data = [
            'naam' => 'Jane Doe',
            'email' => null,
            'note' => 'Hello!',
        ];

        $job = new EmailContactJob($data);
        $job->handle();

        Log::shouldHaveReceived('warning')
            ->once()
            ->with('Email address is missing for contact: Jane Doe');

        $this->assertDatabaseHas('jobs_amount', [
            'name' => 'Email to contact',
            'amount' => 1,
        ]);
    }

    public function test_handle_throws_exception_on_mail_failure()
    {
        Mail::shouldReceive('raw')
            ->once()
            ->andThrow(new \Exception('Mail server down'));

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Mail server down');

        $data = [
            'naam' => 'John Doe',
            'email' => 'john@example.com',
            'note' => 'Test note',
        ];

        $job = new EmailContactJob($data);
        $job->handle();
    }
}
