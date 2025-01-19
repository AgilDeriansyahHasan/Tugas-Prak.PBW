<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Store;

class StorePolicy
{
    public function update(User $user, Store $store): Response
    {
        return $user->id === $store->user_id;
    }
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Store $store): bool
    {
        return $user->id === $store->user_id;
    }
}
