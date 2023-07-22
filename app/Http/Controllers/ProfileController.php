<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // $request->user()->name = $request->user()->username;

        return view('profile.edit', [
            'menu' => auth()->user()->roles[0]['name'] == "author" ? parent::$menuSidebar : parent::$memberMenuSidebar,
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $data = $request->validated();

        // Proses file gambar yang diunggah
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/images/profiles');
            $data['photo'] = 'storage/' . str_replace('public/', '', $photoPath);
            // dd($data['photo']);
        }

        // Perbarui data pengguna
        $user->fill($data);

        // Reset email_verified_at jika email berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
