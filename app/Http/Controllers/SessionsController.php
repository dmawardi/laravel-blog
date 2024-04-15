<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        $form = request()->validate([
            'email' => ['required', 'max:255', 'exists:users,email'],
            'password' => ['required', 'max:255']
        ]);
        
        // Attempt attempts to login user
        $loginSuccess = auth()->attempt($form);

        // If failed to login
        if (! $loginSuccess) {
            // Redirect back
            return back()
            // Flash user's old input
            ->withInput()
            // Add error
            ->withErrors('email', "Your provided credentials could not be verified");
        }
        // If login successful
        // Regenerate session (in case of previous login)
        session()->regenerate();
        return redirect('/')->with('success', 'Logged in!');
    }

    public function destroy() {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Goodbye!');
    }
}
