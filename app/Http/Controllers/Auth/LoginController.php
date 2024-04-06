<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return hybridly('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            session()->flash('success', 'Login successful');
            return redirect()->intended(route('dashboard'));
        }
        session()->flash('error', 'Invalid credentials');
        return hybridly(properties: $request->validated());
    }
}
