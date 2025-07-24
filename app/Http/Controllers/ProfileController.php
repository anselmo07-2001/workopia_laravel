<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // @desc Update profile info
    // @route PUT /profile
    public function update(Request $request): RedirectResponse {
        $user = Auth::user();

        $validatedData = $request->validate([
            "name" => "required|string",
            "email" => "required|string|email"
        ]);

        $user->update($validatedData);

        // Update user info
        return redirect()->route("dashboard")->with("success", "Profile info updated!");
    }
}
