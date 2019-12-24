@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="Image not available right now" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ $post->user->profile->profileImage() }}" alt="Profile image Here" class="w-100 rounded-circle pr-1" style="max-width:30px;">
                    </div>
                    <div class="font-weight-bold">
                        {{ $post->user->username }}
                    </div>
                    <a href="#" style="padding-left: 10px;" class="font-weight-bold">Follow</a>
                </div>
                <hr>
                <div class="d-flex">
                    <div class="font-weight-bold pr-2">
                        {{ $post->user->username }}
                    </div>
                    <p>{{ $post->caption }}</p>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
