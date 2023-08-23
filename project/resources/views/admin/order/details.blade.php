@extends('layouts.admin')
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
                    <h4>Order Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Order No</td>
                                    <td><b>{{ $order->order_no }}</b></td>
                                </tr>
                                <tr>
                                    <td>Order Status</td>
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
                                    <td>Order Created Date</td>
                                    <td><b>{{ dateFormat($order->created_at) }}</b></td>
                                </tr>
                                
                                <tr>
                                    <td>Order Will Be Expired</td>
                                    <td><b>{{ dateFormat($order->will_expire) }}</b></td>
                                </tr>
                                <tr>
                                    <td>Order Amount</td>
                                    <td><b>{{ adminShowAmount($order->amount) }}</b></td>
                                </tr>
                                
                                <tr>
                                    <td>Plan Name</td>
                                    <td><b>{{ $order->package_info->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Payment Mode</td>
                                    <td><b>{{ $order->method }}</b></td>
                                </tr>
                                <tr>
                                    <td>Transaction Id</td>
                                    <td><b>{{$order->txn}}</b></td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
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
                    <h4>User Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>User Name</td>
                                    <td><b><a href="{{route('admin.customer.view',$order->user_id)}}">{{$order->user->name}}</a></b></td>
                                </tr>
                                <tr>
                                    <td>User Email</td>
                                    <td><a href="mailto:{{$order->user->name}}"><b>{{$order->user->name}}</b></a></td>
                                </tr>
                                <tr>
                                    <td>User Domain</td>
                                    <td><b><a href="javascript:;">{{$order->user->domain->domain}}</a></b></td>
                                </tr>
                                <tr>
                                    <td>Join Date</td>
                                    <td><b><a href="javascript:;">{{dateFormat($order->user->created_at)}}</a></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
