@extends('layouts.seller')
@section('title')
    @lang('Edit Project')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header  d-flex justify-content-between">
            <h1>@lang('Edit Project')</h1>
            <a href="{{ route('seller.project.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i>
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
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Project Form') }}</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('seller.project.update',$project->id) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group d-flex justify-content-center">
                            <div id="image-preview" class="image-preview image-preview_alt"
                                style="background-image:url({{ showPhoto($project->photo) }});">
                                <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                <input type="file" name="photo" id="image-upload" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title">{{ __('Title') }}*</label>
                            <input type="text" class="form-control" name="title" id="title" required
                                placeholder="{{ __('Title') }}" value="{{ old('title',$project->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="categorys">{{ __('Category') }}*</label>
                            <select class="form-control  mb-3" id="categorys" name="category_id" required>
                                <option value="" selected disabled>{{ __('Select Category') }}</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{$project->category_id == $item->id ? 'selected' : ''}} >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        
                        <div class="form-group">
                            <label for="client">{{ __('Client') }}*</label>
                            <input type="text" class="form-control" name="client" id="client" required
                                placeholder="{{ __('client') }}" value="{{ old('client',$project->client) }}">
                        </div>

                        <div class="form-group">
                            <label for="date">{{ __('Project Date') }}*</label>
                            <input type="date" class="form-control" name="date" id="date" required
                                placeholder="{{ __('Project Date') }}" value="{{ old('date',$project->date) }}">
                        </div>

                        <div class="form-group">
                            <label for="details">{{ __('Details') }}*</label>
                            <textarea id="area1" class="form-control summernote" name="details" placeholder="{{ __('Details') }}"
                                required>{{ old('details',$project->details) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="facebook">{{ __('Facebook') }}</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" 
                                        placeholder="{{ __('Facebook') }}" value="{{ old('facebook',$project->facebook) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="twitter">{{ __('Twitter') }}</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" 
                                        placeholder="{{ __('Twitter') }}" value="{{ old('twitter',$project->twitter) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="linkedin">{{ __('Linkedin') }}</label>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin" 
                                        placeholder="{{ __('Linkedin') }}" value="{{ old('linkedin',$project->linkedin) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="instagram">{{ __('Instagram') }}</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" 
                                        placeholder="{{ __('Instagram') }}" value="{{ old('instagram',$project->instagram) }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
   
    </script>
@endpush