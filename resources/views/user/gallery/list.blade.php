@extends('user.layouts.app')

@section('title', 'Pet Sitting - Gallery')

@section('content')
<style>
    .pagination .page-link {
        border-radius: 1.25rem;
        margin: 0 2px;
        color: #007bff;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .page-link{
        
    }
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gallery <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Gallery</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                <h2>Pets Gallery</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($paginatedImages as $item)

            <div class="col-md-4 ftco-animate">
                <div class="work mb-4 img d-flex align-items-end" style="background-image: url('{{ asset($item['path']) }}');" style="width: 100%;">
                    <a href="{{ asset($item['path']) }}" class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="fa fa-expand"></span>
                    </a>
                    <div class="desc w-100 px-4">
                        <div class="text w-100 mb-3">
                            <span>Gallery</span>
                            <h2><a href="#">{{ $item['title'] }}</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        {{ $paginatedImages->links('pagination::bootstrap-5') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
