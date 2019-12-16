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
                    <button class="btn btn-success btn-block">
                        {{ isset($post)? 'Update' : 'Create' }}
                </div>
        </form>
    </div>
</div>



@endsection
