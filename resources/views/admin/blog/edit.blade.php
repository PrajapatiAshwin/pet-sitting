@extends('admin.layouts.app')

@section('content')
    <div class="app-title" bis_skin_checked="1">
        <div bis_skin_checked="1">
            <h1><i class="app-menu__icon fab fa-blogger-b"></i> Blog management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.veterinarians.index') }}">Blog management</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <form action="{{ route('admin.blog.update', $blogs->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" id="name" value="{{ $blogs->name }}" autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input class="form-control @error('date') is-invalid @enderror" type="date"
                                        name="date" id="date" value="{{ $blogs->date }}">
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image" id="image" onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    @if ($blogs->image)
                                        <img id="photoPreview" src="{{ asset($blogs->image) }}" alt="image"
                                            style="max-width: 100px; margin-top: 10px; border: 1px solid #ddd; padding: 5px;">
                                    @else
                                        <img id="photoPreview" src="#" alt="image"
                                            style="display: none; max-width: 100px; margin-top: 10px; border: 1px solid #ddd; padding: 5px;">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        rows="4">{{ $blogs->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a href="{{ route('admin.blog.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
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
