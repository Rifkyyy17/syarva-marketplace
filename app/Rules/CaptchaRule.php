<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class CaptchaRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (app()->environment('testing')) {
            return;
        }

        // 1. Honeypot check: If honeypot is filled, it's a bot
        $honeypot = request()->input('_hp_check');
        if (! empty($honeypot)) {
            $fail('Verifikasi bot gagal. Terdeteksi aktivitas otomatis.');
            return;
        }

        // 2. Cloudflare Turnstile integration if configured
        $turnstileSecret = config('services.turnstile.secret_key');
        if (! empty($turnstileSecret) && ! empty($value)) {
            $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $turnstileSecret,
                'response' => $value,
                'remoteip' => request()->ip(),
            ]);

            if (! $response->json('success')) {
                $fail('Verifikasi Turnstile gagal. Silakan coba lagi.');
            }
            return;
        }

        // 3. Google reCAPTCHA integration if configured
        $recaptchaSecret = config('services.recaptcha.secret_key');
        if (! empty($recaptchaSecret) && ! empty($value)) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $recaptchaSecret,
                'response' => $value,
                'remoteip' => request()->ip(),
            ]);

            if (! $response->json('success')) {
                $fail('Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
            }
            return;
        }

        // 4. Built-in Cryptographic Anti-Bot Token Verification
        $token = (string) $value;
        $timestamp = request()->input('_captcha_ts');

        if (empty($token) || empty($timestamp)) {
            $fail('Harap centang "Saya bukan robot" untuk melanjutkan.');
            return;
        }

        // Check timestamp validity (must be at least 0.4s ago, and not older than 15 minutes)
        $timeDiff = microtime(true) - (float) $timestamp;
        if ($timeDiff < 0.4) {
            $fail('Pengisian form terlalu cepat. Silakan ulangi verifikasi.');
            return;
        }

        if ($timeDiff > 900) {
            $fail('Sesi verifikasi telah kedaluwarsa. Silakan muat ulang halaman.');
            return;
        }

        $expectedHash = hash_hmac('sha256', $timestamp . '|' . request()->ip() . '|' . session()->getId(), config('app.key'));

        if (! hash_equals($expectedHash, $token)) {
            $fail('Verifikasi keamanan gagal. Silakan centang ulang.');
        }
    }
}
