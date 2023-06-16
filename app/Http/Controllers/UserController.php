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
    
        // This will print the contents of $formFields and stop the script.
        //dd($formFields);
    
        User::create($formFields);
    
        return redirect()->back();
    }
    
}
