<?php

namespace Tests\Feature;

use App\Jobs\SendContactEmailJob;
use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    private function contactPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Tanya harga rumah',
            'message' => 'Apakah harga rumah di Pondok Indah masih bisa nego?',
        ], $overrides);
    }

    public function test_contact_form_dispatches_email_job_to_queue(): void
    {
        Queue::fake();
        Mail::fake();
        Setting::set('contact_email', 'admin@syarva.test');

        $this->post(route('contact.send'), $this->contactPayload())
            ->assertRedirect()
            ->assertSessionHas('success');

        Queue::assertPushed(SendContactEmailJob::class, function ($job) {
            return $job->contactData['email'] === 'budi@example.com';
        });
        Mail::assertNotSent(ContactMail::class);
    }

    public function test_contact_form_requires_valid_data(): void
    {
        $this->post(route('contact.send'), [])
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->post(route('contact.send'), $this->contactPayload(['email' => 'bukan-email', 'message' => 'pendek']))
            ->assertSessionHasErrors(['email', 'message']);
    }

    public function test_contact_form_is_rate_limited(): void
    {
        Queue::fake();

        for ($i = 0; $i < 3; $i++) {
            $this->post(route('contact.send'), $this->contactPayload());
        }

        $this->post(route('contact.send'), $this->contactPayload())
            ->assertSessionHasErrors(['email' => 'Terlalu banyak permintaan. Silakan coba lagi dalam beberapa menit.']);
    }
}