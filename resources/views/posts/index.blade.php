@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{$post->user_id}}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
            <span class="d-flex">
                <a href="/profile/{{$post->user->id}}">
                    <p class="font-weight-bold text-dark pr-2 m-0">{{ $post->user->username }}</p>
                </a>
                <p>{{ $post->caption }}</p>
            </span>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection