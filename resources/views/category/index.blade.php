@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category List</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Category List</h4>
            <hr>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Owner</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{ $category->title }}
                                <br>
                                <span class="badge bg-secondary"> {{ $category->slug }}</span>
                            </td>
                            <td>
                                {{ \App\Models\User::find($category->user_id)->name }}
                            </td>
                            <td class=" ">
                                @can('update', $category)
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan
                                @can('delete', $category)
                                    <form action="{{ route('category.destroy', $category->id) }}" class="d-inline block"
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
                                    {{ $category->created_at->format('d M Y') }}</p>
                                <p class="small mb-0 text-black-50"> <i class="bi bi-clock me-1"></i>
                                    {{ $category->created_at->format('h:i A') }}</p>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
