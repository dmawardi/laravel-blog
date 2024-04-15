<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy() {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Goodbye!');
    }
}
