@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post List</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Post List</h4>
            <hr>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td class="w-25">
                                {{ $post->title }}
                            </td>
                            <td>{{ \App\Models\Category::find($post->category_id)->title }}</td>
                            <td>{{ \App\Models\User::find($post->user_id)->name}}</td>
                            <td class=" ">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('post.destroy', $post->id) }}" class="d-inline block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                            <td>

                                <p class="small mb-0 text-black-50"> <i class="bi bi-calendar me-1"></i>
                                    {{ $post->created_at->format('d M Y') }}</p>
                                <p class="small mb-0 text-black-50"> <i class="bi bi-clock me-1"></i>
                                    {{ $post->created_at->format('h:i A') }}</p>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
            <div class="">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
