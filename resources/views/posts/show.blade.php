@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <span class="d-flex align-items-center mb-3">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle" style="max-width: 40px">
                    </div>
                    <span>
                        <div class="d-flex">
                            <a href="/profile/{{$post->user->id}}">
                                <p class="font-weight-bold text-dark p-0 m-0">{{ $post->user->username }}</p>
                            </a>
                            <span class="ml-3">
                                <a href="#">Follow</a>
                            </span>
                        </div>
                    </span>


                </span>
                <hr>
                <span class="d-flex">
                    <a href="/profile/{{$post->user->id}}">
                        <p class="font-weight-bold text-dark pr-2 m-0">{{ $post->user->username }}</p>
                    </a>
                    <p>{{ $post->caption }}</p>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection