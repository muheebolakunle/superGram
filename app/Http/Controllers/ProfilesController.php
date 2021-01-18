<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    //One method of passing properties to the view
    // public function index($user)
    // {
    //     $user = User::findOrFail($user);
    //     return view('profiles.index', [
    //         'user' => $user
    //     ]);
    // }

    public function index(User $user)
    {
        $postCount = Cache::remember(
            'count.post.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
            return $user->posts->count();
        }); 

        $followerCount = Cache::remember(
            'count.followers.' . $user->id, 
            now()->addSeconds(30), 
            function() use ($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view(
            'profiles.index', 
            compact(
                'user', 
                'follows', 
                'postCount', 
                'followerCount', 
                'followingCount'));
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
