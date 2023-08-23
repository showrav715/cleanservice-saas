@extends('layouts.seller')

@section('title')
    @lang('Manage Team')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Manage Team')</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('seller.team.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> @lang('Add New')
                    </a>

                </div>
                <div class="table-responsive p-3">
                    <table class="table table-striped">
                        <tr>
                            <th>@lang('Photo')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Designation')</th>
                            <th>@lang('Email')</th>
                            <th class="text-right">@lang('Action')</th>
                        </tr>
                        @forelse ($teams as $item)
                       
                            <tr>
                                <td data-label="@lang('Photo')">
                                    <img src="{{ showPhoto($item->photo,$item->name) }}" alt="icon" class="img-fluid"
                                        style="width: 150px">
                                </td>
                                <td data-label="@lang('Name')">
                                    {{ $item->name }}
                                </td>
                                <td data-label="@lang('Designation')">
                                    {{ $item->designation }}
                                </td>
                                <td data-label="@lang('Email')">
                                    {{ $item->email }}
                                </td>
                              
                                <td data-label="@lang('Action')" class="text-right">
                                    <a href="{{ route('seller.team.edit', $item->id) }}"
                                        class="btn btn-primary approve btn-sm  mb-1" data-toggle="tooltip"
                                        title="@lang('Edit')"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm remove mb-1"
                                        data-id="{{ $item->id }}" data-toggle="tooltip" title="@lang('Remove')"><i
                                            class="fas fa-trash"></i></a>
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
    <div class="modal fade" id="removeMod" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{ route('seller.team.destroy') }}" method="POST">
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

        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "{{ __('Choose File') }}",
            label_selected: "{{ __('Update Image') }}",
            no_label: false,
            success_callback: null
        });
        $.uploadPreview({
            input_field: "#image-upload1",
            preview_box: "#image-preview1",
            label_field: "#image-label1",
            label_default: "{{ __('Choose File') }}",
            label_selected: "{{ __('Update Image') }}",
            no_label: false,
            success_callback: null
        });

        $('#add').on('shown.bs.modal', function(e) {
            $(document).off('focusin.modal');
        });
        $('#edit').on('shown.bs.modal', function(e) {
            $(document).off('focusin.modal');
        });

        $('.edit').on('click', function() {
            var data = $(this).data('item')
            $('#edit').find('input[name=icon]').val(data.icon)
            $('#edit').find('input[name=title]').val(data.title)
            $('#edit').find('textarea[name=text]').val(data.text)
            $('#edit').find('select[name=status]').val(data.status)
            $('#edit').find('form').attr('action', $(this).data('route'))
            let path = $(this).attr('data-path');
            $('#edit').find('#image-preview1').css('background-image', `url('${path}/${data.photo}')`);
            $('#edit').modal('show')
        })

        $('.remove').on('click', function() {
            $('#removeMod').find('input[name=id]').val($(this).data('id'))
            $('#removeMod').modal('show')
        })
    </script>
@endpush
