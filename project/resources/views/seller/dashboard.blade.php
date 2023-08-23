@extends('layouts.seller')
@section('title')
    @lang('Seller Dashboard')
@endsection
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Dashboard')</h1>
        </div>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('Total Earning')</h4>
                    </div>
                    <div class="card-body">
                        5
                    </div>
                </div>
            </div>
        </div>
       
       
        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('Total Service')</h4>
                    </div>
                    <div class="card-body">
                        {{$total_services}}
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-12 col-xl-9">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>@lang('Recent Orders')</h4>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table table-striped">
                                <tr>
                                    <th>@lang('Oder Id')</th>
                                    <th>@lang('Customer Email')</th>
                                    <th>@lang('Method')</th>
                                    <th>@lang('Total')</th>
                                    <th>@lang('Pay Status')</th>
                                    <th>@lang('Status')</th>
                                    <th class="text-right">@lang('Action')</th>
                                </tr>
                                @forelse ([] as $item)
                                    <tr>
                                        <td data-label="@lang('Method')">
                                            {{ $item->order_number }}
                                        </td>
                                        <td data-label="@lang('Customer Emial')">
                                            {{ $item->email }}
                                        </td>
                                        <td data-label="@lang('Method')">
                                            {{ $item->payment_method }}
                                        </td>

                                        <td data-label="@lang('Amount')">
                                            5
                                        </td>

                                        <td data-label="@lang('Pay Status')">
                                            @if ($item->payment_status == 1)
                                                <span class="badge badge-success"> @lang('Paid') </span>
                                            @else
                                                <span class="badge badge-warning"> @lang('Unpaid') </span>
                                            @endif
                                        </td>

                                        <td data-label="@lang('Status')">
                                            @if ($item->status == 0)
                                                <span class="badge badge-primary"> @lang('Pending') </span>
                                            @elseif($item->status == 1)
                                                <span class="badge badge-info"> @lang('Processing') </span>
                                            @else
                                                <span class="badge badge-success"> @lang('Completed') </span>
                                            @endif
                                        </td>

                                        <td data-label="@lang('Action')" class="text-right">
                                            <a href="{{ route('seller.order.details', $item->id) }}"
                                                class="btn btn-primary btn-sm mb-1"><i class="fas fa-eye"></i>
                                                @lang('Details')</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
        <div class="col-12 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-header-title plan_name">{{ $domain_info['name'] }}</h4>
                            <span
                                class="badge badge-soft-secondary plan_expire">{{ dateFormat($domain->will_expire) }}</span>
                            <img src="https://bigbag.dukans.xyz/uploads/loader.gif" class="plan_load"
                                style="display: none;">
                        </div>
                      
                       
                        <div class="card-header">
                            <h4 class="card-header-title">@lang('Service')</h4>
                            <span class="badge badge-soft-secondary"
                                id="storage_used">{{ Auth::user()->services->count() }}
                                / {{ $domain_info['service_limit'] }}</span>
                        </div>
                      
                       
                        <div class="card-header">
                            <h4 class="card-header-title">@lang('Project')</h4>
                            <span class="badge badge-soft-secondary"
                                id="storage_used">{{ Auth::user()->projects->count() }}
                                / {{ $domain_info['project_limit'] }}</span>
                        </div>
                       
                        <div class="card-header">
                            <h4 class="card-header-title">@lang('Blog')</h4>
                            <span class="badge badge-soft-secondary"
                                id="storage_used">{{ Auth::user()->blogs->count() }}
                                / {{ $domain_info['blog_limit'] }}</span>
                        </div>

                        <div class="card-header">
                            <h4 class="card-header-title">@lang('Team Member')</h4>
                            <span class="badge badge-soft-secondary"
                                id="storage_used">{{ Auth::user()->teams->count() }}
                                / {{ $domain_info['team_limit'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            @if (getPackage('qr_code') == 1)
            <div class="row">
                <div class="col-12">
                    <div class="card text-center">
                        <img src="{{asset('assets/qrcode/'.auth()->id().Str::slug(auth()->user()->name).'.png')}}" alt="">
                        <h4 class="mt-3">@lang('Scan this QR code to visit your store')</h4>
                        <a href="{{asset('assets/qrcode/'.auth()->id().Str::slug(auth()->user()->name).'.png')}}" download="" class="btn btn-primary m-2"><i class="fas fa-download"></i> @lang('Download')</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection


