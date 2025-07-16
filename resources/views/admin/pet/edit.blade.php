@extends('admin.layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="app-menu__icson fa-solid fa-paw mr-1"></i> Edit Pets Management</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.pet.index') }}">Pets Management</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('admin.pet.update', $pet->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="pet_name">Pet Name</label>
                            <input type="text" name="pet_name" id="pet_name"
                                class="form-control @error('pet_name') is-invalid @enderror"
                                value="{{ old('pet_name', $pet->pet_name) }}"
                                placeholder="Enter pet name">
                            @error('pet_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary mr-1" type="submit">Update</button>
                        <a href="{{ route('admin.pet.list') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
