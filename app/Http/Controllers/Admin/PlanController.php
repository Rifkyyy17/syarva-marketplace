<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(Request $request): View
    {
        $plans = Plan::query()
            ->when($request->filled('q'), fn ($q) => $q->where('name', 'like', '%' . $request->q . '%'))
            ->orderBy('sort_order')
            ->get();

        return view('admin.plans.index', compact('plans'));
    }

    public function create(): View
    {
        $plan = new Plan([
            'duration_days' => 30,
            'listing_limit' => 10,
            'featured_limit' => 2,
            'sort_order' => (Plan::max('sort_order') ?? 0) + 1,
            'is_active' => true,
            'is_featured' => false,
        ]);

        return view('admin.plans.create', compact('plan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePlan($request);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['features'] = $this->parseFeatures($request->input('features_text'));
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        Plan::create($validated);

        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Paket membership berhasil ditambahkan.');
    }

    public function edit(Plan $plan): View
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan): RedirectResponse
    {
        $validated = $this->validatePlan($request, $plan->id);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['features'] = $this->parseFeatures($request->input('features_text'));
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $plan->update($validated);

        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Paket membership "' . $plan->name . '" berhasil diperbarui.');
    }

    public function toggleStatus(Plan $plan): RedirectResponse
    {
        $plan->update(['is_active' => ! $plan->is_active]);

        $status = $plan->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', 'Paket "' . $plan->name . '" berhasil ' . $status . '.');
    }

    public function destroy(Plan $plan): RedirectResponse
    {
        $name = $plan->name;
        $plan->delete();

        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Paket "' . $name . '" berhasil dihapus.');
    }

    private function validatePlan(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:100', 'unique:membership_plans,slug,' . $id],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'listing_limit' => ['required', 'integer', 'min:1', 'max:99999'],
            'featured_limit' => ['required', 'integer', 'min:0', 'max:99999'],
            'badge_label' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ], [
            'name.required' => 'Nama paket wajib diisi.',
            'price.required' => 'Harga wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'duration_days.required' => 'Durasi hari wajib diisi.',
            'listing_limit.required' => 'Kuota listing wajib diisi.',
            'featured_limit.required' => 'Kuota unggulan wajib diisi.',
        ]);
    }

    private function parseFeatures(?string $text): array
    {
        if (empty($text)) {
            return [];
        }

        $lines = explode("\n", str_replace("\r", "", $text));
        $features = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (! empty($trimmed)) {
                $features[] = ltrim($trimmed, '-*• ');
            }
        }

        return $features;
    }
}
