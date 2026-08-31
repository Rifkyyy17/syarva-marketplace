<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit(?string $section = 'website')
    {
        $sections = ['website', 'icons', 'seo', 'contact', 'social', 'ai'];
        $section = in_array($section, $sections, true) ? $section : 'website';

        $settings = Setting::allCached();

        return view('admin.settings.index', compact('sections', 'section', 'settings'));
    }

    public function update(SettingsRequest $request, string $section): RedirectResponse
    {
        $validated = $request->validated();

        if ($section === 'website') {
            // Handle logo upload / removal
            if ($request->hasFile('site_logo')) {
                $oldLogo = Setting::get('site_logo');
                if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                    Storage::disk('public')->delete($oldLogo);
                }
                $logoPath = $request->file('site_logo')->store('branding', 'public');
                Setting::set('site_logo', $logoPath);
            } elseif ($request->boolean('remove_logo')) {
                $oldLogo = Setting::get('site_logo');
                if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                    Storage::disk('public')->delete($oldLogo);
                }
                Setting::set('site_logo', null);
            }

            // Handle favicon upload / removal
            if ($request->hasFile('site_favicon')) {
                $oldFavicon = Setting::get('site_favicon');
                if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                    Storage::disk('public')->delete($oldFavicon);
                }
                $faviconPath = $request->file('site_favicon')->store('branding', 'public');
                Setting::set('site_favicon', $faviconPath);
            } elseif ($request->boolean('remove_favicon')) {
                $oldFavicon = Setting::get('site_favicon');
                if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                    Storage::disk('public')->delete($oldFavicon);
                }
                Setting::set('site_favicon', null);
            }

            unset($validated['site_logo'], $validated['site_favicon'], $validated['remove_logo'], $validated['remove_favicon']);
        }

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        Cache::forget('settings.all');

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}