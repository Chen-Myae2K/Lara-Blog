@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post List</li>
        </ol>
    </nav>
    <div class="card">
        <x-card>
            <x-slot:title>Post List</x-slot:title>
            <div class="d-flex justify-content-between items-center mb-3">
                <div class="d-flex gap-3 items-center">
                    @if (request('keyword'))
                        <p>Search by : {{ request('keyword') }}</p>
                        <a href="{{ route('post.index') }}">
                            <i class="bi bi-trash"></i>
                        </a>
                    @endif
                </div>
                <div>
                    <form action="{{ route('post.index') }}" method="get" class="d-flex">
                        <input type="text" name="keyword" class="form-control me-2 " value="{{ request('keyword') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        @if (Auth::user()->role != 'author')
                            <th>Owner</th>
                        @endif

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
                            <td>{{ $post->category->title }}</td>
                            @notAuthor
                                <td>{{ $post->user->name }}</td>
                            @endnotAuthor
                            <td class=" ">
                                {{-- post ပေါ် မူတည်ပြီး update လုပ်ခွင့်ရှိမရှိ စစ်ဆေးတာပါ --}}
                                @can('update', $post)
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-info-circle"></i>
                                </a>

                                @can('delete', $post)
                                    <form action="{{ route('post.destroy', $post->id) }}" class="d-inline block"
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
                                    {{ $post->created_at->format('d M Y') }}</p>
                                <p class="small mb-0 text-black-50"> <i class="bi bi-clock me-1"></i>
                                    {{ $post->created_at->format('h:i A') }}</p>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">There is no post for {{ request('keyword') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </x-card>

    </div>
@endsection
