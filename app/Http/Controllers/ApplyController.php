<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'experience' => $request->input('experience'),
            'phone' => $request->input('phone'),
            'bio' => $request->input('bio'),
            // Update other attributes as needed
        ]);

        // Handle file uploads for cover letter, resume, avatar
        if ($request->hasFile('cover_letter')) {
            $coverLetter = $request->file('cover_letter')->store('public/files');
            $user->update(['cover_letter' => $coverLetter]);
        }

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('public/files');
            $user->update(['resume' => $resume]);
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('public/avatar');
            $user->update(['avatar' => $avatar]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
