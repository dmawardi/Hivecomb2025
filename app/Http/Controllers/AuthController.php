<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('admin.profile.login');
    }

    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($credentials)) {
            // Redirect to intended page or home
            return redirect(route('home'))->with('status', 'You are logged in successfully.');
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('status', 'You have been logged out successfully.');
    }

    /**
     * Show the profile update form.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        return view('admin.profile.update');
    }

    public function updateProfile(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        // Update the authenticated user's profile
        $user = auth()->user();
        $user->update($request->only('name', 'email'));

        return redirect()->back()->with('status', 'Profile updated successfully.');
    }
}
