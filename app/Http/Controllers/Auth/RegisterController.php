<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return hybridly('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        if (!$user) {
            session()->flash('error', 'Registration failed');
            return hybridly(properties: $request->validated());
        }
        session()->flash('success', 'Registration successful');
        return redirect()->route('auth.login');
    }
}
