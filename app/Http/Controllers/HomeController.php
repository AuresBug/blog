<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {

        $post_top3 = Post::public ()->latest()->take(3)->get();
        $post_top6 = Post::public ()->latest()->skip(3)->take(3)->get();

        $posts = Post::public ()
        // ->whereNotIn('id', Arr::collapse([$post_top3->modelKeys(), $post_top6->modelKeys()]))
            ->latest()
            ->paginate();

        return view('welcome', compact('posts', 'post_top3', 'post_top6'));
    }

}
