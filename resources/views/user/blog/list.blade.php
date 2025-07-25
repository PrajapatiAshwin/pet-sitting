@extends('user.layouts.app')

@section('title', 'Pet Sitting - Blog')

@section('content')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread">Blog</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach ($blogs as $blogList)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{ route('user.single_blog', $blogList->id) }}" class="block-20 rounded"
                                style="background-image: url('{{ asset($blogList->image) ?? null }}');">
                            </a>
                            <div class="text p-4">
                                <div class="meta mb-2">
                                    <div><a
                                            href="#">{{ \Carbon\Carbon::parse($blogList->date)->format('F d, Y') ?? null }}</a>
                                    </div>
                                    {{--  <div><a href="#">{{ $blogList->name ?? null }}</a></div>| 
                                    <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div> --}}
                                </div>
                                <h3 class="heading"><a href="{{ route('user.single_blog', $blogList->id) }}">
                                        {{ $blogList->description ?? null }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            {{--  <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>  --}}
                            {{ $blogs->links('pagination::bootstrap-5') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
