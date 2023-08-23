@extends('layouts.seller')
@section('title')
   @lang('Edit Slider')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header  d-flex justify-content-between">
        <h1>@lang('Edit Slider')</h1>
        <a href="{{route('seller.slider.index')}}" class="btn btn-primary"><i class="fas fa-backward"></i> @lang('Back')</a>
    </div>
</section>
@endsection
@section('content')

<div class="row justify-content-center">
   <div class="col-md-12">
      <!-- Form Basic -->
      <div class="card mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Slider Form') }}</h6>
         </div>
         <div class="card-body">
           
            <form action="{{route('seller.slider.update',$slider->id)}}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="col-md-12 ShowImage mb-3  text-center">
                    <img src="{{ showPhoto($slider->photo) }}" class="img-fluid" alt="image" width="400">
                 </div>
                <div class="form-group">
                    <label for="title">{{ __('Title') }} *</label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="{{ __('Title') }}" value="{{old('title',$slider->title)}}">
                </div>
                <div class="form-group">
                    <label for="subtitle">{{ __('Subtitle') }} *</label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" required placeholder="{{ __('Subtitle') }}" value="{{old('subtitle',$slider->subtitle)}}">
                </div>

                <div class="form-group">
                    <label for="text">{{ __('Text') }} *</label>
                    <textarea name="text" class="form-control" id="text"rows="4" placeholder="Enter Sort Text">{{$slider->text}}</textarea>
                </div>
            
                <div class="form-group">
                    <label for="image">{{ __('Slider Photo') }} *</label>
                    <span class="ml-3">{{ __('(Extension:jpeg,jpg,png)') }}</span>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo" id="image" accept="image/*">
                        <label class="custom-file-label" for="photo">{{ __('Choose file') }}</label>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="btn1_text">{{ __('Button 1 Text') }}</label>
                            <input type="text" class="form-control" name="btn1_text" id="btn1_text" placeholder="{{ __('Button 1 Text') }}" value="{{old('btn1_text',$slider->btn1_text)}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="btn1_link">{{ __('Button 1 Link') }}</label>
                            <input type="text" class="form-control" name="btn1_link" id="btn1_link" placeholder="{{ __('Button 1 Link') }}" value="{{old('btn1_link',$slider->btn1_link)}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="btn1_text">{{ __('Button 2 Text') }}</label>
                            <input type="text" class="form-control" name="btn2_text" id="btn2_text" placeholder="{{ __('Button 2 Text') }}" value="{{old('btn2_text',$slider->btn2_text)}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="btn2_link">{{ __('Button 2 Link') }}</label>
                            <input type="text" class="form-control" name="btn2_link" id="btn2_link" placeholder="{{ __('Button 2 Link') }}" value="{{old('btn2_link',$slider->btn2_link)}}">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
         </div>
      </div>
      <!-- Form Sizing -->
      <!-- Horizontal Form -->
   </div>
</div>
<!--Row-->
@endsection