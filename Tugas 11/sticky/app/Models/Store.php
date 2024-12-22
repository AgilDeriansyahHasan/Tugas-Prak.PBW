<?php

namespace App\Models;

use App\Observers\StoreObserver;
use Illuminate\Database\Eloquent\Attributes\ObserverdBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObserverdBy(StoreObserver::class)]

class Store extends Model
{
    protected $fillable=[
        'logo',
        'name',
        'slug',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
