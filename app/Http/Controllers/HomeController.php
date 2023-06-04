<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        $posts = Post::public ()->latest()->paginate();

        $categories_top5 = Category::limit(5)->get();

        return view('welcome', compact('posts', 'post_top3', 'post_top6', 'categories_top5'));
    }

}
