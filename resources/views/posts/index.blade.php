@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">All Posts</div>

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
                                            <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" height="100px" width="100px"
                                                style="border-radius: 50%"></td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <a href="{{ route('posts.show',['id' => $post->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('posts.destroy',['id' => $post->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center">No Posts Found</p>
                        @endif
                </div>
            </div>
        </div>


@endsection
