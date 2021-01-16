<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    public function edit( User $user )
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact( 'user' ));
    }

    public function update ( User $user ) 
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'url' => ['url'],
            'image' => ''
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $profileImage = ['image' => $imagePath];

        }

        auth()->user()->profile()->update(array_merge(
            $data,
            $profileImage ?? []
            ));

        return redirect('/profile/' .auth()->user()->id);

    }
}
