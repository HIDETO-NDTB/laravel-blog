@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ isset($post)? 'Edit Post' : 'New Post' }}</div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ isset($post)? route('posts.update',['id'=>$post->id]) : route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ isset($post)? $post->title : ' '}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="ckeditor" cols="30" rows="10" class="form-control">{{ isset($post)? $post->content : ' '}}</textarea>
            </div>
            <div class="form-group">
                <input type="file" name="featured">
            </div>
            <div class="form-group">
                <select name="category_id" id="" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @if(isset($post))
                                @if($post->category_id == $category->id) selected @endif
                            @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach($tags as $tag)
                <div class="checkbox">
                    <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                        @if(isset($post))
                            @foreach($post->tags as $tag1)
                                @if($tag->id == $tag1->id) checked @endif
                            @endforeach
                        @endif>{{ $tag->name}}</label>

                </div>
                @endforeach
            </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">
                        {{ isset($post)? 'Update' : 'Create' }}
                </div>
        </form>
    </div>
</div>



@endsection
