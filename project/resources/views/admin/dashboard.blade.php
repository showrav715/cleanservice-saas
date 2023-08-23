@extends('layouts.admin')
@section('title')
    @lang('Admin Dashboard')
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
       <div class="col-xl-4 col-lg-4 col-sm-6 col-12">
           <div class="card card-statistic-1">
               <div class="card-icon bg-primary">
                   <i class="fas fa-users"></i>
               </div>
               <div class="card-wrap">
                   <div class="card-header">
                       <h4>@lang('Total User')</h4>
                   </div>
                   <div class="card-body">
                      {{$total_customer}}
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-4 col-lg-4 col-sm-6 col-12">
           <div class="card card-statistic-1">
               <div class="card-icon bg-primary">
                   <i class="far fa-user"></i>
               </div>
               <div class="card-wrap">
                   <div class="card-header">
                       <h4>@lang('Total Staff')</h4>
                   </div>
                   <div class="card-body">
                      {{$total_staff}}
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-4 col-lg-4 col-sm-6 col-12">
           <div class="card card-statistic-1">
               <div class="card-icon bg-primary">
                <i class="fab fa-product-hunt"></i>
               </div>
               <div class="card-wrap">
                   <div class="card-header">
                       <h4>@lang('Total Package')</h4>
                   </div>
                   <div class="card-body">
                      {{$total_package}}
                   </div>
               </div>
           </div>
       </div>
      
   </div>

    <div class="row">
        <div class="col-sm-6 col-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-success text-white">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                       <h4>@lang('Total Orders')</h4>
                    </div>
                    <div class="card-body">
                        {{$total_order}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-12">
            <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary text-white">
                {{defaultCurr()->symbol}}
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>@lang('Total Earning')</h4>
                </div>
                <div class="card-body">
                    {{adminShowAmount($total_earning)}}
                </div>
            </div>
            </div>
        </div>
    </div>


   <div class="row">
       <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-header">
                   <h4>@lang('Recent Orders')</h4>
               </div>
               <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>@lang('Oder Id')</th>
                                <th>@lang('Customer')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Purchase Date')</th>
                                <th>@lang('Expiry Date')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Method')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Expiry')</th>
                                <th class="text-right">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <td data-label="@lang('Order Id')">
                                    {{ $item->order_no }}
                                </td>
                                <td data-label="@lang('Customer')">
                                    {{ $item->user->name }}
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
                                    {{ adminShowAmount($item->amount) }}
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

                                <td data-label="@lang('Expiry')">
                                    @if (Carbon\Carbon::parse($item->will_expire)->isPast())
                                        <span class="badge badge-danger"> @lang('Expired') </span>
                                    @else
                                        <span class="badge badge-success"> @lang('Active') </span>
                                    @endif
                                </td>



                                <td data-label="@lang('Action')" class="text-right">
                                    <div class="btn-group mb-2">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @lang('Action')
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                           <a class="dropdown-item" href="{{route('admin.order.edit',$item->id)}}">@lang('Edit')</a>
                                           <a class="dropdown-item" href="{{route('admin.order.details',$item->id)}}">@lang('View')</a>
                                        </div>
                                     </div>
                                </td>
                            </tr>
                       
                        @endforeach
                        </tbody>
                    </table>
                  </div>
               </div>
           </div>
       </div>
       <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-header">
                   <h4>@lang('Recent Registered Users')</h4>
               </div>
               <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Domain')</th>
                                <th>@lang('Package/Plan')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $seller)
                            <tr>
                                <td data-label="@lang('Title')">
                                    {{ $seller->name }}
                                </td>
                                <td data-label="@lang('URL Slug')">
                                    {{ $seller->email }}
                                </td>
                                <td data-label="@lang('Details')">
                                    <a href="{{ $seller->domain->domain ?? '' }}"
                                        target="_blank">{{ $seller->domain->domain ?? '' }}</a>
                                </td>
                                <td data-label="@lang('Package')">
                                    {{ $seller->user_package->package_info->name ?? '' }}
                                </td>
                                <td>
                                    @if ($seller->status == 1)
                                        <span class="badge badge-success">{{ __('Active') }}</span>
                                    @elseif($seller->status == 0)
                                        <span class="badge badge-danger">{{ __('Trash') }}</span>
                                    @elseif($seller->status == 2)
                                        <span class="badge badge-warning">{{ __('Suspended') }}</span>
                                    @elseif($seller->status == 3)
                                        <span class="badge badge-primary">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Actions')">
                                    <div class="dropdown d-inline ">
                                        <button class="btn btn-primary btn-sm dropdown-toggle"
                                            type="button"id="dropdownMenuButton2" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item has-icon edit" href="javascript:;"
                                                data-route="{{ route('admin.customer.update', $seller->id) }}"
                                                data-item="{{ $seller }}" data-toggle="tooltip"
                                                title="@lang('Edit')"><i class="fas fa-user-edit"></i>
                                                {{ __('Edit') }}</a>
                                            
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.customer.package.edit', $seller->id) }}"><i
                                                    class="far fa-edit"></i>{{ __('Edit Package') }}</a>
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.customer.view', $seller->id) }}"><i
                                                    class="far fa-eye"></i>{{ __('View') }}</a>
                                        </div>
                                    </div>
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

@endsection
