<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function index() {
        return [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@doe.com',
                'password' => '123456',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@doe.com',
                'password' => '123456',
            ]
            ];
        //return view('users', ['users' => User::all()]);
    }

    public function show() {

    }
}
