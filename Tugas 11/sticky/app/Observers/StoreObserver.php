<?php

namespace App\Observers;
use App\Models\StoreRequest;

class StoreObserver
{
    public function creating(Store $store): void
    {
        $store->slug=str->slug($store->name);

    }

    public function created()
    {

    }
}
