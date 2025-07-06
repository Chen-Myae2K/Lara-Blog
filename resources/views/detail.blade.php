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
                            <div id="carouselExample" class="carousel slide carousel-dark">
                                <div class="carousel-inner">
                                    @foreach ($post->photos as $key => $photo)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <div class="d-flex justify-content-center">
                                                <a class="venobox" href="{{ asset('storage/' . $photo->name) }}">
                                                    <img src="{{ asset('storage/' . $photo->name) }}" class="my-image-links"
                                                        height="400" alt="image alt" />
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <i class="carousel-control-prev-icon" aria-hidden="true"></i>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">

                                    <i class="carousel-control-next-icon" aria-hidden="true"
                                        class="bi bi-caret-right-fill text-black opacity-40 fs-1"></i>

                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                        <p class="my-3" style="white-space: pre-wrap">{{ $post->description }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <p class="mb-0">{{ $post->user->name }}</p>
                                <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                @can('update', $post)
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-primary">
                                        Edit Post
                                    </a>
                                @endcan
                                <a href="{{ route('page.index') }}" class="btn btn-primary ">All Post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
