@extends('layouts.seller')

@section('title')
    @lang('General Settings')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Site Settings')</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('Basic Settings')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('seller.gs.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="basic" value="1">

                        <div class="form-group">
                            <label for="title" class="col-form-label">{{ __('Website Title') }}</label>

                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="{{ __('Website Title') }}" value="{{ $gs->title }}">

                        </div>

                        <div class="form-group ">
                            <label for="header_text" class="col-form-label">{{ __('Header Text') }}</label>
                            <input type="text" class="form-control" id="header_text" name="header_text"
                                placeholder="{{ __('Header Text') }}" value="{{ $gs->header_text }}">
                        </div>
                        <div class="form-group ">
                            <label for="working_hour" class="col-form-label">{{ __('Working Hour') }}</label>
                            <input type="text" class="form-control" id="working_hour" name="working_hour"
                                placeholder="{{ __('Working Hour') }}" value="{{ $gs->working_hour }}">
                        </div>

                        <div class="form-group ">
                            <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="{{ __('Phone') }}" value="{{ $gs->phone }}">
                        </div>

                        <div class="form-group ">
                            <label for="email" class="col-form-label">{{ __('Email') }}</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="{{ __('Email') }}" value="{{ $gs->email }}">
                        </div>


                        <div class="form-group ">
                            <label for="address" class="col-form-label">{{ __('Address') }}</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="{{ __('Address') }}" value="{{ $gs->address }}">
                        </div>

                        <div class="form-group ">
                            <label for="copyright_text" class="col-form-label">{{ __('Copyright Text') }}</label>
                            <input type="text" class="form-control" id="copyright_text" name="copyright_text"
                                placeholder="{{ __('Copyright Text') }}" value="{{ $gs->copyright_text }}">
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-primary">@lang('Update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/admin/js/colorpicker.js') }}"></script>
    <script>
        'use strict';
        $(document).ready(function() {
            $(".cp").colorpicker({
                format: "auto",
            });

            $('input[name=allowed_email]').tagify();

            $('#select2-basic').select2();
        });
    </script>
@endpush
