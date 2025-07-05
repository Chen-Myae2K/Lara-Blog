@extends('master')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <h1 class="text-center">Blog Post</h1>
                @forelse($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <div>
                                <a href="">
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
