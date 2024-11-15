<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', Controllers\HomeController:: class);

Route::get('/about', [Controllers\AboutController:: class, 'index']);

Route::get('/contact', [Controllers\ContactController:: class, 'index']);

Route::get('/gallery', [Controllers\GalleryController:: class, 'index']);

Route::get('/users', [Controllers\UserController:: class, 'index']);

Route::get('/users/create', [Controllers\UserController:: class, 'create']);

Route::post('/users', [Controllers\UserController:: class, 'store']);

Route::get('/users/{user}',[Controllers\UserController::class, 'show']);

/*Route::get('articles/create', function(){
    \App\Models\Article::create([
        'title' => $title = 'My first article',
        'slug' => str($title)->slug(),
        'body' => $body = 'This is the body of my first article',
        'teaser'=> $teaser = str($body)->limit(160),
        'meta_title'=> $title,
        'meta_description' => $teaser,
    ]);
});

    Route::get('users', function(){
        $users=[
            ['id' => 1, 'name'=>'John Doe', 'email'=>'jane@parsinta.com'],
            ['id' => 2, 'name'=>'John Doe', 'email'=>'jane@parsinta.com'],
        ];

    return view('users.index', compact('users'));
    });*/


