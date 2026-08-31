<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Services\InquiryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function __construct(private readonly InquiryService $inquiryService)
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Inquiry::with(['listing' => fn ($q) => $q->withTrashed()])
            ->where('user_id', auth()->id())
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
        $inquiries = $query->latest()->paginate(10)->withQueryString();

        return view('user.inquiries.index', compact('inquiries', 'statuses'));
    }

    public function show(Inquiry $inquiry)
    {
        abort_unless($inquiry->user_id === auth()->id(), 403);

        $inquiry->load(['listing' => fn ($q) => $q->withTrashed()]);

        return view('user.inquiries.show', compact('inquiry'));
    }

    public function markReplied(Inquiry $inquiry): RedirectResponse
    {
        abort_unless($inquiry->user_id === auth()->id(), 403);

        return back()->with('info', 'Tindakan ini hanya tersedia untuk penjual.');
    }
}