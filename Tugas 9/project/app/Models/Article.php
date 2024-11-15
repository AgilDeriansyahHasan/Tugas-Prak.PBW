<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable =[
        'title',
        'slug',
        'body',
        'teaset',
        'meta_title',
        'meta_description',
    ];
}
