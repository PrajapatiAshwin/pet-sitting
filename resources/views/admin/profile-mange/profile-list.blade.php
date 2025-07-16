@extends('admin.layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="app-menu__icon fa-solid fa-user mr-1"></i> Profile management</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile p-4">
            {{--  <h4 class="mb-4">Profile Details</h4>  --}}
            <div class="row align-items-center">
                <div class="col-md-3 text-center" style="margin-left: -2%;">

                    <img src="{{ asset('/images/' . ($profileManage->profile_image ?? 'user.png')) }}" 
                        alt="Profile Image" 
                        class="img-fluid rounded-circle" 
                        style="width: 150px; height: 150px; object-fit: cover;">

                </div>
                <div class="col-md-9">
                    <div class="profile-details">
                        <p><strong>Name:</strong> {{ $profileManage->name ?? '-' }}</p>
                        <p><strong>Email:</strong> {{ $profileManage->email ?? '-' }}</p>
                        {{--  <p><strong>Contact:</strong> {{ $profileManage->contact_number ?? '-' }}</p>
                        <p><strong>Address:</strong> {{ $profileManage->address ?? '-' }}</p>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
