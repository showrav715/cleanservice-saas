@extends('layouts.admin')

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
                    <form action="{{ route('admin.gs.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="basic" value="1">
                       
                            <div class="form-group">
                                <label for="title" class="col-form-label">{{ __('Website Title') }}</label>

                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="{{ __('Website Title') }}" value="{{ $gs->title }}">

                            </div>

                            <div class="form-group ">
                                <label for="phone" class="col-form-label">{{ __('Contact No') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="{{ __('Contact No') }}" value="{{ $gs->phone }}">
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
                                <label for="footer_text" class="col-form-label">{{ __('Footer Text') }}</label>
                                <input type="text" class="form-control" id="footer_text" name="footer_text"
                                    placeholder="{{ __('Footer Text') }}" value="{{ $gs->footer_text }}">
                            </div>

                            <div class="form-group ">
                                <label for="copyright_text" class="col-form-label">{{ __('Copyright Text') }}</label>
                                <input type="text" class="form-control" id="copyright_text" name="copyright_text"
                                    placeholder="{{ __('Copyright Text') }}" value="{{ $gs->copyright_text }}">
                            </div>

                            <div class="form-group ">
                                <label for="contact_page_title" class="col-form-label">{{ __('Contact Page Title') }}</label>
                                <input type="text" class="form-control" id="contact_page_title" name="contact_page_title"
                                    placeholder="{{ __('Contact Page Title') }}" value="{{ $gs->contact_page_title }}">
                            </div>

                            <div class="form-group ">
                                <label for="contact_page_text" class="col-form-label">{{ __('Contact Page Text') }}</label>
                                <input type="text" class="form-control" id="contact_page_text" name="contact_page_text"
                                    placeholder="{{ __('Contact Page Text') }}" value="{{ $gs->contact_page_text }}">
                            </div>


                        <div class="form-group text-right">
                            <button class="btn btn-primary">@lang('Update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('Switch Control')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gs.update') }}" class="row" method="POST">
                        @csrf
                        <input type="hidden" name="switch" value="1">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                        <input class="cswitch--input permission" name="is_maintenance" type="checkbox"
                                            {{ $gs->is_maintenance == 1 ? 'checked' : '' }} />
                                        <span class="cswitch--trigger wrapper"></span>
                                        <span class="cswitch--label font-weight-bold ">@lang('Maintainance Mode')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                        <input class="cswitch--input permission" name="is_verify" type="checkbox"
                                            {{ $gs->is_verify == 1 ? 'checked' : '' }} />
                                        <span class="cswitch--trigger wrapper"></span>
                                        <span class="cswitch--label font-weight-bold ">@lang('Email Verification')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                        <input class="cswitch--input permission" name="registration" type="checkbox"
                                            {{ $gs->registration == 1 ? 'checked' : '' }} />
                                        <span class="cswitch--trigger wrapper"></span>
                                        <span class="cswitch--label font-weight-bold ">@lang('User Registration')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                        <input class="cswitch--input permission" name="email_notify" type="checkbox"
                                            {{ $gs->email_notify == 1 ? 'checked' : '' }} />
                                        <span class="cswitch--trigger wrapper"></span>
                                        <span class="cswitch--label font-weight-bold ">@lang('Email Notification')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                        <input class="cswitch--input permission" name="sms_notify" type="checkbox"
                                            {{ $gs->sms_notify == 1 ? 'checked' : '' }} />
                                        <span class="cswitch--trigger wrapper"></span>
                                        <span class="cswitch--label font-weight-bold ">@lang('Sms Notification')</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                        <input class="cswitch--input permission" name="debug_mode" type="checkbox"
                                            {{ $gs->debug_mode == 1 ? 'checked' : '' }} />
                                        <span class="cswitch--trigger wrapper"></span>
                                        <span class="cswitch--label font-weight-bold ">@lang('Debug Mode')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary">@lang('Update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('Extension Settings')</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gs.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="extension" value="1">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>@lang('Tawk.to status')</label>
                                <select name="is_tawk" class="form-control">
                                    <option value="1" {{ $gs->is_tawk == 1 ? 'selected' : '' }}>@lang('Active')
                                    </option>
                                    <option value="0" {{ $gs->is_tawk == 0 ? 'selected' : '' }}>@lang('Inactive')
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tawk_id">{{ __('Tawk.to ID') }}</label>
                                <input type="text" class="form-control" id="tawk_id" name="tawk_id"
                                    value="{{ $gs->tawk_id }}" placeholder="{{ __('Tawk.to ID') }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>@lang('Google Recaptcha Status')</label>
                                <select name="recaptcha" class="form-control">
                                    <option value="1" {{ $gs->recaptcha == 1 ? 'selected' : '' }}>@lang('Active')
                                    </option>
                                    <option value="0" {{ $gs->recaptcha == 0 ? 'selected' : '' }}>@lang('Inactive')
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="recaptcha_key">{{ __('Recaptcha Site Key') }}</label>
                                <input type="text" class="form-control" id="recaptcha_key" name="recaptcha_key"
                                    value="{{ $gs->recaptcha_key }}" placeholder="{{ __('Recaptcha Site Key') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="recaptcha_key">{{ __('Recaptcha Secret Key') }}</label>
                                <input type="text" class="form-control" id="recaptcha_secret" name="recaptcha_secret"
                                    value="{{ $gs->recaptcha_secret }}" placeholder="{{ __('Recaptcha Secret Key') }}">
                            </div>

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
