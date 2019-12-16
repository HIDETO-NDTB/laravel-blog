<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //validation
        /*$this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'featured' => 'required|image'
        ]);*/

        //store into database
        /*$post = new Post;
        $post->title = $request->title; // Laravel Blog
        $post->slug = str_slug($request->title); // laravel-blog
        $post->content = $request->content;*/

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        //Storage::put('uploads/posts/',$featured_new_name);
        //$featured->move('uploads/posts',$featured_new_name);
        Storage::disk('public')->put($featured_new_name,file_get_contents($featured));

        //Mass Assignment
        $post = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'featured' => $featured_new_name
        ]);

        //$post->featured =$featured_new_name;

        $post->save();

        //return redirect to index page
        Session::flash('success','Post stored successfully');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$image = Storage::disk('public')->get($post->featured);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //validation
        /*$this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'featured' => 'nullable|image'
        ]);*/

        // update into database
        /*$post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->content = $request->content;*/

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured = asset('uploads/posts/'.$featured_new_name);
        }

        $post->fill($request->input())->save();

        //$post->save();

        //return redirect to index page
        Session::flash('success','Post Updated successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('success','Posts deleted successfully');
        return redirect()->route('posts.index');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$posts);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post restored successfully');
        return redirect()->route('posts.index');
    }

    public function kill($id){

        $post = Post::withTrashed()->where('id',$id)->first();

        Storage::disk('public')->delete($post->featured);

        $post->forceDelete();
        Session::flash('success','Post destroyed successfully');
        return redirect()->route('posts.trashed');
    }
}
