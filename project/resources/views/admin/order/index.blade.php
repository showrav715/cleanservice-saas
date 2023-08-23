@extends('layouts.admin')
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Orders')</h1>
        </div>
    </section>
@endsection
@section('title')
    @lang('Orders')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table table-striped" id="table">
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
                        <tbody >
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



                                <td  data-label="@lang('Action')" >
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
@endsection

@push('script')
@endpush
