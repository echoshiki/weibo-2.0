<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{

    public function update(User $currentUser, User $user) {
        return $currentUser->is_admin || $currentUser->id === $user->id;
    }

    public function destroy(User $currentUser, User $user) {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
