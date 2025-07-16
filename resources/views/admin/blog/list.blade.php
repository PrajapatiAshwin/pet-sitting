@extends('admin.layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fab fa-blogger-b"></i> Blog Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.blog.list') }}">Blog Management</a></li>
        </ul>
    </div>
    <div class="mb-3 text-right">
        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Blog
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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th style="width: 20%;" class="text-nowrap">Blog Image</th>
                                    <th>Description</th>
                                    <th style="width: 100px;" class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($blogs) && count($blogs) > 0)
                                @foreach ($blogs as $blogList)                                
                                    <tr>
                                        <td>{{ $loop->iteration + $blogs->firstItem() - 1 }}</td> 
                                        <td>{{ $blogList->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($blogList->date)->format('d-m-Y') ??  $blogList->date }}</td>

                                        <td>
                                            @if ($blogList->image)
                                                <img src="{{ asset($blogList->image) }}" alt="Image"
                                                    style="width: 50%; object-fit: cover;">
                                            @else
                                                No Photo
                                            @endif
                                        </td>
                                        <td>{{ $blogList->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $blogList->id) }}" class="btn btn-sm btn-primary mb-2"
                                                style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form id="delete-form-{{ $blogList->id }}"
                                                action="{{ route('admin.blog.delete', $blogList->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $blogList->id }}" style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;margin-top: -9%;">
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
                        {!! $blogs->links('pagination::bootstrap-4') !!}
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
                const blogId = this.getAttribute('data-id');

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
                        document.getElementById('delete-form-' + blogId).submit();
                    }
                });
            });
        });
    });
</script>
