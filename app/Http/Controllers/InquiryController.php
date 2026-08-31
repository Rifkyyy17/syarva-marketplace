<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Services\InquiryService;
use Illuminate\Http\RedirectResponse;

class InquiryController extends Controller
{
    public function __construct(private readonly InquiryService $inquiryService) {}

    public function store(StoreInquiryRequest $request): RedirectResponse
    {
        $this->inquiryService->create(array_merge($request->validated(), [
            'user_id' => auth()->id(),
        ]));

        return back()->with('success', 'Inquiry berhasil dikirim. Penjual akan segera menghubungi Anda.');
    }
}