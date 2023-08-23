@extends('layouts.admin')
@section('title')
    @lang('Edit Hero Section')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Edit Hero Section')</h1>
        </div>
    </section>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{route('admin.gs.banner.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group d-flex justify-content-center">
                            <div id="image-preview" class="image-preview image-preview_alt"
                                style="background-image:url({{ getPhoto($gs->banner_photo) }});">
                                <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                <input type="file" name="banner_photo" id="image-upload" />
                            </div>
                         </div>

                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <input class="form-control" type="text" name="banner_title" value="{{$gs->banner_title}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Text')</label>
                            <input class="form-control" type="text" name="banner_text" value="{{$gs->banner_text}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Video Link')</label>
                            <input class="form-control" type="text" name="banner_video" value="{{$gs->banner_video}}">
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
                label_default: "{{__('Choose File')}}", // Default: Choose File
                label_selected: "{{__('Update Image')}}", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
    </script>
@endpush