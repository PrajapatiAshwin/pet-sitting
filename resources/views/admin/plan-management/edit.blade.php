@extends('admin.layouts.app')

@section('content')
    <div class="app-title" bis_skin_checked="1">
        <div bis_skin_checked="1">
            <h1><i class="app-menu__icon fa-solid fa-plane mr-1"></i> Plan Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fs-6"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.plan-manage.index') }}">Plan management</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                   <form action="{{ route('admin.plan-manage.update', $planManagement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">

                            {{-- Plan Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_name">Plan Name</label>
                                    <select class="form-control @error('plan_name') is-invalid @enderror" name="plan_name" id="plan_name">
                                        <option value="">-- Select Plan --</option>
                                        <option value="Personal" {{ $planManagement->plan_name == 'Personal' ? 'selected' : '' }}>Personal</option>
                                        <option value="Business" {{ $planManagement->plan_name == 'Business' ? 'selected' : '' }}>Business</option>
                                        <option value="Ultimate" {{ $planManagement->plan_name == 'Ultimate' ? 'selected' : '' }}>Ultimate</option>
                                    </select>
                                    @error('plan_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Amount --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount ($)</label>
                                    <input class="form-control @error('amount') is-invalid @enderror" type="number" step="0.01" name="amount" id="amount"
                                        value="{{ old('amount', $planManagement->amount) }}">
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Duration --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="duration_value">Duration</label>
                                    <input class="form-control @error('duration_value') is-invalid @enderror" type="number" min="1" name="duration_value"
                                        id="duration_value" value="{{ old('duration_value', $planManagement->duration_value) }}">
                                    @error('duration_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Duration Unit --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="duration_unit">Duration Unit</label>
                                    <select class="form-control @error('duration_unit') is-invalid @enderror" name="duration_unit" id="duration_unit">
                                        <option value="">-- Select Duration --</option>
                                        {{--  <option value="day" {{ $planManagement->duration_unit == 'day' ? 'selected' : '' }}>Day</option>  --}}
                                        <option value="month" {{ $planManagement->duration_unit == 'month' ? 'selected' : '' }}>Month</option>
                                        <option value="year" {{ $planManagement->duration_unit == 'year' ? 'selected' : '' }}>Year</option>
                                    </select>
                                    @error('duration_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Plan Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image"
                                        onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <br>
                                    <input type="hidden" name="old_image" value="{{ $planManagement->image }}">
                                    @if ($planManagement->image)
                                        <img id="imagePreview" src="{{ asset($planManagement->image) }}" alt="Current Image"
                                            style="max-width: 100px; margin-top: 10px;">
                                    @else
                                        <img id="imagePreview" src="#" style="display: none; max-width: 100px; margin-top: 10px;">
                                    @endif
                                </div>
                            </div>

                            {{-- Plan Features --}}
                            <div class="col-md-12">
                                <label>Plan Features</label>
                                <div id="plan-features-wrapper">
                                    @foreach (explode(',', $planManagement->plan_features) as $feature)
                                        <div class="input-group mb-2 plan-feature-group">
                                            <input type="text" name="plan_features[]" class="form-control"
                                                value="{{ trim($feature) }}" placeholder="Enter feature">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger remove-feature-btn">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="input-group mb-2 plan-feature-group">
                                        <input type="text" name="plan_features[]" class="form-control" placeholder="Enter feature">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success add-feature-btn">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a href="{{ route('admin.plan-manage.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>


                    <script>
                        function previewImage(event) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                const output = document.getElementById('imagePreview');
                                output.src = reader.result;
                                output.style.display = 'block';
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const wrapper = document.getElementById('plan-features-wrapper');

                            wrapper.addEventListener('click', function (e) {
                                if (e.target.classList.contains('add-feature-btn')) {
                                    const newInputGroup = document.createElement('div');
                                    newInputGroup.classList.add('input-group', 'mb-2', 'plan-feature-group');
                                    newInputGroup.innerHTML = `
                                        <input type="text" name="plan_features[]" class="form-control" placeholder="Enter feature">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger remove-feature-btn">Remove</button>
                                        </div>
                                    `;
                                    wrapper.appendChild(newInputGroup);
                                }

                                if (e.target.classList.contains('remove-feature-btn')) {
                                    e.target.closest('.plan-feature-group').remove();
                                }
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    {{--  <script>
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
    </script>  --}}
@endsection
