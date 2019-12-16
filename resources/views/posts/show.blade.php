@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ $post->title }}</div>
    <div class="card-body">
        <img src="{{asset('storage/'.$post->featured)}}" alt="{{ $post->title }}" width="300px" height="250px">
        <p><strong>Descrription: </strong>
            <div> {!! $post->content !!} </div>
        </p>
        <a href="{{ route('posts.edit',['id'=>$post->id])}}" class="btn btn-primary">Edit</a>
        <a href="{{ route('posts.index')}}" class="btn btn-secondary float-right">Go Back</a>
    </div>
</div>

@endsection
