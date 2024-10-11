<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth to get the authenticated user

class UserController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Pass the user data to the 'user.index' view
        return view('user.index', ['user' => $user]);
    }
}
