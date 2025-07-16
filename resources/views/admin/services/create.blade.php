@extends('admin.layouts.app')

@section('content')
<div class="app-title" bis_skin_checked="1">
    <div bis_skin_checked="1">
        <h1><i class="fa-solid fa-gear mr-2"></i> Services </h1>
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
                <form action="{{ route('admin.addsServices.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" 
                                class="form-control @error('subject') is-invalid @enderror" 
                                placeholder="Enter service subject" autofocus>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                class="form-control @error('description') is-invalid @enderror" 
                                placeholder="Enter description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>  

                        {{-- Icon --}}
                        <div class="form-group col-md-12">
                            <label for="icon">Icon </label>
                            <input type="file" name="icon" id="icon"  class="form-control @error('icon') is-invalid @enderror"  placeholder="Enter icon">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>          

                    <div class="tile-footer">
                        <button class="btn btn-primary mr-1" type="submit">Save</button>
                        <a href="{{ route('admin.addsServices.list') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
