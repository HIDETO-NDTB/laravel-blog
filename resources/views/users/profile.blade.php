@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Edit Settings</div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="avatar">Uploiad New Avatar</label>
                <input type="file" name="avatar">
            </div>
            <div class="form-group">
                <label for="about">About me</label>
                <textarea name="about" id="" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
                <input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}">
            </div>
            <div class="form-group">
                <label for="linkedin">Linkedin Profile</label>
                <input type="text" class="form-control" name="linkedin" value="{{ $user->profile->linkedin }}">
            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update Profile</button>

            </div>
        </form>
    </div>
</div>



@endsection

