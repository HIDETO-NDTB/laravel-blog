@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">All Posts</div>

                <div class="card-body">
                    @if($tags->count() > 0)
                        <table class="table table-striped">
                            <thead>

                                <th>Name</th>

                                <th>Actions</th>
                            </thead>
                            <tbody>
                                    @foreach($tags as $tag)
                                        <tr>

                                            <td>{{ $tag->name }}</td>
                                            <td>
                                                <a href="{{ route('tags.show',['id' => $tag->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('tags.destroy',['id' => $tag->id])}}" method="post">
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
                            <p class="text-center">No Tags Found</p>
                        @endif
                </div>
            </div>
        </div>


@endsection
