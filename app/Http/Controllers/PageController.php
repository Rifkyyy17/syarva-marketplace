<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmailJob;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        $contact = [
            'phone' => Setting::get('contact_phone'),
            'email' => Setting::get('contact_email'),
            'address' => Setting::get('contact_address'),
            'whatsapp' => Setting::get('contact_whatsapp'),
            'social' => [
                'facebook' => Setting::get('social_facebook'),
                'instagram' => Setting::get('social_instagram'),
                'twitter' => Setting::get('social_twitter'),
                'youtube' => Setting::get('social_youtube'),
            ],
        ];

        return view('pages.contact', compact('contact'));
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subjek wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min' => 'Pesan minimal 10 karakter.',
        ]);

        $key = 'contact:'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['email' => 'Terlalu banyak permintaan. Silakan coba lagi dalam beberapa menit.']);
        }
        RateLimiter::hit($key, 600);

        SendContactEmailJob::dispatch($data);

        return back()->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
    }
}