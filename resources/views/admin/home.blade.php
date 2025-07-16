@extends('admin.layouts.app')

@section('title', 'Pet Sitting - Dashboard')

@section('content')
<style>
    .widget-small {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .widget-small:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        cursor: pointer;
    }
</style>
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-user-md fa-3x"></i>
            <div class="info">
                <h4>Doctors</h4>
                <p><b>{{ isset($veterinarian) ? count($veterinarian) : 0 }}</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon">
            <i class="icon fa fa-image fa-3x"></i>
            <div class="info">
                <h4>Gallery</h4>
                <p><b>{{ count($allGalleryImage) ?? 0 }}</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
            <i class="icon fab fa-blogger-b fa-3x"></i>
            <div class="info">
                <h4>Blogs</h4>
                <p><b>{{ count($blogs) ?? 0 }}</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-plane fa-3x"></i>
            <div class="info">
                <h4>Plans</h4>
                <p><b>{{ $PlanManagement ?? 0 }}</b></p>
            </div>
        </div>
    </div>

    {{-- second row --}}
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-paw fa-3x"></i>
            <div class="info">
                <h4>Pets</h4>
                <p><b>{{ isset($pets_manage) ? count($pets_manage) : 0 }}</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon">
            <i class="icon fa fa-gear fa-3x"></i>
            <div class="info">
                <h4>Services</h4>
                <p><b>{{ $Services ?? 0 }}</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-clipboard fa-3x"></i>
            <div class="info">
                <h4>Orders</h4>
                <p><b>{{ isset($orders) ? count($orders) : 0 }}</b></p>
            </div>
        </div>
    </div>
</div>

{{--  <div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Support Requests</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
        </div>
    </div>
</div>  --}}

@endsection
