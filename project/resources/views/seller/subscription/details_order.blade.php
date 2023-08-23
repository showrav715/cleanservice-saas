@extends('layouts.seller')
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Order No:') {{ $order->order_no }}</h1>
        </div>
    </section>
@endsection
@section('title')
    @lang('Orders')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('Order Information')</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>@lang('Order No')</td>
                                    <td><b>{{ $order->order_no }}</b></td>
                                </tr>
                                <tr>
                                    <td>@lang('Order Status')</td>
                                    <td>
                                        @if ($order->status == 0)
                                            <span class="badge badge-primary"> @lang('Pending') </span>
                                        @elseif($order->status == 1)
                                            <span class="badge badge-success"> @lang('Approved') </span>
                                        @else
                                            <span class="badge badge-success"> @lang('Expired') </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>@lang('Order Created Date')</td>
                                    <td><b>{{ dateFormat($order->created_at) }}</b></td>
                                </tr>
                                
                                <tr>
                                    <td>@lang('Order Will Be Expired')</td>
                                    <td><b>{{ dateFormat($order->will_expire) }}</b></td>
                                </tr>
                                <tr>
                                    <td>@lang('Order Amount')</td>
                                    <td><b>{{ adminShowAmount($order->amount) }}</b></td>
                                </tr>
                                
                                <tr>
                                    <td>@lang('Plan Name')</td>
                                    <td><b>{{ $order->package_info->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>@lang('Payment Mode')</td>
                                    <td><b>{{ $order->method }}</b></td>
                                </tr>
                                <tr>
                                    <td>@lang('Transaction Id')</td>
                                    <td><b>{{$order->txn}}</b></td>
                                </tr>
                                <tr>
                                    <td>@lang('Payment Status')</td>
                                    <td>
                                          @if ($order->payment_status == 0)
                                             <span class="badge badge-danger"> @lang('Unpaid') </span>
                                          @else
                                             <span class="badge badge-success"> @lang('Paid') </span>
                                          @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('Package Information')</h4>
                </div>
                <div class="card-body">
                    <div class="pricing">
                        <div class="pricing-title">
                            {{ $package->name }}
                        </div>
                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>{{ landingShowAmount($package->price) }}</div>
                                @if ($package->days == 7)
                                    <div class="pricing-detail"><strong>@lang('Per Week')</strong></div>
                                @elseif($package->days == 30)
                                    <div class="pricing-detail"><strong>@lang('Per Month')</strong></div>
                                @elseif($package->days == 365)
                                    <div class="pricing-detail"><strong>@lang('Per Year')</strong></div>
                                @endif
                                <p> {{ $package->description }}</p>
                            </div>
    
                            <div class="pricing-details">

                                <div class="pricing-item">
                                    <div class="pricing-item-label">@lang('Service Limit') {{ $package->service_limit }}</div>
                                </div>
    
                                <div class="pricing-item">
                                    <div class="pricing-item-label">@lang('Blog Limit') {{ $package->blog_limit }}</div>
                                </div>
    
                           
    
                                <div class="pricing-item">
                                    <div class="pricing-item-label">@lang('Project Limit') {{ $package->project_limit }}</div>
                                </div>
    
                                <div class="pricing-item">
                                    <div class="pricing-item-label">@lang('Team Member Limit') {{ $package->team_limit }}</div>
                                </div>
    
                                <div class="pricing-item">
                                    @if ($package->custom_domain == 1)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
    
                                    <div class="pricing-item-label">@lang('Custom Domain')</div>
                                </div>
    
                                <div class="pricing-item">
                                    @if ($package->multiple_theme == 1)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
    
                                    <div class="pricing-item-label"> @lang('Multiple Theme')</div>
                                </div>
                              
    
                                <div class="pricing-item">
                                    @if ($package->support == 1)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
    
                                    <div class="pricing-item-label"> @lang('Online Support')</div>
                                </div>
    
                                <div class="pricing-item">
                                    @if ($package->qr_code == 1)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
                                    <div class="pricing-item-label">@lang('QR CODE')</div>
                                </div>
    
                                <div class="pricing-item">
                                    @if ($package->facebook_pixel == 1)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
                                    <div class="pricing-item-label">@lang('Facebook Pixel')</div>
                                </div>
    
                                <div class="pricing-item">
    
                                    @if ($package->google_analytics == 1)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
    
                                    <div class="pricing-item-label"> @lang('Google Analytics')</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="{{ route('seller.subscription.details', $package->id) }}"> @lang('Renew') <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
