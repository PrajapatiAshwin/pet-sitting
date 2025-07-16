@extends('user.layouts.app')

@section('title', 'Pet Sitting - Pricing')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2">
                        <a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span>Pricing <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-0 bread">Plan Details</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light py-5">
    <div class="container">
        <!-- Plan Information Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header text-white" style="background: linear-gradient(to right, #69a7e7, #6ed3a5);">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Get Started With This Plan</h5>
                            <h5 class="mb-0" style="margin-right: 30%;">
                                {{ $plan_information_purchase['name'] ?? 'Plan' }} /
                                {{ $plan_information_purchase['duration_value'] ?? 'N/A' }}-{{ $plan_information_purchase['duration_unit'] ?? 'N/A' }}
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Left Side: Form -->
                        <div class="col-md-6">
                            <div class="wrapper shadow-sm rounded-lg overflow-hidden">
                                <div class="contact-wrap w-100 p-md-5 p-4 bg-white">

                                    <form action="{{ route('user.plan_details_store') }}" id="contactForm" method="POST" name="contactForm" class="contactForm" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan_information_purchase['plan_id'] ?? '' }}">
                                        <input type="hidden" name="plan_name" value="{{ $plan_information_purchase['plan_name'] ?? '' }}">
                                        <input type="hidden" name="amount" value="{{ $plan_information_purchase['amount'] ?? '' }}">
                                        <input type="hidden" name="duration" value="{{ ($plan_information_purchase['duration_value'] ?? '') . ' ' . ($plan_information_purchase['duration_unit'] ?? '') }}">
                                        <input type="hidden" name="plan_features" value="{{ $plan_information_purchase['plan_features'] ?? 'N/A' }}">
                                        <input type="hidden" name="payment_method" value="cash">
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="mb-3 font-weight-bold ml-2 mt-0"><i class="fa fa-user mr-2" aria-hidden="true"></i>Enter Your Details</h4>
                                                <div class="form-group">
                                                    <label class="label" for="name">Full Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary text-white" style="width: 45px;margin-right: 14px;">
                                                                <i class="fa fa-user" style="margin-left: 22%;"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}" autofocus>
                                                        @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email Address</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary text-white" style="width: 45px;margin-right: 14px;">
                                                                <i class="fa fa-envelope" style="margin-left: 12%;"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                                                        @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="contact_number">Contact number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary text-white" style="width: 45px;margin-right: 14px;">
                                                                <i class="fa fa-phone" aria-hidden="true" style="margin-left: 12%;"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" id="contact_number" placeholder="Enter Contact Number" value="{{ old('email') }}">
                                                        @error('contact_number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="message">Description</label>
                                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="5" placeholder="Enter Description">{{ old('message') }}</textarea>
                                            @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div> --}}

                                <div class="col-md-12">
                                    <h4 class="mb-3 font-weight-bold ml-2 mt-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i>Pet Details</h4>
                                    <div class="form-group">
                                        <label class="label" for="pet_name">Pet Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white" style="width: 45px;margin-right: 14px;">
                                                    <i class="fa fa-user" style="margin-left: 22%;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control @error('pet_name') is-invalid @enderror" name="pet_name" id="pet_name" placeholder="Enter Pet Name" value="{{ old('pet_name') }}" autofocus>
                                            @error('pet_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label" for="pet_type">Pet Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white" style="width: 45px;margin-right: 14px;">
                                                    <i class="fa fa-paw" style="margin-left: 12%;"></i>
                                                </span>
                                            </div>
                                            <select name="pet_type" class="form-control @error('pet_type') is-invalid @enderror" id="pet_type">
                                                <option value="">-- Select Pet --</option>
                                                @foreach ($pets as $pet)
                                                <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pet_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label" for="pet_description">Pet Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white" style="width: 45px; margin-right: 14px;">
                                                    <i class="fa fa-info-circle" style="margin-left: 12%;"></i>
                                                </span>
                                            </div>
                                            <textarea class="form-control @error('pet_description') is-invalid @enderror" name="pet_description" id="pet_description" rows="4" placeholder="Enter pet details (breed, age, behavior, etc.)">{{ old('pet_description') }}</textarea>
                                            @error('pet_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label" for="pet_photo">Pet Photo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white" style="width: 45px; margin-right: 14px;">
                                                    <i class="fa fa-image" style="margin-left: 12%;"></i>
                                                </span>
                                            </div>
                                            <input type="file" class="form-control @error('pet_photo') is-invalid @enderror" name="pet_photo" id="pet_photo" accept="image/*">
                                            @error('pet_photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{--  <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label" for="purchase_date">Purchase Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white" style="width: 45px; margin-right: 14px;">
                                                    <i class="fa fa-calendar" style="margin-left: 12%;"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', now()->format('Y-m-d')) }}">
                                            @error('purchase_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>  --}}
                                <div class="col-md-12 d-none">
                                    <div class="form-group">
                                        <label class="label" for="purchase_date">Purchase Date</label>
                                        <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" 
                                            name="purchase_date" id="purchase_date" 
                                            value="{{ old('purchase_date', now()->format('Y-m-d')) }}">
                                        @error('purchase_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" name="expire_date" id="expire_date" value="">

                                <div class="col-md-12 text-center mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg px-5">
                                            <i class="fa fa-paper-plane mr-2"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Plan Details -->
                <div class="col-md-6">
                    <div class="card-body bg-white shadow-sm rounded-lg p-4">
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="font-weight-bold d-block mb-2">Payment Method:</span>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="cash" checked>
                                    <label class="form-check-label" for="payment_method">
                                        Cash on Delivery
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">Amount:</span>
                                <span class="badge badge-primary badge-pill">${{ $plan_information_purchase['amount'] ?? '0.00' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">Duration:</span>
                                <span>{{ $plan_information_purchase['duration_value'] ?? 'N/A' }} - {{ $plan_information_purchase['duration_unit'] ?? '' }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Features:</span>
                                <ul class="list-unstyled mt-2">
                                    @foreach(array_filter(explode(',', $plan_information_purchase['plan_features'])) as $feature)
                                    <li class="mb-1">
                                        <i class="fa fa-paw text-primary mr-2"></i> {{ trim($feature) }}
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>                       
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</section>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var today = new Date().toISOString().split('T')[0];
        $('#purchase_date').attr('min', today);
    });
</script>
@push('styles')
<style>
    .hero-wrap {
        height: 300px;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .contactForm .form-control {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
    }

    .contactForm .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .input-group-text {
        border-radius: 0.25rem 0 0 0.25rem;
    }

    textarea {
        resize: none;
    }

    .badge-pill {
        font-size: 0.9rem;
        padding: 0.5em 0.75em;
    }

</style>
@endpush
