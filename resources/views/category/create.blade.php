@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.index') }}">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Create New Category</h4>
            <hr>
            <form action="{{ route('category.index') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" name='title'>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">
                            Add Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
