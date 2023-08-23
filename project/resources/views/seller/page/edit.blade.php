@extends('layouts.seller')
@section('title')
   @lang('Edit Page')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>@lang('Edit Page')</h1>
        <a href="{{route('seller.page.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back') </a>
    </div>
</section>
@endsection
@section('content')

<div class="row justify-content-center">
   <div class="col-md-12">
      <div class="card mb-4">
         <div class="card-body">
          
            <form action="{{route('seller.page.update',$page->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
            
               <div class="form-group">
                  <label for="inp-name">{{ __('Title') }}</label>
                  <input type="text" class="form-control" id="inp-name" name="title"  placeholder="{{ __('Enter Title') }}" value="{{$page->title}}" required>
               </div>
               <div class="form-group">
                  <label for="description">{{ __('Description') }}</label>
                  <textarea id="area1" class="form-control summernote" name="details" placeholder="{{ __('Description') }}">{{$page->details}}</textarea>
              </div>
               <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection