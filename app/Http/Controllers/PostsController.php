<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id'); 

        // dd($users);

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5); //latest()-orderBy('created_at', 'DESC')
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image'   => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200); //here it will bring the image and cut it to fit it to 1200*1200 no matter what if the image is larger the extra portion will get cut out
        $image->save();
        
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);
        // dd(request()->all());
    }

    public function show(\App\Post $post)
    {

        
        // dd($post->user->username);
        return view('posts.show', compact('post'));
    }
}
