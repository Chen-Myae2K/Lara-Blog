@extends('master')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        <div>
                            <a href="">
                                <span class="badge bg-secondary"> {{ $post->category->title }}</span>
                            </a>
                        </div>
                        {{-- <div class="my-3">
                            <img src="{{asset('storage/'. $post->featured_image)}}" height="200" class="rounded" alt="">
                        </div> --}}
                        <div class="my-3">
                            @foreach ($post->photos as $photo)
                                <img src="{{ asset('storage/' . $photo->name) }}" height="100" class="rounded"
                                    alt="">
                            @endforeach
                        </div>
                        <p class="my-3">{{ $post->description }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <p class="mb-0">{{ $post->user->name }}</p>
                                <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <a href="{{ route('page.index') }}" class="btn btn-primary ">All Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
