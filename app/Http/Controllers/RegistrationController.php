<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
     {
        
        // In Laravel, if validation doesn't pass, the user is redirected back to the form with the errors automatically
        // Validate the user
        $formAttributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // $formAttributes['password'] = bcrypt($formAttributes['password']);

        // Create and save the user
        $user = User::create($formAttributes);

        // Sign them in
        auth()->login($user);

        // Redirect to the home page
        return redirect(to: '/');
     }
}
