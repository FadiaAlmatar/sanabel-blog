<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
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
        //
        $tags = Tag::all();
        return view('tag.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'             => 'required|min:4|max:255',
            'slug'             => 'required'
        ]);
         $tag = Tag::create($request->all());
         //return redirect("/tags/index");
        //  return view('tag.show',['tag'=> $tag]);
        //  return redirect()->route('tags.index');//new

        return redirect()->route('tags.show', $tag)->with('success', 'The Tag was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('tag.show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('tag.edit',['tag'=>$tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tag)
    {
        $request->validate([
            'name'             => 'required|min:4|max:255',
            'slug'             =>'required'
        ]);
        // $tag = Tag::update($request->all());
        // $tag->name = $request->name;
        // $tag->slug = $request->slug;
        // $tag->save();
        $tag->update($request->all());//new
        // return redirect()->route('tags.index');//new
        return redirect()->route('tags.show', $tag)->with('success', 'The Tag was updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $tag = Tag::where('id', $id)->firstorfail()->delete();
            //   return view('tag.destroy');
            // $tag->delete();
            return redirect()->route('tags.index')->with('success', 'The Tag was deleted successfully');


    }
}
