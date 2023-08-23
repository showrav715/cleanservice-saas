@extends('layouts.admin')
@section('title')
   @lang('Create Package')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>@lang('Create Package')</h1>
        <a href="{{route('admin.package.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back') </a>
    </div>
</section>
@endsection
@section('content')

<div class="row justify-content-center">
   <div class="col-md-12">
      <div class="card mb-4">
         <div class="card-body">
            <form method="post" action="{{route('admin.package.store')}}" >
               @csrf
               <div class="row">
                  <div class="col-sm-8 border py-2">
                     <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}"> 
                     </div>
                     <div class="form-group">
                        <label>Package description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                     </div>
                     <div class="form-group">
                        <label>Package Price ({{adminCurrency()}})</label>
                        <input type="number" step="any" name="price" class="form-control" value="{{old('price')}}"> 
                     </div>
           
                     <div class="form-group">
                        <label>Service Limit</label>
                        <input type="number" name="service_limit" class="form-control" value="{{old('service_limit')}}"> 
                     </div>
               
                     <div class="form-group">
                        <label>Blog Limit</label>
                        <input type="number" value="{{old('blog_limit')}}" name="blog_limit" class="form-control"> 
                     </div>
                     <div class="form-group">
                        <label>Project Limit</label>
                        <input type="number" value="{{old('project_limit')}}" name="project_limit" class="form-control"> 
                     </div>
                    
                     <div class="form-group">
                        <label>Team Member Limit</label>
                        <input type="number" value="{{old('team_limit')}}" name="team_limit" class="form-control"> 
                     </div>
                   
                     <div class="form-group">
                        <button class="btn btn-primary basicbtn" type="submit">Update</button>
                     </div>
                  </div>
                  <div class="col-sm-4 border border-left-0 py-2">
                     <div class="form-group">
                        <label>Duration</label>
                        <select class="form-control" name="days">
                           <option value="365" {{ old('days') == '365' ? 'selected' : ''}}>Yearly</option>
                           <option value="30" {{ old('days') == '30' ? 'selected' : ''}}>Monthly</option>
                           <option value="7" {{ old('days') == '7' ? 'selected' : ''}}>Weekly</option>
                        </select>
                     </div>
                
                     <div class="form-group">
                        <label>Custom Domain</label>
                        <select class="form-control" name="custom_domain">
                           <option value="1" {{ old('custom_domain') == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('custom_domain') == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
               
                     <div class="form-group">
                        <label>Multiple Theme</label>
                        <select class="form-control" name="multiple_theme">
                           <option value="1" {{ old('multiple_theme') =='1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('multiple_theme') =='0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
               
                    
                     <div class="form-group">
                        <label>Support</label>
                        <select class="form-control" name="support">
                           <option value="1" {{ old('support') == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('support') == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>QR code</label>
                        <select class="form-control" name="qr_code">
                           <option value="1" {{ old('qr_code') == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('qr_code') == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Facebook Pixel</label>
                        <select class="form-control" name="facebook_pixel">
                           <option value="1" {{ old('facebook_pixel') == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('facebook_pixel') == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>
                    
                     <div class="form-group">
                        <label>Google Analytics</label>
                        <select class="form-control" name="google_analytics">
                           <option value="1" {{ old('google_analytics') == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('google_analytics') == '0' ? 'selected' : ''}}>Disable</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Is Featured ?</label>
                        <select class="form-control" name="is_featured">
                           <option value="0" {{ old('is_featured') == '1' ? 'selected' : ''}}>No</option>
                           <option value="1" {{ old('is_featured') == '0' ? 'selected' : ''}}>Yes</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                           <option value="1" {{ old('status') == '1' ? 'selected' : ''}}>Enable</option>
                           <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>Disable</option>
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