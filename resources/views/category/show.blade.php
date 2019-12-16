@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Show Detales</div>
    <div class="card-body">
        <h2>{{ $category->name }}</h2>

        <a href="{{ route('category.edit',['id'=>$category->id])}}" class="btn btn-primary">Edit</a>
        <a href="{{ route('category.index')}}" class="btn btn-secondary float-right">Go Back</a>
    </div>
</div>

@endsection
