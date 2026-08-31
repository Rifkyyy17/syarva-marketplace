<x-mail::message>
# Pesan Baru dari Form Kontak

Anda menerima pesan baru dari halaman kontak **{{ $data['name'] }}** ({{ $data['email'] }}).

**Subjek:** {{ $data['subject'] }}

{{ $data['message'] }}

Terima kasih,
{{ config('app.name') }}
</x-mail::message>