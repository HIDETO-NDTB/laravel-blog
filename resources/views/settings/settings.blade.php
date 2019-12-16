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

        <form action="{{ route('settings.update') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}">
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="tel" class="form-control" name="contact_number" value="{{ $settings->contact_number }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $settings->address }}">
            </div>

            <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update</button>

            </div>
        </form>
    </div>
</div>



@endsection
