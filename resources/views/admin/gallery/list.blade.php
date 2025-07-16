@extends('admin.layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-image mr-1"></i> Gallery Management </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.gallery.list') }}">Gallery Management </a></li>
        </ul>
    </div>
    <div class="mb-3 text-right">
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Gallery Image
        </a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gallery Name</th>
                                    <th>Gallery Image</th>
                                    <th style="width: 15%;" class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($galleryManagement) && count($galleryManagement) > 0)
                                @foreach ($galleryManagement as $galleryManage)
                                    <tr>
                                        <td>{{ $loop->iteration + $galleryManagement->firstItem() - 1 }}</td>
                                        <td>{{ $galleryManage->title ?? 'N/A' }}</td>
                                        <td>
                                            @php
                                                $images = json_decode($galleryManage->image, true);
                                            @endphp
                                            @if (is_array($images))
                                                @foreach ($images as $image)
                                                    <img src="{{ asset($image) }}" alt="image"
                                                        style="width: 90px; height: 120px; object-fit: cover; margin-right: 5px;">
                                                @endforeach
                                            @else
                                                <img src="{{ asset($galleryManage->image) }}" alt="image"
                                                    style="width: 90px; height: 120px; object-fit: cover;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.gallery.edit', $galleryManage->id) }}"
                                                class="btn btn-sm btn-primary mb-2"
                                                style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form id="delete-form-{{ $galleryManage->id }}"
                                                action="{{ route('admin.gallery.delete', $galleryManage->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $galleryManage->id }}"
                                                    style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;margin-top: -6%;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="15" class="text-center text-muted">No order data found.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        {!! $galleryManagement->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const galleryId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure to delete?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + galleryId).submit();
                    }
                });
            });
        });
    });
</script>
