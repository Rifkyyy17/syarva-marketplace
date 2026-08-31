<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Services\InquiryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    public function __construct(private readonly InquiryService $inquiryService) {}

    public function index(Request $request)
    {
        $query = Inquiry::with(['listing' => fn ($q) => $q->withTrashed(), 'seller'])
            ->when($request->input('status'), fn ($q, $s) => $q->where('status', $s))
            ->when($request->input('q'), function ($q, $term) {
                $like = '%'.mb_strtolower(trim($term)).'%';
                $q->where(function ($w) use ($like) {
                    $w->whereRaw('LOWER(name) LIKE ?', [$like])
                        ->orWhereRaw('LOWER(email) LIKE ?', [$like])
                        ->orWhereHas('listing', fn ($l) => $l->whereRaw('LOWER(title) LIKE ?', [$like]));
                });
            });

        $statuses = [Inquiry::STATUS_NEW, Inquiry::STATUS_READ, Inquiry::STATUS_REPLIED];
        $inquiries = $query->latest()->paginate(15)->withQueryString();

        return view('admin.inquiries.index', compact('inquiries', 'statuses'));
    }

    public function show(Inquiry $inquiry)
    {
        $inquiry->load(['listing' => fn ($q) => $q->withTrashed(), 'seller', 'user']);

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in([Inquiry::STATUS_NEW, Inquiry::STATUS_READ, Inquiry::STATUS_REPLIED])],
        ]);

        $this->inquiryService->markStatus($inquiry, $data['status']);

        return back()->with('success', 'Status inquiry diperbarui.');
    }
}