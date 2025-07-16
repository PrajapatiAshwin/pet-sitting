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
                    <form action="{{ route('admin.plan-manage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_name">Plan Name</label>
                                    <select class="form-control @error('plan_name') is-invalid @enderror" name="plan_name"
                                        id="plan_name">
                                        <option value="">-- Select Plan --</option>
                                        <option value="Personal" {{ old('plan_name') == 'Personal' ? 'selected' : '' }}>
                                            Personal</option>
                                        <option value="Business" {{ old('plan_name') == 'Business' ? 'selected' : '' }}>
                                            Business</option>
                                        <option value="Ultimate" {{ old('plan_name') == 'Ultimate' ? 'selected' : '' }}>
                                            Ultimate</option>
                                    </select>
                                    @error('plan_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount ($)</label>
                                    <input class="form-control @error('amount') is-invalid @enderror" type="number" placeholder="Enter amount"
                                        step="0.01" name="amount" id="amount" value="{{ old('amount') }}">
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="duration_value">Duration</label>
                                    <input class="form-control @error('duration_value') is-invalid @enderror" type="number"
                                        min="1" name="duration_value" id="duration_value" placeholder="Enter duration"
                                        value="{{ old('duration_value') }}">
                                    @error('duration_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="duration_unit">Duration (e.g. day, month, year)</label>
                                    <select class="form-control @error('duration_unit') is-invalid @enderror"
                                        name="duration_unit" id="duration_unit">
                                        <option value="">-- Select Duration --</option>
                                        {{--  <option value="day" {{ old('duration_unit') == 'day' ? 'selected' : '' }}>Day
                                        </option>  --}}
                                        <option value="month" {{ old('duration_unit') == 'month' ? 'selected' : '' }}>
                                            Month</option>
                                        <option value="year" {{ old('duration_unit') == 'year' ? 'selected' : '' }}>Year
                                        </option>
                                    </select>
                                    @error('duration_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Plan Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image" id="image" onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <img id="imagePreview" src="#" alt="Preview"
                                        style="display: none; max-width: 100px; margin-top: 10px;">
                                </div>
                            </div>  

                            <div class="col-md-12">
                                <label>Plan Features</label>
                                <div id="plan-features-wrapper">
                                    <div class="input-group mb-2 plan-feature-group">
                                        <input type="text" name="plan_features[]" class="form-control @error('plan_features.*') is-invalid @enderror" placeholder="Enter feature">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success add-feature-btn">Add More</button>
                                        </div>
                                    </div>
                                    @error('plan_features.*')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          
                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-primary mr-1" type="submit">Save</button>
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
