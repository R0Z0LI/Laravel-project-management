<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index() {
        return view('users.users', [
            'heading' => 'Users',
            'users' => User::all(),
        ]);
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect('users');
    }

    public function create() {
        return view('users.create');
    }


    public function store(Request $request) {
        $formFields = $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email',
            'password' =>'required|min:6',
            'isAdmin' => 'required|in:0,1',
        ]);
    
        $formFields['lastLogin'] = now();
        $formFields['isSuspended'] = false;
        $formFields['isAdmin'] = $formFields['isAdmin'] == "1" ? true : false;
    
        User::create($formFields);
    
        return redirect()->back();
    }

    public function edit(User $user) {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $formFields = $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email',
            'password' =>'required|min:6',
            'isAdmin' =>'required|in:0,1',
        ]);
        $formFields['lastLogin'] = now();
        $formFields['isSuspended'] = false;
        $formFields['isAdmin'] = $formFields['isAdmin'] == "1"? true : false;

        $user->update($formFields);
        return redirect()->back();
    }
    
}
