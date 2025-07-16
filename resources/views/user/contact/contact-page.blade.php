@extends('user.layouts.app')

@section('title', 'Pet Sitting - Contact')

@section('content')

<style>
    .contact-header {
        background: linear-gradient(to right, #5fa9dd, #70c9a7);
        /* Gradient */
        color: #fff;
        padding: 15px 20px;
        border-radius: 8px 8px 0 0;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        width: 100%;
        margin-bottom: 20px;
    }

</style>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Contact</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                  <h2 class="heading-section">Contact Info</h2> 
            </div>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <!-- Left Side: Contact Form -->
                        <div class="col-md-7">
                            <div class="w-100 mr-4">
                                <h3 class="mb-4 contact-header">Contact Us</h3>
                                <form action="{{ route('user.contact.store') }}" method="POST" class="contactForm" id="contactForm" name="contactForm" style="padding: 4%;margin-top: -2%;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
                                                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="name" placeholder="Name">
                                                @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Subject</label>
                                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Subject">
                                                @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="message">Message</label>
                                                <textarea name="message" id="message" cols="30" rows="4" class="form-control @error('message') is-invalid @enderror" placeholder="Message"></textarea>
                                                @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right Side: Contact Info -->
                        <div class="col-md-5 d-flex align-items-stretch" style="height: 561px;">
                            <div class="w-100 ml-4">
                                <h3 class="mb-4 contact-header">Contact Info</h3>
                                <div style="padding: 3%;margin-top: -2%;">
                                    <div class="dbox w-100 d-flex align-items-start mb-4">
                                        <div class="icon d-flex align-items-center justify-content-center text-primary" style="height: 50px;width: 57px;font-size: 1.5rem;">
                                            <i class="fa fa-map-marker" style="color:#ffffff"></i>
                                        </div>
                                        <div class="text pl-3">
                                            <p><strong>Address:</strong><br>203 Fake St. Mountain View, San Francisco, California, USA</p>
                                        </div>
                                    </div>

                                    <div class="dbox w-100 d-flex align-items-start mb-4">
                                        <div class="icon d-flex align-items-center justify-content-center text-primary" style="height: 50px;width: 57px;font-size: 1.5rem;">
                                            <i class="fa fa-phone" style="color:#ffffff"></i>
                                        </div>
                                        <div class="text pl-3">
                                            <p><strong>Phone:</strong><br><a href="tel://1234567920">+1 235 2355 98</a></p>
                                        </div>
                                    </div>

                                    <div class="dbox w-100 d-flex align-items-start mb-4">
                                        <div class="icon d-flex align-items-center justify-content-center text-primary" style="height: 50px;width: 57px;font-size: 1.5rem;">
                                            <i class="fa fa-envelope" style="color:#ffffff"></i>
                                        </div>
                                        <div class="text pl-3">
                                            <p><strong>Email:</strong><br><a href="mailto:petsetting@gmail.com">petsetting@gmail.com</a></p>
                                        </div>
                                    </div>

                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center text-primary" style="height: 50px;width: 57px;font-size: 1.5rem;">
                                            <i class="fa fa-globe" style="color:#ffffff"></i>
                                        </div>
                                        <div class="text pl-3">
                                            <p><strong>Website:</strong><br><a href="#">yoursite.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--  <div id="map" class="map">MAP</div>  --}}

@endsection
