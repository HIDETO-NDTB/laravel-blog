<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;
use App\Tag;

class TagsController extends Controller
{
    public function index(){
        return view('tags.index')->with('tags',Tag::all());
    }

    public function create(){
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:tags'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success','Tag Created Successfully');
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('tags.show')->with('tag',$tag);
    }

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag',$tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'name' => 'required|unique:tags'
        ]);

        $tag->fill($request->input())->save();


        Session::flash('success','Tag Updated Successfully');
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        Session::flash('success','Tag Deleted successfully');
        return redirect()->route('tags.index');
    }
}
