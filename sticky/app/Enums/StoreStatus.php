<?php

namespace App\Enums;

enum StoreStatus: string
{
    case ACTIVE = 'active';
    case PENDING = 'pending';
}