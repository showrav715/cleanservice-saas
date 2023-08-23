@extends('layouts.seller')
@section('title')
    @lang('Add New Service')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header  d-flex justify-content-between">
            <h1>@lang('Add New Service')</h1>
            <a href="{{ route('seller.service.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i>
                @lang('Back')</a>
        </div>
    </section>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Service Form') }}</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('seller.service.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <label for="">Service Icon</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview" class="image-preview image-preview_alt"
                                        style="background-image:url({{ getPhoto('') }});">
                                        <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                        <input type="file" name="photo" id="image-upload" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <label for="">Feature Photo</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview_t" class="image-preview image-preview_alt"
                                        style="background-image:url({{ getPhoto('') }});">
                                        <label for="image-upload_t" id="image-label">@lang('Choose File')</label>
                                        <input type="file" name="feature_icon" id="image-upload_t" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title">{{ __('Service Title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" required
                                placeholder="{{ __('Service Title') }}" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="sort_text">{{ __('Sort Text') }}</label>
                            <textarea id="area1" class="form-control" name="sort_text" placeholder="{{ __('Sort Text') }}" required>{{ old('sort_text') }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="area1" class="form-control summernote" name="description" placeholder="{{ __('Description') }}"
                                required>{{ old('description') }}</textarea>
                        </div>

                        <div class="row">


                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <label for="">Quality After Photo</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview_c" class="image-preview image-preview_alt"
                                        style="background-image:url({{ getPhoto('') }});">
                                        <label for="image-upload_c" id="image-label">@lang('Choose File')</label>
                                        <input type="file" name="service_quality_photo" id="image-upload_c" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <label for="">Quality Before Photo</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview_d" class="image-preview image-preview_alt"
                                        style="background-image:url({{ getPhoto('') }});">
                                        <label for="image-upload_d" id="image-label">@lang('Choose File')</label>
                                        <input type="file" name="service_quality_before_photo" id="image-upload_d" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="service_quality_text">{{ __('Service Quality Text') }}</label>
                            <textarea id="area1" class="form-control" name="service_quality_text"
                                placeholder="{{ __('Service Quality Text') }}" required>{{ old('service_quality_text') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Feature') }}</label>
                            <select class="form-control  mb-3" name="is_feature">
                                <option value="1">{{ __('Yes') }}</option>
                                <option value="0">{{ __('No') }}</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label>{{ __('Status') }}</label>
                            <select class="form-control  mb-3" name="status" required>
                                <option value="1">{{ __('Active') }}</option>
                                <option value="0">{{ __('Inactive') }}</option>
                            </select>
                        </div>





                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
            <!-- Form Sizing -->
            <!-- Horizontal Form -->
        </div>
    </div>
    <!--Row-->
@endsection
@push('script')
    <script>
        'use strict';
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "{{ __('Choose File') }}", // Default: Choose File
            label_selected: "{{ __('Update Image') }}", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload_t", // Default: .image-upload
            preview_box: "#image-preview_t", // Default: .image-preview
            label_field: "#image-label_t", // Default: .image-label
            label_default: "{{ __('Choose File') }}", // Default: Choose File
            label_selected: "{{ __('Update Image') }}", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload_c", // Default: .image-upload
            preview_box: "#image-preview_c", // Default: .image-preview
            label_field: "#image-label_c", // Default: .image-label
            label_default: "{{ __('Choose File') }}", // Default: Choose File
            label_selected: "{{ __('Update Image') }}", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload_d", // Default: .image-upload
            preview_box: "#image-preview_d", // Default: .image-preview
            label_field: "#image-label_d", // Default: .image-label
            label_default: "{{ __('Choose File') }}", // Default: Choose File
            label_selected: "{{ __('Update Image') }}", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
