<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Loginrequest $request)
    {
        $validatedData = $request->validated();

        return auth()->attempt($validatedData)
            ? redirect("/")->with("success", "Welcome Back " . auth()->user()->name)
            : back()
                ->withInput()
                ->withErrors(["email" => "your provided credentials are invalid"]);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect("/")->with("success", "Goodbye!");
    }
}