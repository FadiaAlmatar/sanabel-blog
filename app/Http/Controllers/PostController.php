<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Models\User;
use App\Notifications\PostPublished;
use Illuminate\Support\Facades\Notification;
// use Request;

class PostController extends Controller
{
//     protected $request;

//    public function __construct(\Illuminate\Http\Request $request)
//    {
//        $this->request = $request;
//    }
public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
    $this->middleware('verified')->only('create');
}
public function index()
    {
        $posts = Post::paginate(6);

        return view('post.index', ['posts' => $posts]);
    }

    public function create ()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    // public function show ($id) {
    //     $post = Post::findOrFail($id);
    //     return view('post.show', ['post' => $post]);
    // }
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function store (Request $request) {
        $request->validate([
            // 'title'             => 'required|min:4|max:255',
            // 'featured_image'    => 'required',
            // 'content'           => 'required|min:4',
            // 'category_id'       => 'required|numeric|exists:categories,id',
            // 'tags'              => 'array',

            'title'                     => 'required|min:4|max:255',
            'content'                   => 'required|min:4',
            'category_id'               => 'required|numeric|exists:categories,id',
            'tags'                      => 'array',
            'featured_image_url'        => 'required_without:featured_image_upload|url|nullable',
            'featured_image_upload'     => 'required_without:featured_image_url|file|image',
        ]);

        // $post = Post::create($request->all());
        // $post->tags()->sync($request->tags);
        // return redirect()->route('posts.show', $post);
        //return redirect("/posts/{$post->id}");
        $post = new Post();
        $post->title = $request->title;
        $post->featured_image = $request->featured_image;
        if ($request->has('featured_image_upload')) {
            $image = $request->featured_image_upload;
            $path = $image->store('post-images', 'public');
            $post->featured_image = $path;
        } else {
            $post->featured_image = $request->featured_image_url;
        }
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.show', $post)->with('success', 'The post was created successfully');

    }

    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', ['post' => $post,'categories' => $categories,'tags' => $tags]);
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title'                     => 'required|min:4|max:255',
            'content'                   => 'required|min:4',
            'category_id'               => 'required|numeric|exists:categories,id',
            'tags'                      => 'array',
            'featured_image_url'        => 'required_without:featured_image_upload|url|nullable',
            'featured_image_upload'     => 'required_without:featured_image_url|file|image',
        ]);
        // $post->update($request->all());
        // $post->tags()->sync($request->tags);
        $post->title = $request->title;
        $post->featured_image = $request->featured_image;
        if ($request->has('featured_image_upload')) {
            $image = $request->featured_image_upload;
            $path = $image->store('post-images', 'public');
            $post->featured_image = $path;
        } else {
            $post->featured_image = $request->featured_image_url;
        }
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        Notification::send(User::all() , new PostPublished($post));
        return redirect()->route('posts.show', $post)->with('success', 'The post was updated successfully');

    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->firstorfail()->delete();
        // $post->delete();
        // $post->save();
        // return view('post.destroy');
        return redirect()->route('home')->with('success', 'The post was deleted successfully');

    }
}
