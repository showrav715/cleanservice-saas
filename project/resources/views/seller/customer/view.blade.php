@extends('layouts.admin')
@section('title')
    @lang('View Customer')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header  d-flex justify-content-between">
            <h1>@lang('View Customer')</h1>
            <a href="{{ route('admin.customer.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i>
                @lang('Back')</a>
        </div>
    </section>
@endsection
@section('content')
    <div class="row justify-content-center">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ getPhoto($user->photo) }}" class="profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Package / Plan</div>
                            @php
                                $package = $user->user_package;
                            @endphp
                            <div class="profile-widget-item-value">{{ $user->user_package->package_info->name }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Will Expired</div>
                            <div class="profile-widget-item-value">{{ $user->domain->will_expire }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Status</div>
                            <div class="profile-widget-item-value">
                                @if ($user->status == 1)
                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                @elseif($user->status == 0)
                                    <span class="badge badge-danger">{{ __('Pending') }}</span>
                                @elseif($user->status == 2)
                                    <span class="badge badge-warning">{{ __('Ban') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    if (request()->secure()) {
                        $customer_domain = 'https://' . $user->domain->domain;
                    } else {
                        $customer_domain = 'http://' . $user->domain->domain;
                    }
                @endphp
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ $user->name }} <div
                            class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> <a href="{{ $customer_domain }}"
                                target="_blank">{{ $user->domain->domain }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>@lang('Customer Information')</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 mt-2">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active show" id="profile-list"
                                    data-toggle="list" href="#profile" role="tab"
                                    aria-selected="false"><b>@lang('Basic Information')</b></a>

                                <a class="list-group-item list-group-item-action" id="package-list" data-toggle="list"
                                    href="#package" role="tab" aria-selected="false"><b>@lang('Package History')</b></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="profile" role="tabpanel"
                                    aria-labelledby="profile-list">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <strong>@lang('Customer Name')</strong>
                                                </div>
                                                <div class="col-8">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <strong>@lang('Customer Email')</strong>
                                                </div>
                                                <div class="col-8">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <strong>@lang('Customer Phone')</strong>
                                                </div>
                                                <div class="col-8">
                                                    {{ $user->phone }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <strong>@lang('Customer Address')</strong>
                                                </div>
                                                <div class="col-8">
                                                    {{ $user->address }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <strong>@lang('Customer City')</strong>
                                                </div>
                                                <div class="col-8">
                                                    {{ $user->city }}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="package-list">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>@lang('Order No')</th>
                                                    <th>@lang('Package Name')</th>
                                                    <th>@lang('Price')</th>
                                                    <th>@lang('Created At')</th>
                                                    <th>@lang('View')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($package_histories as $item)
                                                    <tr>
                                                        <th data-label="Order No">{{ $item->order_no }}</th>
                                                        <td data-label="Package Name">{{ $item->package_info->name }}</td>
                                                        <td data-label="Price">{{ $item->amount }}</td>
                                                        <td data-label="Created at">{{ dateFormat($item->created_at) }}
                                                        </td>
                                                        <td data-label="view">
                                                            <a href="{{ route('admin.order.details', $item->id) }}"
                                                                class="btn btn-primary btn-sm mb-1"
                                                                title="@lang('Edit')"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
