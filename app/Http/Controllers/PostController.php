<?php

namespace App\Http\Controllers;

use App\Enums\EnumPostStatuses;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{

    public function __construct()
    {

        $this->authorizeResource(Post::class, 'post');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.posts.index');
    }

    /**
     * @param Type $var
     */
    public function getIndexTable()
    {

        $this->authorize('viewAny', Post::class);

        return Laratables::recordsOf(Post::class);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = EnumPostStatuses::getAll();

        return view('admin.posts.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $fields = $request->validated();

        [$keys, $values] = Arr::divide($request->allFiles());

        $post = Post::updateOrCreate(Arr::except($fields, $keys));

        if ($request->hasFile('image') && !FilesController::saveFile($request->file('image'), $post, 'public')) {
            return redirect()->route('users.edit', $post)->with('toast_error', 'Algo salio mal. Intente de nuevo!');
        }

        return redirect()->route('posts.edit', $post)->with('toast_success', __('Saved.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return redirect()->route('posts.edit', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $statuses = EnumPostStatuses::getAll();

        return view('admin.posts.edit', compact('post', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $fields = $request->validated();

        [$keys, $values] = Arr::divide($request->allFiles());

        $post->update(Arr::except($fields, $keys));

        if ($request->hasFile('image') && !FilesController::saveFile($request->file('image'), $post, 'public')) {
            return redirect()->route('users.edit', $post)->with('toast_error', 'Algo salio mal. Intente de nuevo!');
        }

        return redirect()->route('posts.edit', $post)->with('toast_success', __('Saved.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('toast_success', 'Registro eliminado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    function public ($post) {

        $post = Post::public ()
            ->whereSlug($post)
            ->firstOrFail();

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function preview(Post $post)
    {

        return view('admin.posts.preview', compact('post'));
    }

}
