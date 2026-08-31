<?php

namespace App\Policies;

use App\Models\Inquiry;
use App\Models\User;

class InquiryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Inquiry $inquiry): bool
    {
        return $user->id === $inquiry->user_id || $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Inquiry $inquiry): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Inquiry $inquiry): bool
    {
        return $user->isAdmin();
    }
}
