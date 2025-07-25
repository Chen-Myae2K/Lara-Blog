@extends('layouts.app')


@section('content')
    <x-Breadcrumb :links="$links"></x-Breadcrumb>
    <div class="card">
        <x-card class="card">
            <x-slot:title>Create New Post</x-slot:title>
            <form action="{{ route('post.index') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-input name="title" type="text" label="Post Title"></x-input>

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
                <x-input name="photos" type="file" label="Post Images" multiple="true"></x-input>

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
                <x-input name="featured_image" label="Featured Image" type="file"></x-input>
                <button class="btn btn-md btn-primary" type="submit">Create Post</button>
            </form>
        </x-card>
    </div>
    </form>
@endsection
