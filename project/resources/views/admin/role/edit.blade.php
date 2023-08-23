@extends('layouts.admin')
@section('title')
    @lang('Edit Role')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Edit Role')</h1>
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

                    <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input class="form-control" type="text" name="name" value="{{ $role->name }}">
                        </div>

                        @php
                            $data = json_decode($role->data, true);
                            if (!$data) {
                                $data = [];
                            }
                        @endphp
                        <div class="form-group">
                            <label>@lang('Permission')</label>
                            <select name="data[]" class="select2" multiple>
                                <option value="Package Management"
                                    {{ in_array('Package Management', $data) ? 'selected' : '' }}>@lang('Package Management')</option>
                                <option value="Manage Orders" {{ in_array('Manage Orders', $data) ? 'selected' : '' }}>
                                    @lang('Manage Orders')</option>
                                <option value="Customer" {{ in_array('Customer', $data) ? 'selected' : '' }}>
                                    @lang('Customer')</option>
                                <option value="Support Tickets" {{ in_array('Support Tickets', $data) ? 'selected' : '' }}>
                                    @lang('Support Tickets')</option>
                                <option value="Manage Role" {{ in_array('Manage Role', $data) ? 'selected' : '' }}>
                                    @lang('Manage Role')</option>
                                <option value="Manage Staff" {{ in_array('Manage Staff', $data) ? 'selected' : '' }}>
                                    @lang('Manage Staff')</option>
                                <option value="Manage Domain" {{ in_array('Manage Domain', $data) ? 'selected' : '' }}>
                                    @lang('Manage Domain')</option>
                                <option value="Payment Gateway" {{ in_array('Payment Gateway', $data) ? 'selected' : '' }}>
                                    @lang('Payment Gateway')</option>
                                <option value="General Settings"
                                    {{ in_array('General Settings', $data) ? 'selected' : '' }}>@lang('General Settings')</option>
                                <option value="Frontend Settings"
                                    {{ in_array('Frontend Settings', $data) ? 'selected' : '' }}>@lang('Frontend Settings')</option>
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
