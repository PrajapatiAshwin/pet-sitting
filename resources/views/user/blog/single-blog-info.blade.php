@extends('user.layouts.app')

@section('title', 'Pet Sitting - SingleBlog')

@section('content')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ asset('images/bg_2.jpg') }}'); background-position: 50% -69.3906px;"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home
                                <i class="ion-ios-arrow-forward"></i></a></span>
                        <span class="mr-2">
                            <a href="{{ route('user.blog') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i
                                class="ion-ios-arrow-forward"></i>
                        </span>
                    </p>
                    <h1 class="mb-0 bread">Blog</h1>
                </div>
            </div>
        </div>
    </section>
    {{--  {{ dd($single_blogs->image); }}  --}}
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
                    <p>
                        <img src="{{ asset($single_blogs->image) }}" alt="{{ $single_blogs->title }}" class="img-fluid">
                    </p>
                    <h2 class="mb-3">{{ $single_blogs->description ?? null }}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit,
                        quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro
                        adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis,
                        enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta
                        architecto tempora.</p>

                
                </div>
                <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar pl-lg-5 ftco-animate fadeInUp ftco-animated">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="fa fa-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <div class="categories">
                            <h3>Services</h3>
                            <li><a href="#">Pet Sitting <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="#">Pet Daycare <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="#">Pet Grooming <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="#">Pet Spa <span class="fa fa-chevron-right"></span></a></li>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        @foreach ($recent_blog as $recent)
                            <div class="block-21 mb-4 d-flex">
                                <a href="{{ route('user.single_blog', $recent->id) }}" class="blog-img mr-4" style="background-image: url({{ asset($recent->image) }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{ route('user.single_blog', $recent->id) }}">{{ $recent->description ?? null }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($recent->date)->format('F d, Y') ?? null }}</a></div>
                                        {{--  <div><a href="#"><span class="icon-person"></span> {{ $recent->name ?? null }}</a></div>
                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>  --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                </div>

            </div>
        </div>
    </section>
@endsection
