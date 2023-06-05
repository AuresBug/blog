<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {

        $this->authorizeResource(Category::class, 'category');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * @param Type $var
     */
    public function getIndexTable()
    {
        $this->authorize('viewAny', Category::class);

        return Laratables::recordsOf(Category::class);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $fields = $request->validated();

        $category = Category::updateOrCreate($fields);

        return redirect()->route('categories.edit', $category)->with('toast_success', 'Registro guardado.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return redirect()->route('categories.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $fields = $request->validated();

        $category->update($fields);

        return redirect()->route('categories.edit', $category)->with('toast_success', 'Registro actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('toast_success', 'Registro eliminado.');
    }
}
