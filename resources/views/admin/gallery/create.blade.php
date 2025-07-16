@extends('admin.layouts.app')

@section('content')
    <div class="app-title" bis_skin_checked="1">
        <div bis_skin_checked="1">
            <h1> <i class="app-menu__icon fa fa-image"></i> Gallery Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item"><a href="{{-- route('admin.veterinarians.index') --}}">Gallery Management</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Gallery Name</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text"
                                        name="title" id="title" value="{{ old('title') }}" autofocus>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Photo</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image[]" id="image" multiple onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    <br>
                                    {{--  <img id="photoPreview" src="#" alt="Preview"
                                        style="display: none; max-width: 100px; margin-top: 10px; border: 1px solid #ddd; padding: 5px;">  --}}
                                    <div id="photoPreview"
                                        style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                                </div>
                            </div>

                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-primary mr-1" type="submit">Save</button>
                            <a href="{{ route('admin.gallery.list') }}" class="btn btn-secondary" type="submit">Cancle</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('photoPreview');
            previewContainer.innerHTML = '';
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px';
                    img.style.margin = '5px';
                    img.style.border = '1px solid #ddd';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(files[i]);
            }
        }
    </script>
@endsection
