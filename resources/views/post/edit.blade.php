@extends('layouts.app')


@section('content')
    <x-Breadcrumb :links="$links"></x-Breadcrumb>
    <x-card>
        <x-slot:title>Edit Post</x-slot:title>
        <form action="{{ route('post.update', $post->id) }}" id="postUpdateForm" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
        </form>
        <x-input name="title" type="text" label="Post Title" default="{{ $post->title }} "></x-input>

        <div class="mb-3">
            <label for="category" class="form-label">Select Category</label>
            <select type="text" form="postUpdateForm" class="form-select @error('category') is-invalid @enderror"
                name='category'>
                @foreach (\App\Models\Category::all() as $category)
                    <option {{ $category->id == old('category', $post->category_id) ? 'selected' : '' }}
                        value="{{ $category->id }}">
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
            <textarea form="postUpdateForm" type="text" rows="10" id="title"
                class="form-control @error('description') is-invalid @enderror" name='description'>
                        {{ old('description', $post->description) }}
                    </textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="featured_image" class="form-label">Featured Image</label>
            <input form="postUpdateForm" type="file" id="featured_image"
                class="form-control @error('featured_image') is-invalid @enderror" name='featured_image'>
            @error('featured_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @isset($post->featured_image)
                <img class=" mt-3" src="{{ asset('storage/' . $post->featured_image) }}" width="200" alt="">
            @endisset
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label">Post Photos</label>
            <input type="file" form="postUpdateForm" id="photos"
                class="form-control @error('photos') is-invalid @enderror" name='photos[]' multiple>
            @error('photos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="d-flex mt-3">
                @foreach ($post->photos as $photo)
                    <div class="position-relative me-2">
                        <img src="{{ asset('storage/' . $photo->name) }}" height="100" class="rounded" alt="">
                        <form action="{{ route('photo.destroy', $photo->id) }}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm position-absolute bottom-0 end-0 btn-danger" type="submit">
                                <i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>


        <button form="postUpdateForm" class="btn btn-md btn-primary" type="submit">Edit Post</button>

    </x-card>
    </form>
@endsection
