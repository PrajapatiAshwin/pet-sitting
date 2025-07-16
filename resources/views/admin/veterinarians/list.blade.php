@extends('admin.layouts.app')

@section('content')
<style>
    .ftco-footer-social {
        list-style: none;
    }

    .ftco-footer-social li {
        display: inline-block;
    }

    .ftco-footer-social li a {
        width: 35px;
        height: 35px;
        background: #ffffffff;
        border-radius: 50%;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .ftco-footer-social li a:hover {
        transform: scale(1.1);
        text-decoration: none;
    }

    .ftco-footer-social .fa-twitter {
        color: #1DA1F2;
    }

    .ftco-footer-social .fa-facebook {
        color: #1877F2;
    }

    .ftco-footer-social .fa-instagram {
        color: #E4405F;
    }

</style>
<div class="app-title">
    <div>
        <h1><i class="app-menu__icon fa fa-user-md"></i> Doctor Management </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.veterinarians.list') }}">Doctor Management </a></li>
    </ul>
</div>
<div class="mb-3 text-right">
    <a href="{{ route('admin.veterinarians.index') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add New Doctor
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
                                <th>Speciality</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th style="width: 100px;" class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($veterinarians) && count($veterinarians) > 0)
                            @foreach ($veterinarians as $vetList)
                            <tr>
                                <td>{{ $loop->iteration + $veterinarians->firstItem() - 1 }}</td>
                                <td>{{ $vetList->name }}</td>
                                <td>{{ $vetList->speciality }}</td>
                                <td>
                                    @if ($vetList->photo)
                                        <img src="{{ asset($vetList->photo) }}" alt="Photo" style="width: 90px; height: 120px; object-fit: cover;">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>{{ $vetList->description }}</td>

                                <td>
                                    <ul class="ftco-footer-social d-flex justify-content-center p-0 m-0" style="gap: 6px;">
                                        @if(!empty($vetList->twitter_link))
                                            <li class="ftco-animate">
                                                <a href="{{ $vetList->twitter_link }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter">
                                                    <span class="fa-brands fa-twitter"></span>
                                                </a>
                                            </li>
                                        @endif

                                        @if(!empty($vetList->facebook_link))
                                            <li class="ftco-animate">
                                                <a href="{{ $vetList->facebook_link }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook">
                                                    <span class="fa-brands fa-facebook"></span>
                                                </a>
                                            </li>
                                        @endif

                                        @if(!empty($vetList->instagram_link))
                                            <li class="ftco-animate">
                                                <a href="{{ $vetList->instagram_link }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram">
                                                    <span class="fa-brands fa-instagram"></span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </td>

                                <td>
                                    <a href="{{ route('admin.veterinarians.edit', $vetList->id) }}" class="btn btn-sm btn-primary mb-2" style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $vetList->id }}" action="{{ route('admin.veterinarians.delete', $vetList->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="{{ $vetList->id }}" style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;margin-top: -10%;" title="Delete">
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
                    {!! $veterinarians->links('pagination::bootstrap-4') !!}
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
                const vetId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure to delete?'
                    , text: "This action cannot be undone."
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#d33'
                    , cancelButtonColor: '#3085d6'
                    , confirmButtonText: 'Yes, delete it!'
                    , cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + vetId).submit();
                    }
                });
            });
        });
    });

</script>
