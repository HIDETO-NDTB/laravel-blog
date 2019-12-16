@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">All Users</div>

                <div class="card-body">
                    @if($users->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                    @foreach($users as $user)
                                    @if(Auth::id()!== $user->id)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if($user->admin)
                                                    <a href="{{ route('user.not_admin',['id'=>  $user->id]) }}" class="btn btn-danger">Remove Permission</a>
                                                @else
                                                    <a href="{{ route('user.admin',['id'=>  $user->id]) }}" class="btn btn-success">Make Admin</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('user.destroy',['id' => $user->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif

                                    @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center">No Users Found</p>
                        @endif
                </div>
            </div>
        </div>


@endsection
