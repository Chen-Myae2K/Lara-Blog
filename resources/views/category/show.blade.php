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
                        <h4>{{ $category->title }}</h4>
                        <hr>
                        <div class="mb-3">
                            <strong>Creator:</strong> {{ $category->user->name }}
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('category.create') }}" class="btn btn-outline-primary">Create New Category</a>
                            <a href="{{ route('category.index') }}" class="btn btn-primary">Back to Category List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
