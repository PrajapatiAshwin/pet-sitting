@extends('user.layouts.app')

@section('title', 'Pet Sitting - Pricing')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url(&quot;images/bg_2.jpg&quot;); background-position: 50% 130.609px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5 fadeInUp ftco-animated">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Pricing</h1>
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
                            <span class="price"><sup>$</sup> <span class="number">{{ rtrim(rtrim(number_format($planManage->amount, 2, '.', ''), '0'), '.') }}</span>
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

<script>
    function filterPlans(plan) {
       $.ajax({
            url: '{{ route('user.pricing') }}',
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
