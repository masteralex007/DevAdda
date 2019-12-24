@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-3" style="padding-top: 5%; padding-bottom:5%; width: 25%; height: 25%;">
            <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle" >
        </div>
        <div class="col-9" style="padding-top: 5%; padding-bottom:5%; width: 25%; height: 25%;">
                <div class=" d-flex justify-content-between align-item-baseline ">
                    <div class="d-flex pb-3 align-items-center">
                        <div class="h4 pr-3 font-weight-bold">{{ $user->username }}</div>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                    <a href="/p/create"  style="height: 2em;">Add New Post</a>
                    @endcan
                    
                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-3"><strong> {{ $postCount }} posts </strong></div>
                    <div class="pr-3"><strong> {{ $followersCount }} followers </strong></div>
                    <div class="pr-3"><strong> {{ $followingCount }} following </strong></div>
                </div>
                <div class="h5 font-italic"><strong>{{ $user->profile->title }}</strong></div>
                <div>{{ $user->profile->description }}</div>
                <div class="pt-2 pb-1 text-bold font-italic"><a href="www.unsplash.org"><strong>{{ $user->profile->url ?? 'N/A'}}</strong></a></div>   
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-4 pb-3">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="No images found">
            </a>
            </div>
        @endforeach
</div>
@endsection



