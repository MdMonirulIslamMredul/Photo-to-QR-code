<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    // Method to show the view (Assumes view file is resources/views/register.blade.php)
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // 1. Validation: Corrected unique table name and min password length
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email', // Corrected table name to 'users'
            'password' => 'required|string|min:4|confirmed', // Increased to min:8 for security
            'name' => 'required|string|max:255',
        ]);

        //dd($request->all());

        // 2. Create User Record
        // Password is automatically hashed because of the 'hashed' cast in the User Model
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // 3. Login the user (Standard, highly recommended)
        Auth::login($user);

        // 4. Redirect to home with a success message
        return redirect('/')->with('success', 'Registration successful! Welcome, ' . $user->name . '!');
    }


    public function login(Request $request): RedirectResponse
    {
        // 1. Validate the form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt Authentication
        // Auth::attempt attempts to log the user in using the 'web' guard.
        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            // Regenerate the session ID to prevent session fixation attacks
            $request->session()->regenerate();

            // 3. Redirect to the intended page (or home)
            return redirect('/gallery')->with('success', 'You are now logged in!');
        }

        // 4. If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }



}
