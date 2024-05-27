<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{


    public function index()
    {
        $profile = Auth::user()->profile;
        
        return view('dashboard.profile.index',compact('profile'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id)
    {
        $profile = Profile::where('id_user',$id)->first();
        return view('dashboard.profile.form', compact('profile'));
        
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::where('id_user',$id)->first();
        $user = User::find($id);
        
        $user->name = $request->name;
        $profile->no_hp = $request->no_hp;
        $profile->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $file->storeAs('public/profile', $file->hashName());
            $patch = 'storage/profile/'.$file->hashName();
            $profile->foto_profil = $patch;
        }else{
            $profile->foto_profil = $profile->foto_profil;
        }
    
        $user->save();
        $profile->save();
        
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    
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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    
}
