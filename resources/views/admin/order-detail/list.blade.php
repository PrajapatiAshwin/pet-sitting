@extends('admin.layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="app-menu__icon fa fa-clipboard mr-1"></i> Order Details </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.order-details') }}">Order Details </a></li>
    </ul>
</div>
<div class="mb-3 text-right">
    {{--  <a href="{{ route('admin.plan-manage.index') }}" class="btn btn-primary mr-2">
        <i class="fa fa-plus"></i> Add New Plan
    </a>  --}}

    @if(!empty($orderDetails) && $orderDetails->count() > 0)
        <a href="{{ route('user.planInfo') }}" class="btn btn-primary">
            <i class="fa fa-share" aria-hidden="true"></i> Reminder Send
        </a>
    @endif

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
                                <th>Email</th>
                                <th>Contact Number</th>

                                <th>Pet Image</th>
                                <th>Pet Name</th>
                                <th>Pet Type</th>
                                <th>Pet Description</th>

                                <th>Plan Name</th>
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>Payment Method</th>

                                <th>Purchase Date</th>
                                <th>Expiry Date</th>

                                {{--  <th style="width: 100px;" class="text-nowrap">Action</th>  --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($orderDetails) && count($orderDetails) > 0)
                                @foreach ($orderDetails as $orderInfo)
                                        @php
                                            $isExpired = $orderInfo->expire_date < \Carbon\Carbon::today();
                                        @endphp
                                        <tr @if($isExpired) style="background-color: #f0f0f0; color: #6c757d;" @endif>
                                            <td>{{ $loop->iteration + $orderDetails->firstItem() - 1 }}</td>
                                            <td>{{ $orderInfo->name }}</td>
                                            <td>{{ $orderInfo->email }}</td>
                                            <td>{{ $orderInfo->contact_number }}</td>
                                            {{-- Pet Image --}}
                                            <td>
                                                @if($orderInfo->pet_photo)
                                                <img src="{{ asset($orderInfo->pet_photo) }}" alt="Pet Photo" width="100" height="80">
                                                @else
                                                <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $orderInfo->pet_name }}</td>
                                            <td>{{ $orderInfo->pname }}</td>
                                            <td>{{ $orderInfo->pet_description }}</td>

                                            <td>{{ $orderInfo->plan_name }}</td>
                                            <td>$ {{ $orderInfo->amount }}</td>
                                            <td>{{ $orderInfo->duration }}</td>
                                            <td>
                                                <span class="badge px-3 py-2 rounded-pill" style="background-color: #d4edda; color: #155724;">
                                                    {{ ucfirst($orderInfo->payment_method) }}
                                                </span>
                                            </td>

                                            <td>{{ \Carbon\Carbon::parse($orderInfo->purchase_date)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($orderInfo->expire_date)->format('d-m-Y') }}</td>

                                            {{--  <td>
                                                <a href="{{ route('admin.plan-manage.edit', $planInfo->id) }}" class="btn btn-sm btn-primary mb-2" style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form id="delete-form-{{ $planInfo->id }}" action="{{ route('admin.plan-manage.delete', $planInfo->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="{{ $planInfo->id }}" style="color: white;width: 30px; height: 30px; text-align: center; line-height: 30px;margin-top: -11%">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>
                                            </td>  --}}
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
                    {!! $orderDetails->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
{{-- document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const planInfoId = this.getAttribute('data-id');

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
                        document.getElementById('delete-form-' + planInfoId).submit();
                    }
                });
            });
        });
    });  --}}
</script>
