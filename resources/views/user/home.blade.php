@extends('user.layouts.app')

@section('title', 'Pet Sitting - Home')

@section('content')

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-11 ftco-animate text-center">
                <h1 class="mb-4">Highest Quality Care For Pets You'll Love </h1>
                <p><a href="{{ route('user.about') }}" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
            </div>
        </div>
    </div>
</div>  

{{--  {{ dd($dataServices); }}  --}}
<section class="ftco-section bg-light ftco-no-pt ftco-intro">
    <div class="container">
        <div class="row">
            @foreach($dataServices as $index => $services)
                <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                    <div class="d-block services {{ $index == 0 ? 'active' : '' }} text-center">
                        <div class="icon d-flex align-items-center justify-content-center" 
                            style="width: 100px; height: 100px; border-radius: 50%; background-color: #f2f2f2; overflow: hidden;">
                            <span style="display: inline-block; width: 100%; height: 100%;">
                                @if ($services->icon)
                                    <img src="{{ asset($services->icon) }}" alt="Icon"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;border: 2px solid white;">
                                @else 
                                    No Icon
                                @endif
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ $services->subject ?? null }}</h3>
                            <p>{{ $services->description ?? null }}</p>
                            <a href="{{ route('user.services-page') }}#ftco-section bg-light" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                        </div>
                    </div>
                </div>
            @endforeach
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

<section class="ftco-counter" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="50">0</strong>
                    </div>
                    <div class="text">
                        <span>Customer</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="8500">0</strong>
                    </div>
                    <div class="text">
                        <span>Professionals</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="20">0</strong>
                    </div>
                    <div class="text">
                        <span>Products</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="50">0</strong>
                    </div>
                    <div class="text">
                        <span>Pets Hosted</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-faqs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-md-last">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
                    <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="fa fa-play"></span>
                    </a>
                </div>
                <div class="d-flex mt-3">
                    <div class="img img-2 mr-md-2" style="background-image:url(images/about-2.jpg);"></div>
                    <div class="img img-2 ml-md-2" style="background-image:url(images/about-3.jpg);"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="heading-section mb-5 mt-5 mt-lg-0">
                    <h2 class="mb-3">Frequently Asks Questions</h2>
                    <p>"Here are some common questions we receive from pet owners.
                        We’ve answered them to help you better care for your furry friends." :</p>
                </div>
                <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header p-0" id="headingOne">
                            <h2 class="mb-0">
                                <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                    <p class="mb-0">How to train your pet dog?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Training your pet dog starts with consistency and patience.</li>
                                    <li>Positive reinforcement is key to successful training.</li>
                                    <li>Start with basic commands like sit, stay, and come.</li>
                                    <li>Use treats and praise to reward good behavior.</li>
                                    <li>Be patient and consistent with your training efforts.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingTwo" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                    <p class="mb-0">How to manage your pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Feed, walk, and play with your pet at the same time every day to create a sense of security.</li>
                                    <li>Provide a safe and comfortable environment for your pet.</li>
                                    <li>Establish a routine for feeding, exercise, and playtime.</li>
                                    <li>Monitor your pet's behavior and health regularly.</li>
                                    <li>Seek professional help if you notice any concerning changes.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingThree" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                    <p class="mb-0">What is the best grooming for your pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Brushing your pet's coat prevents tangles, reduces shedding, and keeps their fur healthy and shiny.</li>
                                    <li>Regular baths help to keep your pet clean and free of dirt and parasites.</li>
                                    <li>Trimming your pet's nails is essential to prevent discomfort and injury.</li>
                                    <li>Cleaning your pet's ears and teeth is crucial for their overall health.</li>
                                    <li>Always use pet-specific grooming tools and products.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingFour" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                                    <p class="mb-0">What are those requirements for sitting pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <p style="padding: 0px 18px 0px 22px;">
                                    Provide a safe, clean, and comfortable environment for the pet.
                                    Ensure the pet has access to fresh water and appropriate food.
                                    Regularly exercise and play with the pet to keep them healthy and happy.
                                    Monitor the pet's health and behavior, and seek veterinary care if needed.
                                    Always use pet-specific grooming tools and products.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section" style="background-image: url('images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Happy Clients &amp; Feedbacks</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                    Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                    Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                    Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                    Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                    Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
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

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Affordable Packages</h2>
            </div>
        </div>
        <div class="form-group mt-4 d-flex justify-content-center align-items-center mb-4">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-success {{ request('searchPlan', 'month') == 'month' ? 'active' : '' }}">
                    <input type="radio" name="searchPlan" id="month" value="month"
                        autocomplete="off" {{ request('searchPlan', 'month') == 'month' ? 'checked' : '' }}
                        onchange="filterPlans(this.value)"> Month
                </label>
                <label class="btn btn-outline-success {{ request('searchPlan', 'month') == 'year' ? 'active' : '' }}">
                    <input type="radio" name="searchPlan" id="year" value="year"
                        autocomplete="off" {{ request('searchPlan', 'month') == 'year' ? 'checked' : '' }}
                        onchange="filterPlans(this.value)"> Year
                </label>
            </div>
        </div>

        <div class="row" id="planManagement">
            @foreach ($planManagement as $planManage)
                <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                    <div class="block-7">
                        <div class="img" style="background-image: url('{{ asset($planManage->image) }}');"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block">{{ $planManage->plan_name ?? null }}</span>
                            <span class="price"><sup>$</sup> <span class="number">{{ $planManage->amount ?? null }}</span>
                                <sub>/<p style="display: none;">{{ $planManage->duration_value ?? null }} - </p>{{ $planManage->duration_unit ?? null }}</sub>
                            </span>

                            <ul class="pricing-text mb-5">
                                @foreach(array_filter(explode(',', $planManage->plan_features)) as $feature)
                                    <li><span class="fa fa-check mr-2"></span>{{ trim($feature) }}</li>
                                @endforeach
                            </ul>

                            {{--  <a href="{{ route('user.plan_details') }}" class="btn btn-primary d-block px-2 py-3">Get Started</a>  --}}
                            <form action="{{ route('user.plan_details') }}" method="GET">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $planManage->id ?? null }}">
                                <input type="hidden" name="plan_name" value="{{ $planManage->plan_name ?? null }}">
                                <input type="hidden" name="amount" value="{{ $planManage->amount ?? null }}">
                                <input type="hidden" name="duration_value" value="{{ $planManage->duration_value ?? null }}">
                                <input type="hidden" name="duration_unit" value="{{ $planManage->duration_unit ?? null}}">
                                <input type="hidden" name="plan_features" value="{{ $planManage->plan_features ?? null }}">
                                <button type="submit" class="btn btn-primary d-block px-2 py-3">Get Started</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
    
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Pets Gallery</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($galleryManagement as $item)
                @php
                    $images = json_decode($item->image, true);
                @endphp
                @if (is_array($images))
                    @foreach ($images as $image)
                        <div class="col-md-4 ftco-animate">
                            <div class="work mb-4 img d-flex align-items-end" style="background-image: url('{{ asset($image) }}');" style="width: 100%;">
                                <a href="{{ asset($image) }}" class="icon image-popup d-flex justify-content-center align-items-center">
                                    <span class="fa fa-expand"></span>
                                </a>
                                <div class="desc w-100 px-4">
                                    <div class="text w-100 mb-3">
                                        <span>Gallery</span>
                                        <h2><a href="#">{{ $item->title }}</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Latest news from our blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($blogs as $blogList)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{ route('user.single_blog', $blogList->id) }}" class="block-20 rounded" style="background-image: url('{{ asset($blogList->image) ?? null }}');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">{{ \Carbon\Carbon::parse($blogList->date)->format('F d, Y') ?? null }}</a>
                            </div>
                            
                        </div>
                        <h3 class="heading"><a href="{{ route('user.single_blog', $blogList->id) }}">
                                {{ $blogList->description ?? null }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function filterPlans(plan) {
       $.ajax({
            url: '{{ route('home') }}',
            type: 'GET',
            data: {
                searchPlan: plan
            },
            success: function(response) {
                const parsed = $(response).find('#planManagement').html();
                $('#planManagement').html(parsed);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching plans:', error);
            }
        });
    }
</script>
    
@endsection
