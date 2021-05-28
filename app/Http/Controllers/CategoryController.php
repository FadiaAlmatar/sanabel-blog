<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CategoryAdded;
use Illuminate\Support\Facades\Notification;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: return category create view
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|min:4|max:255',
            'icon'             => 'required|url'
        ]);
         $category = Category::create($request->all());
        //  return redirect("/categories/index");
        // return view('category.show',['category'=> $category]);
        Notification::send(User::all() , new CategoryAdded($category));
        return redirect()->route('categories.show', $category)->with('success', 'The category was created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // TODO: return edit view with $category var
    //    $category = Category::findOrFail($id);
      // $post = Post::findOrFail($id);
        return view('category.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'             => 'required|min:4|max:255',
            'icon'             => 'required|url'
        ]);
        //$category = Category::update($request->all());
        // $category->name = $request->name;
        // $category->icon = $request->icon;
        // $category->save();
        $category->update($request->all());
        // return redirect()->route('categories.show', $category);//new
        return redirect()->route('categories.show', $category)->with('success', 'The category was updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->firstorfail()->delete();
        // return view('category.destroy');
        // $category->delete(); //new
        // return redirect()->route('categories.index');//new
        return redirect()->route('categories.index')->with('success', 'The category was deleted successfully');

    }
}
