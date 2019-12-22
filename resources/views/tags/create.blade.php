@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ isset($tag)? 'Edit Tag' : 'New Tag' }}</div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ isset($tag)? route('tags.update',['id'=>$tag->id]) : route('tags.store') }}" method="post">
            @csrf
            @if(isset($tag))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ isset($tag)? $tag->name : ' '}}">
            </div>

            <div class="form-group">
                    <button class="btn btn-success btn-block">
                        {{ isset($tag)? 'Update' : 'Create' }}
                </div>
        </form>
    </div>
</div>



@endsection
