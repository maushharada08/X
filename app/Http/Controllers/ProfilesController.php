<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    
    public function index(User $user){
        $follows = (auth()->user() ? auth()->user()->following->contains($user) : false);
        return view('profile.index', compact('user', 'follows'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'description' => 'required',
            'image' => '',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
