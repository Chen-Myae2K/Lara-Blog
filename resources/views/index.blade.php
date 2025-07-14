@extends('master')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <h1 class="text-center">Blog Post</h1>
                <div class="">
                    @isset($category)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p>Filter By : {{ $category->title }}</p>
                            <a href="{{ route('page.index', $category->slug) }}') }}" class="btn  btn-outline-primary">See
                                All</a>
                        </div>
                    @endisset
                </div>
                <div class="d-flex justify-content-between items-center my-4">
                    <div class="d-flex gap-3 items-center">
                        @empty($category)
                            @if (request('keyword'))
                                <p>Search by : {{ request('keyword') }}</p>
                                <a href="{{ route('page.index') }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            @endif
                        @endempty
                    </div>
                    <div>
                        @empty($category)
                            <form action="{{ route('page.index') }}" method="get" class="d-flex">
                                <input type="text" name="keyword" class="form-control me-2 "
                                    value="{{ request('keyword') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        @endempty
                        @isset($category)
                            <form action="{{ route('page.category', $category->slug) }}" method="get" class="d-flex">
                                <input type="text" name="keyword" class="form-control me-2 "
                                    value="{{ request('keyword') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        @endisset
                    </div>
                </div>
                <div class="list-group mb-5">
                    @foreach ($categories as $category)
                        <a href="{{ route('page.category', $category->slug) }}"
                            class="list-group-item">{{ $category->title }}</a>
                    @endforeach
                </div>
                @forelse($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <div>
                                <a href="{{ route('page.category', $post->category->slug) }}">
                                    <span class="badge bg-secondary"> {{ $post->category->title }}</span>
                                </a>
                            </div>
                            <p class="my-3">{{ $post->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p class="mb-0">{{ $post->user->name }}</p>
                                    <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <a href="{{ route('page.detail', $post->slug) }}" class="btn btn-primary ">See More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h1>No Posts Found</h1>
                        </div>
                    </div>
                @endforelse

            </div>
            <div class="col-lg-8 my-3">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
