<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.settings');
    }

    public function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        auth()->user()->update(['password' => $request->password]);

        return back()->with('success', 'Password berhasil diubah.');
    }
}