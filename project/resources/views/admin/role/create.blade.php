@extends('layouts.admin')
@section('title')
    @lang('Add Role')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Add Role')</h1>
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back')
            </a>
        </div>
    </section>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('admin.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>@lang('Permission')</label>
                            <select name="data[]" class="select2" multiple>
                                <option value="Package Management">@lang('Package Management')</option>
                                <option value="Manage Orders">@lang('Manage Orders')</option>
                                <option value="Customer">@lang('Customer')</option>
                                <option value="Support Tickets">@lang('Support Tickets')</option>
                                <option value="Manage Role">@lang('Manage Role')</option>
                                <option value="Manage Staff">@lang('Manage Staff')</option>
                                <option value="Manage Domain">@lang('Manage Domain')</option>
                                <option value="Payment Gateway">@lang('Payment Gateway')</option>
                                <option value="General Settings">@lang('General Settings')</option>
                                <option value="Frontend Settings">@lang('Frontend Settings')</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
@endsection
