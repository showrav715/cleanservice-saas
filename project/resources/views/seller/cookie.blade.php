@extends('layouts.seller')

@section('title')
    @lang('Cookie Concent')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Cookie Concent')</h1>
        </div>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        @php
                            $cookie = json_decode($gs->cookie,true);
                        @endphp
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">@lang('Cookie Status')</label>
                                <select name="status" id="" class="form-control" required>
                                    <option value="1" {{ @$cookie['status'] == 1 ? 'selected' : '' }}>@lang('Yes')
                                    </option>
                                    <option value="0" {{ @$cookie['status'] == 0 ? 'selected' : '' }}>@lang('No')
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">

                                <label for="">@lang('Cookie Button Text')</label>
                                <input type="text" name="button_text" class="form-control"
                                    value="{{ @$cookie['button_text']}}" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">@lang('Cookie condition text')</label>
                                <textarea name="cookie_text" id="" cols="30" rows="10" class="form-control" required>{{ __(@$cookie['cookie_text']) }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">@lang('Update')</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
