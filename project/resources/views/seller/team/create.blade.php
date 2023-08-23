@extends('layouts.seller')
@section('title')
    @lang('Add New Team Member')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header  d-flex justify-content-between">
            <h1>@lang('Add New Team Mem')</h1>
            <a href="{{ route('seller.team.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i>
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
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Team Member Form') }}</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('seller.team.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group d-flex justify-content-center">
                            <div id="image-preview" class="image-preview image-preview_alt"
                                style="background-image:url({{ showPhoto('') }});">
                                <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                <input type="file" name="photo" id="image-upload" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">{{ __('Name') }}*</label>
                            <input type="text" class="form-control" name="name" id="name" required
                                placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="designation">{{ __('Designation') }}*</label>
                            <input type="text" class="form-control" name="designation" id="designation" required
                                placeholder="{{ __('Designation') }}" value="{{ old('designation') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}*</label>
                            <input type="text" class="form-control" name="phone" id="phone" required
                                placeholder="{{ __('Phone') }}" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}*</label>
                            <input type="email" class="form-control" name="email" id="email" required
                                placeholder="{{ __('Email') }}" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}*</label>
                            <input type="text" class="form-control" name="address" id="address" required
                                placeholder="{{ __('Address') }}" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label for="website">{{ __('Website') }}</label>
                            <input type="text" class="form-control" name="website" id="website" 
                                placeholder="{{ __('Website') }}" value="{{ old('website') }}">
                        </div>
                     
                        <div class="form-group">
                            <label for="bio">{{ __('Bio') }}*</label>
                            <textarea id="area1" class="form-control summernote" name="bio" placeholder="{{ __('Bio') }}"
                                required>{{ old('bio') }}</textarea>
                        </div>

                        <div id="progress_show">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-5">
                                    <div class="form-group">
                                        <label for="website">{{ __('Progress Title') }}</label>
                                        <input type="text" class="form-control" name="title[]" id="website" 
                                            placeholder="{{ __('Progress Title') }}" value="{{ old('title[]') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5">
                                    <div class="form-group">
                                        <label for="website">{{ __('Progress Percentage') }}</label>
                                        <input type="number" class="form-control" name="percentage[]" id="website" 
                                            placeholder="{{ __('Progress Percentage') }}" value="{{ old('percentage[]') }}">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger m-0 btn-sm mt-4" id="progress_remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" id="progress_add">{{ __('Add More') }}</button>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="facebook">{{ __('Facebook') }}</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" 
                                        placeholder="{{ __('Facebook') }}" value="{{ old('facebook') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="twitter">{{ __('Twitter') }}</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" 
                                        placeholder="{{ __('Twitter') }}" value="{{ old('twitter') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="linkedin">{{ __('Linkedin') }}</label>
                                    <input type="text" class="form-control" name="linkedin" id="linkedin" 
                                        placeholder="{{ __('Linkedin') }}" value="{{ old('linkedin') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="instagram">{{ __('Instagram') }}</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" 
                                        placeholder="{{ __('Instagram') }}" value="{{ old('instagram') }}">
                                </div>
                            </div>
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

        $(document).on('click','#progress_add',function(){
            var html = 
            `
            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-5">
                                    <div class="form-group">
                                        <label for="website">{{ __('Progress Title') }}</label>
                                        <input type="text" class="form-control" name="title[]" id="website" 
                                            placeholder="{{ __('Progress Title') }}" value="{{ old('title[]') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5">
                                    <div class="form-group">
                                        <label for="website">{{ __('Progress Percentage') }}</label>
                                        <input type="number" class="form-control" name="percentage[]" id="website" 
                                            placeholder="{{ __('Progress Percentage') }}" value="{{ old('percentage[]') }}">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger m-0 btn-sm mt-4" id="progress_remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
            `;

            $('#progress_show').append(html);

        })

        $(document).on('click','#progress_remove',function(){
            if($('#progress_show').children().length == 1){
                return;
            }
            $(this).parent().parent().parent().remove();
        })
   
    </script>
@endpush