<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\Author\AuthorService;
use App\Services\Member\MemberService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private $authorService;
    private $memberService;

    function __construct(AuthorService $authorService, MemberService $memberService)
    {
        $this->authorService = $authorService;
        $this->memberService = $memberService;
    }

    public function dashboard()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        if ($user->hasRole('admin')) {
            return view('admin.dashboard', [
                // 'menu' => parent::$menuSidebar
            ]);
        } elseif ($user->hasRole('author')) {
            return view('author.dashboard', [
                'menu' => parent::$menuSidebarauthor,
                'data' => $this->authorService->dashboard(),
            ]);
        } else {
            return view('member.dashboard', [
                'menu' => parent::$memberMenuSidebar,
                'data' => $this->memberService->dashboard(),
            ]);
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'menu' => auth()->user()->roles[0]['name'] == "author" ? parent::$menuSidebarauthor : parent::$memberMenuSidebar,
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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
