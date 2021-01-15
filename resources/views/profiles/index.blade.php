@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.flos10-1.fna.fbcdn.net/v/t51.2885-19/s150x150/54511297_987747778282765_5659303463331299328_n.jpg?_nc_ht=instagram.flos10-1.fna.fbcdn.net&_nc_ohc=5lpduYyIUIYAX8uAdHj&tp=1&oh=c2d8c93cd47158bc73ed3b2669f4fb46&oe=600ECA40" class="rounded-circle" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                <a href="/post/create">Add New Post</a>
            </div>
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
            <img src="/storage/{{$post->image}}" class="w-100 pb-4" />
        </div>
        @endforeach
       
    </div>
</div>
@endsection