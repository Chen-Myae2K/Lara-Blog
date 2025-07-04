@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $post->title }}</h4>
                        <hr>
                        <div class="mb-3">
                            @isset($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid"
                                    alt="Featured Image">
                            @endisset
                        </div>
                        <div class="mb-3">
                            <strong>Category:</strong> {{ $post->category->title }}
                        </div>
                        <div class="mb-3">
                            <strong>Author:</strong> {{ $post->user->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p>{{ $post->description }}</p>
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create New Post</a>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Back to Post List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
