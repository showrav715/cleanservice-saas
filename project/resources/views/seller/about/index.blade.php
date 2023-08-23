@extends('layouts.seller')
@section('title')
    @lang('Edit About Section')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Edit About Section')</h1>
        </div>
    </section>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('seller.about.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <div class="col-8 offset-2 text-center">
                                <label for="">Photo</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview" class="image-preview image-preview_alt"
                                        style="background-image:url({{ @showPhoto(@$about->photo) }});">
                                        <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                        <input type="file" name="photo" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Header Title')</label>
                            <input class="form-control" type="text" name="header_title"
                                value="{{ @$about->header_title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <input class="form-control" type="text" name="title" value="{{ @$about->title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Experience')</label>
                            <input class="form-control" type="number" name="experience" value="{{ @$about->experience }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('Phone Number')</label>
                            <input class="form-control" type="text" name="number" value="{{ @$about->number }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Description')</label>
                            <textarea name="description" class="form-control" rows="4">{{ @$about->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
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
    </script>
@endpush
