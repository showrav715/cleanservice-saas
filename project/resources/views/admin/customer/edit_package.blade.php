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
             
                  <div class="col-sm-4 offset-sm-2 border py-2">
                     <div class="form-group">
                        <label>Service Limit</label>
                        <input type="number" name="service_limit" class="form-control" value="{{$data->service_limit}}"> 
                     </div>
               
                     <div class="form-group">
                        <label>Blog Limit</label>
                        <input type="number" value="{{$data->blog_limit}}" name="blog_limit" class="form-control"> 
                     </div>

                     <div class="form-group">
                        <label>Project Limit</label>
                        <input type="number" value="{{$data->project_limit}}" name="project_limit" class="form-control"> 
                     </div>
                    
                     <div class="form-group">
                        <label>Team Limit</label>
                        <input type="number" value="{{$data->team_limit}}" name="team_limit" class="form-control"> 
                     </div>
                   
                     <div class="form-group">
                        <button class="btn btn-primary basicbtn" type="submit">Update</button>
                     </div>
                  </div>
                  <div class="col-sm-4 border border-left-0 py-2">
                    
                     <div class="form-group">
                        <label>Custom Domain</label>
                        <select class="form-control" name="custom_domain">
                           <option value="1" {{ $data->custom_domain == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ $data->custom_domain == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
               
                  
               
                     <div class="form-group">
                        <label>Support</label>
                        <select class="form-control" name="support">
                           <option value="1" {{ $data->support == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ $data->support == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>QR code</label>
                        <select class="form-control" name="qr_code">
                           <option value="1" {{ $data->qr_code == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ $data->qr_code == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Facebook Pixel</label>
                        <select class="form-control" name="facebook_pixel">
                           <option value="1" {{ $data->facebook_pixel == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ $data->facebook_pixel == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
                    
                     <div class="form-group">
                        <label>Google Analytics</label>
                        <select class="form-control" name="google_analytics">
                           <option value="1" {{ $data->google_analytics == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ $data->google_analytics == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
                    
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection