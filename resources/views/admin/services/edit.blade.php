@extends('admin.layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="app-menu__icson fa-solid fa-plane mr-1"></i> Edit Service</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.addsServices.index') }}">Services</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('admin.addsServices.update', $dataServices->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject"
                                class="form-control @error('subject') is-invalid @enderror"
                                value="{{ old('subject', $dataServices->subject) }}"
                                placeholder="Enter service subject">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter description">{{ old('description', $dataServices->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Icon --}}
                        <div class="form-group col-md-12">
                            <label for="icon">Icon</label>

                            @if (!empty($dataServices->icon))
                                <div class="mb-2">
                                    <img src="{{ asset($dataServices->icon) }}" alt="Service Icon" style="height: 80px;">
                                </div>
                            @endif

                            <input type="file" name="icon" id="icon"
                                class="form-control @error('icon') is-invalid @enderror">

                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary mr-1" type="submit">Update</button>
                        <a href="{{ route('admin.addsServices.list') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
