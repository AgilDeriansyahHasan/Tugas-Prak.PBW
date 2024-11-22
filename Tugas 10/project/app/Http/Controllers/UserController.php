<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = user::query()->get();

        return view('users.index', [
            'users'=>$users,
        ]);
    }

    public function create()
    {
        return view('users.form',[
    'user' => new User(),
    'page_meta'=>[
        'title'=>'Create new user',
        'method'=>'post',
        'url'=> route('users.store'),
        'submit_text' => 'Create',
    ],
    ]);
    }

    public function store (UserRequest $request)
    {
        User::create( $request->validated());
        return to_route('users.index');
    }

    public function show(User $user)
    {
        return view('users/show',[
            'user'=>$user,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.form',[
            'user'=>$user,
                'page_meta'=>[
                    'title'=>'Edit user : ' . $user->name,
                    'method'=>'put',
                    'url'=>route('users.update', $user->id),
                    'submit_text' => 'Update',
                ],
                ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update( $request->validated());

        return to_route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index');
    }
}
