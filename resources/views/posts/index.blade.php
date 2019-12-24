@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{ $post->user->id }}"><img src="/storage/{{ $post->image }}" alt="Image not available right now" class="w-100"></a>
        </div>
    </div>
    <div class="row pt-1 pb-4">
            <div class="col-6 offset-3">
                <div class="d-flex">
                    <div class="font-weight-bold pr-2">
                        <a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </div>
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
