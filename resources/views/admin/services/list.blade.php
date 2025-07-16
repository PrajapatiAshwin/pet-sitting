@extends('admin.layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa-solid fa-gear mr-2"></i> Services </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.addsServices.list') }}">Services </a></li>
        </ul>
    </div>
    <div class="mb-3 text-right">
        <a href="{{ route('admin.addsServices.index') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Services
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
                                    <th style="width: 15%;" class="text-nowrap">Icon</th>
                                    <th>Subject</th>
                                    <th>Description</th>                                   
                                    <th style="width: 100px;" class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($dataServices) && count($dataServices) > 0)
                                @foreach ($dataServices as $services)
                                    <tr>
                                        <td>{{ $loop->iteration + $dataServices->firstItem() - 1 }}</td>
                                        <td>
                                            @if ($services->icon)
                                                <img src="{{ asset($services->icon) }}" alt="Icon"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                                No Icon
                                            @endif
                                        </td>
                                        
                                        <td>{{ $services->subject }}</td>
                                        <td>{{ $services->description }}</td>
                                        
                                        <td>
                                            <a href="{{ route('admin.addsServices.edit', $services->id) }}" class="btn btn-sm btn-primary mb-2"
                                                style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form id="delete-form-{{ $services->id }}"
                                                action="{{ route('admin.addsServices.delete', $services->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $services->id }}" style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;margin-top: -11%">
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
                        {!! $dataServices->links('pagination::bootstrap-4') !!}
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
                const servicesId = this.getAttribute('data-id');

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
                        document.getElementById('delete-form-' + servicesId).submit();
                    }
                });
            });
        });
    });
</script>
