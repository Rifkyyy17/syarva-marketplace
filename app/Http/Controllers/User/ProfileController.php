<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(private readonly ImageService $imageService)
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('user.profile');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $oldAvatar = $user->avatar;
            $data['avatar'] = $this->imageService->upload($request->file('avatar'), 'avatars');

            if ($oldAvatar) {
                $this->imageService->delete($oldAvatar);
            }
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}