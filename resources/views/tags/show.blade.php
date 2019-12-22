@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Show Detales</div>
    <div class="card-body">
        <h2>{{ $tag->name }}</h2>

        <a href="{{ route('tags.edit',['id'=>$tag->id])}}" class="btn btn-primary">Edit</a>
        <a href="{{ route('tags.index')}}" class="btn btn-secondary float-right">Go Back</a>
    </div>
</div>

@endsection
