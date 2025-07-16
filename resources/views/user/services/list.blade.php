@extends('user.layouts.app')

@section('title', 'Pet Sitting - Services')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Services <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Services</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-5 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
                </div>
            </div>
            <div class="col-md-7 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5">
                    <h2 class="mb-4">Why choose us?</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
                        <div class="text pl-3">
                            <h4>Care Advices</h4>
                            <p>We offer expert care advice tailored to keep your pet happy, healthy, and thriving.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
                        <div class="text pl-3">
                            <h4>Customer Supports</h4>
                            <p>We provide dedicated customer support to address all your inquiries and concerns.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
                        <div class="text pl-3">
                            <h4>Emergency Services</h4>
                            <p>We provide 24/7 emergency services to ensure your pet receives immediate care when needed.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
                        <div class="text pl-3">
                            <h4>Veterinary Help</h4>
                            <p>We offer expert veterinary help to ensure your pet's health and well-being.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light" id="ftco-section bg-light">
    <div class="container">
        @foreach ($dataServices->chunk(3) as $chunk)
            <div class="row mb-5 pb-5">
                @foreach ($chunk as $services)
                    <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                        <div class="d-block services text-center">
                            <div class="icon d-flex align-items-center justify-content-center" 
                                style="width: 100px; height: 100px; border-radius: 50%; background-color: #f2f2f2; overflow: hidden;">
                                <span style="display: inline-block; width: 100%; height: 100%;">
                                    @if ($services->icon)
                                        <img src="{{ asset($services->icon) }}" alt="Icon"
                                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;border: 2px solid black;">
                                    @else 
                                        No Icon
                                    @endif
                                </span>
                            </div>

                            <div class="media-body p-4">
                                <h3 class="heading">{{ $services->subject ?? null }}</h3>
                                <p>{{ $services->description ?? null }}</p>
                                <a href="#" class="btn-custom d-flex align-items-center justify-content-center">
                                    <span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>

@endsection
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hash = window.location.hash;
        if (hash) {
            const target = document.querySelector(hash);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>  --}}
