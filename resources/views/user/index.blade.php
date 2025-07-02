@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>User List</h4>
            <hr>
            <div class="d-flex justify-content-between items-center mb-3">

                <div class="d-flex gap-3 items-center">
                    @if (request('keyword'))
                        <p>Search by : {{ request('keyword') }}</p>
                        <a href="{{ route('user.index') }}">
                            <i class="bi bi-trash"></i>
                        </a>
                    @endif
                </div>
                <div>
                    <form action="{{ route('user.index') }}" method="get" class="d-flex">
                        <input type="text" name="keyword" class="form-control me-2 " value="{{ request('keyword') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td class=" ">
                                @can('update', $user)
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan
                                @can('delete', $user)
                                    <form action="{{ route('user.destroy', $user->id) }}" class="d-inline block"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                            <td>
                                <p class="small mb-0 text-black-50"> <i class="bi bi-calendar me-1"></i>
                                    {{ $user->created_at->format('d M Y') }}</p>
                                <p class="small mb-0 text-black-50"> <i class="bi bi-clock me-1"></i>
                                    {{ $user->created_at->format('h:i A') }}</p>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
