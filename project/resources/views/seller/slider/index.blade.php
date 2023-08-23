@extends('layouts.seller')

@section('title')
    @lang('Manage Slider')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Manage Slider')</h1>
        </div>
    </section>
@endsection
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('seller.slider.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        @lang('Add New')</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-striped">

                        <tr>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Is Banner') }} <small><b>(Without slider themes)</b></small> </th>
                            <th>{{ __('Action') }}</th>
                        </tr>


                        @forelse ($sliders as $item)
                            <tr>

                                <td data-label="{{ __('Image') }}">
                                    <img width="200" src="{{ showPhoto($item->photo,$item->title) }}" alt="">
                                </td>
                                <td data-label="{{ __('Title') }}">
                                    {{ $item->title }}
                                </td>
                                <td data-label="{{ __('Is Banner') }}">
                                    @if ($item->is_banner == 1)
                                    <span class="badge badge-success">@lang('Yes')</span>
                                    @else
                                    <div class="btn-group mb-2">
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if ($item->is_banner == 1)
                                        @lang('Yes')
                                        @else
                                            @lang('No')
                                        @endif
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{route('seller.slider.status',[$item->id,1])}}">Yes</a>
                                        </div>
                                      </div>
                                    @endif
                                    
                                </td>

                                

                                <td data-label="{{ __('Action') }}">
                                    <a href="{{ route('seller.slider.edit', $item->id) }}"
                                        class="btn btn-primary  btn-sm edit mb-1" data-toggle="tooltip"
                                        title="@lang('Edit')"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger  btn-sm remove mb-1"
                                        data-route="{{ route('seller.slider.destroy', $item) }}" data-toggle="tooltip"
                                        title="@lang('Delete')"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                            </tr>
                        @endforelse

                    </table>
                </div>
            </div>
        </div>
        <!-- DataTable with Hover -->

    </div>
    <!--Row-->



    <!-- Modal -->
    <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="mt-3">@lang('Are you sure to remove?')</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-danger">@lang('Confirm')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict';
        $('.remove').on('click', function() {
            var route = $(this).data('route')
            $('#del').find('form').attr('action', route)
            $('#del').modal('show')
        })
    </script>
@endpush
