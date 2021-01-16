@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage()}}" class="rounded-circle w-100" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>

                @can( 'update', $user->profile )
                    <a href="/post/create">Add New Post</a>
                @endcan
            </div>
            @can( 'update', $user->profile )
                <a href="/profile/{{ $user->profile->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex pt-3">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>12k</strong> followers</div>
                <div class="pr-5"><strong>204</strong> following</div>
            </div>

            <div class="pt-3" style="font-weight: bold;">{{ $user->profile->title ?? '' }}</div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="#" style="color:black;">{{ $user->profile->url ?? '' }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach ($user->posts as $post)
        <div class="col-4">
            <a href="/post/{{ $post->id }}">
                <img src="/storage/{{$post->image}}" class="w-100 pb-4" />
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection