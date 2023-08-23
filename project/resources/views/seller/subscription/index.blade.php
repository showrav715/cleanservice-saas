@extends('layouts.seller')
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Subscriptions')</h1>
        </div>
    </section>
@endsection
@section('title')
    @lang('Subscriptions')
@endsection
@section('content')
    @php
        $current_domain = Auth::user()->domain;
        $current_package = json_decode($current_domain->data,true)['id'];
       
    @endphp
    <div class="row">
        @foreach ($datas as $package)
            <div class="col-12 col-md-4 col-lg-4">
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
                        <a href="{{ route('seller.subscription.details', $package->id) }}"> 
                            @if ($current_package == $package->id)
                                @lang('Current Package')
                            @else
                            @lang('Subscribe') 
                            <i class="fas fa-arrow-right"></i>
                            @endif
                            </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table table-striped">
                        <tr>
                            <th>@lang('Oder Id')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Purchase Date')</th>
                            <th>@lang('Expiry Date')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Method')</th>
                            <th>@lang('Status')</th>
                            <th class="text-right">@lang('Action')</th>
                        </tr>
                        @forelse ($orders as $item)
                            <tr>
                                <td data-label="@lang('Method')">
                                    {{ $item->order_no }}
                                </td>
                                <td data-label="@lang('Name')">
                                    {{ $item->package_info->name }}
                                </td>
                                <td data-label="@lang('Purchase Date')">
                                    {{ dateFormat($item->created_at) }}
                                </td>

                                <td data-label="@lang('Expiry Date')">
                                    {{ dateFormat($item->will_expire) }}
                                </td>

                                <td data-label="@lang('Price')">
                                    {{ landingShowAmount($item->amount) }}
                                </td>

                                <td data-label="@lang('Method')">
                                    {{ $item->method }}
                                </td>

                                <td data-label="@lang('Status')">
                                    @if ($item->status == 0)
                                        <span class="badge badge-primary"> @lang('Pending') </span>
                                    @elseif($item->status == 1)
                                        <span class="badge badge-success"> @lang('Approved') </span>
                                    @else
                                        <span class="badge badge-success"> @lang('Expired') </span>
                                    @endif
                                </td>

                                <td data-label="@lang('Action')" class="text-right">
                                    <a href="{{ route('seller.subscription.order.details', $item->id) }}"
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
@endsection

@push('script')
@endpush
