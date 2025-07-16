@extends('user.layouts.app')

@section('title', 'Pet Sitting - Veterinarian')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Veterinarian <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Meet Our Veterinary Doctor</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach($veterinarian as $vet)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <img src="{{ asset($vet->photo) }}" alt="{{ $vet->name }}" class="img-fluid"
                            style="object-fit: cover; width: 100%; height: 300px;" />
                    </div>


                    <div class="text pt-3 px-3 pb-4 text-center">
                        <h3>{{ $vet->name }}</h3>
                        <span class="position mb-2">{{ $vet->speciality }}</span>
                        <div class="faded">
                            <p>{{ $vet->description ?? 'No description available.' }}</p>
                            <ul class="ftco-social text-center">
                                @if($vet->twitter_link)
                                <li class="ftco-animate">
                                    <a href="{{ $vet->twitter_link }}" target="_blank"
                                        class="d-flex align-items-center justify-content-center">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                @endif
                                @if($vet->facebook_link)
                                <li class="ftco-animate">
                                    <a href="{{ $vet->facebook_link }}" target="_blank"
                                        class="d-flex align-items-center justify-content-center">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                @endif
                                @if($vet->google_link)
                                <li class="ftco-animate">
                                    <a href="{{ $vet->google_link }}" target="_blank"
                                        class="d-flex align-items-center justify-content-center">
                                        <span class="fa fa-google"></span>
                                    </a>
                                </li>
                                @endif
                                @if($vet->instagram_link)
                                <li class="ftco-animate">
                                    <a href="{{ $vet->instagram_link }}" target="_blank"
                                        class="d-flex align-items-center justify-content-center">
                                        <span class="fa fa-instagram"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection