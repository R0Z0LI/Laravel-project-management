<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;


class UserController extends Controller
{

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    if (auth()->attempt($formFields)) {
        $request->session()->regenerate();

        if (auth()->user()->isSuspended) {
            auth()->logout();
            return back()->withErrors(['email' => 'Your account is suspended. Please contact the administrator.']);
        }

        return redirect('dashboard');
    } else {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}


    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function dashboard() {
    $tasks = Task::where('userId', auth()->id())->get();

    return view('dashboard', [
        'tasks' => $tasks,
    ]);
}


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


        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['lastLogin'] = now();
        $formFields['isSuspended'] = false;
        $formFields['isAdmin'] = $formFields['isAdmin'] == "1" ? true : false;
    
        User::create($formFields);
    
        return redirect('users');
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
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['lastLogin'] = now();
        $formFields['isSuspended'] = false;
        $formFields['isAdmin'] = $formFields['isAdmin'] == "1"? true : false;

        $user->update($formFields);
        return redirect('users');
    }
    
    public function suspend(User $user) {
        $user->isSuspended = !$user->isSuspended;
        $user->save();
        return redirect('users');
    }
}
