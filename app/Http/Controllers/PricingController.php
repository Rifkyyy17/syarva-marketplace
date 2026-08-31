<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Setting;

class PricingController extends Controller
{
    public function index()
    {
        $plans = Plan::active()->get();
        $adminWhatsapp = Setting::get('contact_whatsapp') ?? '6281234567890';
        $adminWhatsappClean = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $adminWhatsapp));

        return view('pages.pricing', compact('plans', 'adminWhatsappClean'));
    }
}
