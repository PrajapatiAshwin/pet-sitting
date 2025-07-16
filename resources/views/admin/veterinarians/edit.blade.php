@extends('admin.layouts.app')

@section('content')
    <div class="app-title" bis_skin_checked="1">
        <div bis_skin_checked="1">
            <h1> <i class="app-menu__icon fa fa-user-md"></i> Doctor management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.veterinarians.index') }}">Doctor management</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <form action="{{ route('admin.veterinarians.update', $veterinarian->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" id="name" value="{{ old('name', $veterinarian->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="speciality">Speciality</label>
                                    <input class="form-control @error('speciality') is-invalid @enderror" type="text"
                                        name="speciality" id="speciality"
                                        value="{{ old('speciality', $veterinarian->speciality) }}">
                                    @error('speciality')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">Twitter Link</label>
                                    <input class="form-control @error('twitter_link') is-invalid @enderror" type="url"
                                        name="twitter_link" id="twitter_link"
                                        value="{{ old('twitter_link', $veterinarian->twitter_link) }}">
                                    @error('twitter_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook_link">Facebook Link</label>
                                    <input class="form-control @error('facebook_link') is-invalid @enderror" type="url"
                                        name="facebook_link" id="facebook_link"
                                        value="{{ old('facebook_link', $veterinarian->facebook_link) }}">
                                    @error('facebook_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram_link">Instagram Link</label>
                                    <input class="form-control @error('instagram_link') is-invalid @enderror" type="url"
                                        name="instagram_link" id="instagram_link"
                                        value="{{ old('instagram_link', $veterinarian->instagram_link) }}">
                                    @error('instagram_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                        name="photo" id="photo" onchange="previewImage(event)">
                                    @error('photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    @if ($veterinarian->photo)
                                        <img id="photoPreview" src="{{ asset($veterinarian->photo) }}" alt="Preview"
                                            style="max-width: 100px; margin-top: 10px; border: 1px solid #ddd; padding: 5px;">
                                    @else
                                        <img id="photoPreview" src="#" alt="Preview"
                                            style="display: none; max-width: 100px; margin-top: 10px; border: 1px solid #ddd; padding: 5px;">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        rows="4">{{ old('description', $veterinarian->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a href="{{ route('admin.veterinarians.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('photoPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
