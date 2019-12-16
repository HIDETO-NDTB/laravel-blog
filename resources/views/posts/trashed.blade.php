@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">Trashed Posts</div>

                <div class="card-body">
                    @if($posts->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>Image</th>
                                <th>Title</th>

                                <th>Actions</th>
                            </thead>
                            <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td><img src="{{ asset('storage/'.$post->featured) }}" alt="{{ $post->title }}" height="100px" width="100px"
                                                style="border-radius: 50%"></td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <a href="{{ route('posts.restore',['id' => $post->id])}}" class="btn btn-warning">Restore</i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.kill',['id' => $post->id])}}" class="btn btn-danger">Destroy</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center">No Trashed Posts Found</p>
                        @endif
                </div>
            </div>
        </div>


@endsection
