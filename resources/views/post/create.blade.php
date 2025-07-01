@extends('layouts.app')


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('post.index') }}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Create New Post</h4>
            <hr>
            <form action="{{ route('post.index') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" value="{{ old('title') }}" id="title"
                        class="form-control @error('title') is-invalid @enderror" name='title'>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Select Category</label>
                    <select type="text" class="form-select @error('category') is-invalid @enderror" name='category'>
                        @foreach (\App\Models\Category::all() as $category)
                            <option {{ $category->id == old('category') ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea type="text" rows="10" id="title" class="form-control @error('description') is-invalid @enderror"
                        name='description'>
                        {{ old('description') }}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <label for="featured_image" class="form-label">Featured Image</label>
                        <input type="file" value="{{ old('featured_image') }}" id="featured_image"
                            class="form-control @error('featured_image') is-invalid @enderror" name='featured_image'>
                        @error('featured_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-md btn-primary" type="submit">Create Post</button>
                </div>
            </form>

        </div>
    </div>
    </form>
@endsection
