@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Photo Page</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Gallary</h4>
            <hr>
            <div class="" style="columns: 3 100px">
                @forelse ($photos as $photo)
                    <div class="" >
                        <img src="{{ asset('storage/' . $photo->name) }}" class="img-fluid mb-3 rounded" alt=""
                            >
                    </div>
                @empty
                    <div class="col-12">
                        <p>No photos found.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
