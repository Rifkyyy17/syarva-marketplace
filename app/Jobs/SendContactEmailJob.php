<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendContactEmailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public array $contactData) {}

    public function handle(): void
    {
        Mail::to(Setting::get('contact_email') ?? config('mail.from.address'))
            ->send(new ContactMail($this->contactData));
    }
}