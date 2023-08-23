@extends('layouts.admin')

@section('title')
   @lang('Attributes')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header">
        <h1>@lang('Attributes')</h1>
    </div>
</section>
@endsection

@section('content')


<div class="row">
   <div class="col-lg-12">
      <div class="card mb-4">
         <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
               <i class="fas fa-plus"></i> @lang('Add New')
             </button>

         </div>
         <div class="table-responsive p-3">
            <table class="table table-striped">
               <tr>
                   <th>@lang('Name')</th>
                   <th>@lang('Variations')</th>
                   <th class="text-right">@lang('Action')</th>
               </tr>
               @forelse ($attributes as $item)
                   <tr>
                        <td data-label="@lang('Name')">
                          {{$item->name}}
                        </td>
                        <td data-label="@lang('Action')" class="text-right">
                           <a href="{{route('admin.variation.index',$item->id)}}" class="btn btn-primary btn-sm mb-1"  title="@lang('Manage Child')"><i class="fas fa-cog"></i> @lang('Variation') </a>
                           <a href="javascript:void()" class="btn btn-primary approve btn-sm edit mb-1" data-route="{{route('admin.attribute.update',$item->id)}}" data-item="{{$item}}" data-toggle="tooltip" title="@lang('Edit')"><i class="fas fa-edit"></i></a>
                           <a href="javascript:void(0)" class="btn btn-danger btn-sm remove mb-1" data-id="{{$item->id}}"  data-toggle="tooltip" title="@lang('Remove')"><i class="fas fa-trash"></i></a>
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
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('admin.attribute.store')}}" method="POST">
         @csrf
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">@lang('Add new Attribute')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>@lang('Name')</label>
                  <input class="form-control" type="text" name="name">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
               <button type="submit" class="btn btn-primary">@lang('Submit')</button>
            </div>
         </div>
      </form>
   </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="" method="POST">
         @csrf
         @method('PUT')
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">@lang('Edit attribute')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>@lang('Name')</label>
                  <input class="form-control" type="text" name="name">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
               <button type="submit" class="btn btn-primary">@lang('Submit')</button>
            </div>
         </div>
      </form>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="removeMod" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <form action="{{route('admin.attribute.destroy')}}" method="POST">
         @method('DELETE')
         @csrf
         <input type="hidden" name="id">
         <div class="modal-content">
            <div class="modal-body">
               <h5>@lang('Are you sure to remove?')</h5>
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
       $('.edit').on('click',function () { 
          var data = $(this).data('item')
          $('#edit').find('input[name=name]').val(data.name)
          $('#edit').find('form').attr('action',$(this).data('route'))
          $('#edit').modal('show')
       })

       $('.remove').on('click',function () { 
         $('#removeMod').find('input[name=id]').val($(this).data('id'))
         $('#removeMod').modal('show')
       })
    </script>
@endpush

