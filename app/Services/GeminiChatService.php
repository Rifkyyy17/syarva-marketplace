<?php

namespace App\Services;

use App\Models\Listing;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GeminiChatService
{
    public function reply(string $userMessage, array $history = []): array
    {
        $apiKey = Setting::get('gemini_api_key') ?: config('services.gemini.api_key');
        $model = Setting::get('gemini_model') ?: config('services.gemini.model', 'gemini-2.5-flash');

        // Fetch active listings for context
        $listings = Listing::query()
            ->published()
            ->with(['category', 'province', 'city', 'propertyDetail', 'vehicleDetail', 'primaryImage'])
            ->latest()
            ->limit(30)
            ->get();

        $catalogSummary = $this->buildCatalogSummary($listings);

        if (empty($apiKey)) {
            return $this->fallbackResponse($userMessage, $listings);
        }

        try {
            $contents = [];

            // Add history
            foreach ($history as $msg) {
                $role = ($msg['role'] ?? 'user') === 'assistant' ? 'model' : 'user';
                $text = trim($msg['content'] ?? '');
                if (! empty($text)) {
                    $contents[] = [
                        'role' => $role,
                        'parts' => [['text' => $text]],
                    ];
                }
            }

            // Append current message
            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $userMessage]],
            ];

            $systemInstruction = $this->buildSystemInstruction($catalogSummary);

            $payload = [
                'system_instruction' => [
                    'parts' => [['text' => $systemInstruction]],
                ],
                'contents' => $contents,
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 1000,
                ],
            ];

            $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(30)->post($url, $payload);

            if ($response->successful()) {
                $json = $response->json();
                $replyText = $json['candidates'][0]['content']['parts'][0]['text'] ?? '';

                if (! empty($replyText)) {
                    $recommendedListings = $this->findMatchingListings($userMessage . ' ' . $replyText, $listings);

                    return [
                        'success' => true,
                        'message' => $replyText,
                        'recommendations' => $recommendedListings,
                    ];
                }
            }

            Log::warning('Gemini API request failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return $this->fallbackResponse($userMessage, $listings);
        } catch (\Throwable $e) {
            Log::error('GeminiChatService exception: ' . $e->getMessage());

            return $this->fallbackResponse($userMessage, $listings);
        }
    }

    private function buildSystemInstruction(string $catalogSummary): string
    {
        $siteName = Setting::get('site_name') ?? config('app.name', 'SYARVA Marketplace');
        $siteWa = Setting::get('contact_whatsapp') ?? '081234567890';

        return <<<PROMPT
Anda adalah **{$siteName} AI Assistant**, asisten virtual cerdas, ramah, dan profesional untuk platform jual beli properti dan otomotif (khususnya spesialis Honda Baru, Mobil Bekas, Rumah, dan Tanah) di Indonesia.

Tugas Anda:
1. Membantu pengguna mencari unit properti atau mobil yang sesuai dengan kebutuhan, lokasi, dan budget mereka.
2. Memberikan konsultasi terkait simulasi cicilan/DP kredit, legalitas (SHM/SHGB), dan fitur mobil (seperti Honda Sensing, VTEC Turbo, Honda CONNECT).
3. Merekomendasikan listing yang ada di katalog SYARVA di bawah ini secara akurat.
4. Menjelaskan cara titip jual rumah, tanah, atau mobil secara praktis langsung melalui Admin WhatsApp di nomor {$siteWa}.
5. Bersikap ramah, ringkas, terstruktur (gunakan bullet points jika perlu), dan persuasif. Arahkan pengguna untuk menghubungi Admin WhatsApp di nomor {$siteWa} untuk deal atau titip jual unit.

Berikut adalah data katalog unit listing AKTIF saat ini di {$siteName}:
{$catalogSummary}

Format jawaban Anda dalam Bahasa Indonesia yang santun, jelas, dan rapi menggunakan Markdown.
PROMPT;
    }

    private function buildCatalogSummary($listings): string
    {
        if ($listings->isEmpty()) {
            return "Saat ini belum ada listing aktif di database.";
        }

        $lines = [];
        foreach ($listings as $l) {
            $cat = $l->category?->name ?? '-';
            $loc = $l->location_label ?? ($l->city?->name ?? '-');
            $price = 'Rp ' . number_format((float) $l->price, 0, ',', '.');
            $url = route('listings.show', $l->slug);

            $spec = '';
            if ($l->isProperty() && $l->propertyDetail) {
                $pd = $l->propertyDetail;
                $spec = " | LT: {$pd->land_area}m2, LB: {$pd->building_area}m2, KT: {$pd->bedrooms}, KM: {$pd->bathrooms}, Sertifikat: {$pd->certificate}";
            } elseif ($l->isVehicle() && $l->vehicleDetail) {
                $vd = $l->vehicleDetail;
                $spec = " | {$vd->brand} {$vd->model} ({$vd->year}), {$vd->transmission}, {$vd->condition_label}";
            }

            $lines[] = "- [ID:{$l->id}] \"{$l->title}\" ({$cat}) - {$price} di {$loc}{$spec} (Link: {$url})";
        }

        return implode("\n", $lines);
    }

    private function findMatchingListings(string $context, $listings): array
    {
        $matches = [];
        $contextLower = mb_strtolower($context);

        foreach ($listings as $l) {
            $titleMatch = Str::contains($contextLower, mb_strtolower($l->title));
            $brandMatch = $l->vehicleDetail && Str::contains($contextLower, mb_strtolower($l->vehicleDetail->model));
            $idMatch = Str::contains($context, "[ID:{$l->id}]") || Str::contains($context, "ID:{$l->id}");

            if ($idMatch || $titleMatch || $brandMatch) {
                $matches[] = [
                    'id' => $l->id,
                    'title' => $l->title,
                    'price' => 'Rp ' . number_format((float) $l->price, 0, ',', '.'),
                    'location' => $l->location_label ?? ($l->city?->name ?? 'Indonesia'),
                    'category' => $l->category?->name ?? 'Listing',
                    'url' => route('listings.show', $l->slug),
                    'image' => $l->primary_image_url,
                ];
            }

            if (count($matches) >= 3) {
                break;
            }
        }

        // If no direct ID match, try keyword matching for relevant items
        if (empty($matches)) {
            foreach ($listings as $l) {
                $keywords = [
                    mb_strtolower($l->category?->name ?? ''),
                    mb_strtolower($l->city?->name ?? ''),
                    mb_strtolower($l->vehicleDetail?->brand ?? ''),
                    mb_strtolower($l->vehicleDetail?->model ?? ''),
                ];

                foreach ($keywords as $kw) {
                    if (! empty($kw) && strlen($kw) > 3 && Str::contains($contextLower, $kw)) {
                        $matches[] = [
                            'id' => $l->id,
                            'title' => $l->title,
                            'price' => 'Rp ' . number_format((float) $l->price, 0, ',', '.'),
                            'location' => $l->location_label ?? ($l->city?->name ?? 'Indonesia'),
                            'category' => $l->category?->name ?? 'Listing',
                            'url' => route('listings.show', $l->slug),
                            'image' => $l->primary_image_url,
                        ];
                        break;
                    }
                }

                if (count($matches) >= 3) {
                    break;
                }
            }
        }

        return $matches;
    }

    private function fallbackResponse(string $userMessage, $listings): array
    {
        $msgLower = mb_strtolower($userMessage);
        $recommendations = $this->findMatchingListings($userMessage, $listings);
        $siteWa = Setting::get('contact_whatsapp') ?? '081234567890';

        if (Str::contains($msgLower, ['honda', 'mobil', 'cr-v', 'hr-v', 'br-v', 'wr-v', 'brio', 'civic', 'city'])) {
            $reply = "Halo! Saya **SYARVA AI Assistant**. Untuk pilihan mobil **Honda Baru & Mobil Bekas Berkualitas**, kami memiliki katalog resmi dengan promo DP ringan, bunga spesial, serta garansi resmi Honda.\n\nBerikut beberapa rekomendasi unit yang tersedia di katalog kami saat ini. Anda juga dapat melihat katalog lengkap di menu **Honda Baru** atau langsung menghubungi Admin via WhatsApp untuk simulasi kredit.";
        } elseif (Str::contains($msgLower, ['rumah', 'tanah', 'properti', 'kavling', 'villa', 'bogor', 'jakarta'])) {
            $reply = "Halo! Untuk pencarian **Properti (Rumah & Tanah)**, kami menyediakan berbagai pilihan unit siap huni dengan legalitas aman (SHM/SHGB) dan lokasi strategis.\n\nBerikut beberapa unit properti yang mungkin cocok dengan pencarian Anda:";
        } elseif (Str::contains($msgLower, ['pasang', 'titip', 'iklan', 'jual', 'biaya'])) {
            $reply = "Untuk titip jual atau memasang unit properti (rumah/tanah) dan mobil di SYARVA, prosesnya sangat mudah dan langsung dibantu oleh Admin kami via WhatsApp.\n\nSilakan langsung hubungi **WhatsApp Admin di {$siteWa}** untuk mengirimkan foto dan spesifikasi unit Anda agar segera ditayangkan!";
        } else {
            $reply = "Halo! Saya **SYARVA Assistant**. Saya siap membantu Anda menemukan properti impian (Rumah & Tanah), mobil idaman (Honda Baru & Bekas bergaransi), simulasi kredit/DP OTR, hingga konsultasi titip jual unit.\n\nAda yang bisa saya bantu rekomendasikan untuk Anda hari ini?";
        }

        return [
            'success' => true,
            'message' => $reply,
            'recommendations' => $recommendations,
        ];
    }
}
