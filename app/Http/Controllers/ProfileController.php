<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // @desc Update profile info
    // @route PUT /profile
    public function update(Request $request): RedirectResponse {
        $user = Auth::user();

        $validatedData = $request->validate([
            "name" => "required|string",
            "email" => "required|string|email",
            "avatar" => "nullable|image|mimes:jpeg,jpg,png,gif|max:2048",
        ]);

        $user->name = $request->input("name");
        $user->email = $request->input("email");

        if ($request->hasFile("avatar")) {
            //Delete old avatar if exists
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            //Store new avatar
            $path = $request->file("avatar")->store("avatars", "public");

            // add path to validated data
            $user->avatar = $path;
        }

        $user->save();

        // Update user info
        return redirect()->route("dashboard")->with("success", "Profile info updated!");
    }
}
