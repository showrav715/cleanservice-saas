@extends('layouts.admin')
@section('title')
   @lang('Edit Order')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>@lang('Edit Order')</h1>
        <a href="{{route('admin.order.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back') </a>
    </div>
</section>
@endsection
@section('content')

<div class="row justify-content-center">
   <div class="col-md-12">
      <!-- Form Basic -->
      <div class="card mb-4">
         <div class="card-body">
           
            <form class="basicform" action="{{route('admin.order.update',$order->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order Id</label>
                   <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="order_no" value="{{$order->order_no}}">
                   </div>
                </div>
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transaction Method</label>
                   <div class="col-sm-12 col-md-7">
                      <select class="form-control" name="method">
                            @foreach ($gateweys as $gateway)
                                <option value="{{ $gateway->name }}" >{{ $gateway->name }}</option>
                            @endforeach
                      </select>
                   </div>
                </div>
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transaction Id</label>
                   <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="txn" value="{{$order->txn}}">
                   </div>
                </div>

                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
                   <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="amount" value="{{$order->amount}}">
                   </div>
                </div>
               
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Status</label>
                   <div class="col-sm-12 col-md-7">
                      <select class="form-control" name="payment_status">
                            <option value="1" {{$order->payment_status == 1 ? 'selected' : ''}}>Paid</option>
                            <option value="0" {{$order->payment_status == 0 ? 'selected' : ''}}>Unpaid</option>
                      </select>
                   </div>
                </div>
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package</label>
                   <div class="col-sm-12 col-md-7">
                      <select class="form-control" name="package_id">
                        @foreach ($packages as $package)
                            <option value="{{$package->id}}" {{$package->name == $order->method ? 'selected' : ''}} >{{$package->name}}</option>
                        @endforeach
                      </select>
                   </div>
                </div>
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Order Status</label>
                   <div class="col-sm-12 col-md-7">
                      <select class="form-control" name="order_status">
                         <option value="1" {{$order->status == 1 ? 'selected' : ''}}>Approved</option>
                         <option value="0" {{$order->status == 0 ? 'selected' : ''}}>Pending</option>
                      </select>
                   </div>
                </div>
               
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                   <div class="col-sm-12 col-md-7">
                      <button class="btn btn-primary basicbtn" type="submit">Save</button>
                   </div>
                </div>
             </form>
         </div>
      </div>

   </div>
</div>

@endsection