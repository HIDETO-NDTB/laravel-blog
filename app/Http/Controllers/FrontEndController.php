<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index(){
        $settings = Settings::first();
        $categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at','desc')->first();
        $second_post = Post::orderBy('created_at','desc')->take(1)->skip(1)->get()->first();
        $third_post = Post::orderBy('created_at','desc')->take(1)->skip(2)->get()->first();
        $first_category = Category::orderBy('created_at','desc')->first();
        $second_category = Category::orderBy('created_at','desc')->take(1)->skip(1)->get()->first();


        return view('index')->with('settings',$settings)
                            ->with('categories',$categories)
                            ->with('first_post',$first_post)
                            ->with('second_post',$second_post)
                            ->with('third_post',$third_post)
                            ->with('first_category',$first_category)
                            ->with('second_category',$second_category);
    }

    public function search(Request $request){
        $posts = Post::where('title','like','%'.request('query').'%')->get();

        return view('results')->with('posts',$posts)
                              ->with('title','Search Results: '.request('query'))
                              ->with('settings',Settings::first())
                              ->with('categories',Category::take(5)->get());
    }

    public function post_single($slug){

        $post = Post::where('slug',$slug)->first();

        $prev_id = Post::where('id','>',$post->id)->min('id');
        $next_id = Post::where('id','<',$post->id)->max('id');


        return view('single')->with('post',$post)
                              ->with('prev',Post::find($prev_id))
                              ->with('next',Post::find($next_id))
                              ->with('settings',Settings::first())
                              ->with('categories',Category::take(5)->get())
                              ->with('tags',Tag::all());
    }

    public function category_single(Category $category){


        return view('category')->with('category',$category)
                              ->with('settings',Settings::first())
                              ->with('categories',Category::take(5)->get());
    }

    public function tag_single(Tag $tag){

        return view('tag')->with('tag',$tag)
                          ->with('settings',Settings::first())
                          ->with('categories',Category::take(5)->get());
    }
}
