@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ isset($category)? 'Edit Category' : 'New Category' }}</div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ isset($category)? route('category.update',['id'=>$category->id]) : route('category.store') }}" method="post">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ isset($category)? $category->name : ' '}}">
            </div>

            <div class="form-group">
                    <button class="btn btn-success btn-block">
                        {{ isset($category)? 'Update' : 'Create' }}
                </div>
        </form>
    </div>
</div>



@endsection
