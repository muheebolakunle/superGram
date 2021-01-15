<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

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
        return view('profiles.edit', compact( 'user' ));
    }

    public function update ( User $user ) 
    {
        $data = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'url' => ['url'],
            'image' => ''
        ]);

        auth()->user()->profile()->update($data);

        return redirect('/profile/' .auth()->user()->id);

    }
}
