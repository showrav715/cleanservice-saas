@extends('layouts.admin')
@section('title')
   @lang('Create Customer')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>@lang('Create Customer')</h1>
        <a href="{{route('admin.customer.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back') </a>
    </div>
</section>
@endsection
@section('content')

<div class="row justify-content-center">
   <div class="col-md-12">
      <!-- Form Basic -->
      <div class="card mb-4">
         <div class="card-body">
           
            <form action="{{route('admin.customer.store')}}" method="post">
               @csrf
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer Name</label>
                  <div class="col-sm-12 col-md-7">
                     <input type="text" class="form-control" name="name" value="{{old('name')}}">
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Customer Email</label>
                  <div class="col-sm-12 col-md-7">
                     <input type="email" class="form-control" name="email" value="{{old('email')}}">
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                  <div class="col-sm-12 col-md-7">
                     <input type="text" class="form-control" name="password">
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Method</label>
                  <div class="col-sm-12 col-md-7">
                     <select class="form-control" name="method" required>
                        @foreach ($gateweys as $gateway)
                        <option value="{{$gateway->keyword}}">{{$gateway->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transaction Id</label>
                  <div class="col-sm-12 col-md-7">
                     <input type="text" class="form-control" value="{{Str::random(9)}}" name="trasection_id">
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package/Plan</label>
                  <div class="col-sm-12 col-md-7">
                     <select class="form-control" name="package_id" required>
                        @foreach ($packages as $package)
                        <option value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SubDomain Name  <br><small class="text-danger">only set your subdomain</small></label>
                  <div class="col-sm-12 col-md-7 input-group">
                     <input type="text" class="form-control text-right" name="domain_name" value="{{ old('domain_name') }}" placeholder="subdomain">
                     <div class="input-group-append">
                        <div class="input-group-text">.{{ env('MAIN_DOMAIN') }}</div>
                     </div>
                     
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
      <!-- Form Sizing -->
      <!-- Horizontal Form -->
   </div>
</div>
<!--Row-->
@endsection