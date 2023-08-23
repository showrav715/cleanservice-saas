@extends('layouts.admin')
@section('title')
   @lang('Edit Customer Package Data')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>@lang('Edit Customer Package Data')</h1>
        <a href="{{route('admin.customer.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back') </a>
    </div>
</section>
@endsection
@section('content')

<div class="row justify-content-center">
   <div class="col-md-12">
      <div class="card mb-4">
         <div class="card-body">
            <form method="post" action="{{route('admin.customer.package.update',$user->id)}}" >
               @csrf
               @method('PUT')
               <div class="row">
                  
                  <div class="col-sm-4 col-md-6 col-lg-6 offset-lg-3 offset-md-3 border border py-2">
                     <div class="form-group">
                        <label>Custom Domain</label>
                        <select class="form-control" name="custom_domain">
                           <option value="1" {{ $data->custom_domain == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->custom_domain == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>QR Builder</label>
                        <select class="form-control" name="qr_code">
                           <option value="1" {{ $data->qr_code == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->qr_code == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Pages</label>
                        <select class="form-control" name="page">
                           <option value="1" {{ $data->page == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->page == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Blog</label>
                        <select class="form-control" name="blog">
                           <option value="1" {{ $data->blog == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->blog == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>
                    
                     <div class="form-group">
                        <label>Skill</label>
                        <select class="form-control" name="skill">
                           <option value="1" {{ $data->skill == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->skill == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Service</label>
                        <select class="form-control" name="service">
                           <option value="1" {{ $data->service == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->service == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Testimonial</label>
                        <select class="form-control" name="testimonial">
                           <option value="1" {{ $data->testimonial == '1' ? 'selected' : ''}}>Yes</option>
                           <option value="0" {{ $data->testimonial == '0' ? 'selected' : ''}}>No</option>
                        </select>
                     </div>

                     <div class="form-group text-right">
                           <button class="btn btn-primary basicbtn" type="submit">Update</button>
                     </div>
                    
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection