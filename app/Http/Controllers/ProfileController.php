<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        if($user->role == 'teacher'){
            $teacher = Teacher::where('phone_number', $user->phone_number)->firstOrFail();
            return view('teacher.edit', ['teacher' => $teacher]);
        }

        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'gender' => ['required', 'in:male,female'],
        ]);

        $user = $request->user();

        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if($user->role == 'teacher'){
            $teacher = Teacher::where('phone_number', $user->phone_number)->firstOrFail();

            if ($teacher->delete()) {
                if($teacher->photo_left != 'placeholder_l.svg') {
                    $image_path = public_path() . '/teachers/' . $teacher->photo_left;
                    if (is_file($image_path) && file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                if($teacher->photo_right != 'placeholder_r.svg') {
                    $image_path = public_path() . '/teachers/' . $teacher->photo_right;
                    if (is_file($image_path) && file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
