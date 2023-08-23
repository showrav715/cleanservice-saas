@extends('layouts.seller')

@section('title')
    @lang('Manage Project')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Manage Project')</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('seller.project.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> @lang('Add New')
                    </a>

                </div>
                <div class="table-responsive p-3">
                    <table class="table table-striped">
                        <tr>
                            <th>@lang('Photo')</th>
                            <th>@lang('Category ')</th>
                            <th>@lang('Title')</th>
                            <th class="text-right">@lang('Action')</th>
                        </tr>
                        @forelse ($projects as $item)
                            <tr>
                                <td data-label="@lang('Photo')">
                                    <img src="{{ showPhoto($item->photo,$item->title) }}" alt="icon" class="img-fluid"
                                        style="width: 150px">
                                </td>
                                <td data-label="@lang('Name')">
                                    {{ $item->title }}
                                </td>
                                <td data-label="@lang('Designation')">
                                    {{ $item->category->name }}
                                </td>

                                <td data-label="@lang('Action')" class="text-right">
                                    <a href="{{ route('seller.project.edit', $item->id) }}"
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
            <form action="{{ route('seller.project.destroy') }}" method="POST">
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
        $('.remove').on('click', function() {
            $('#removeMod').find('input[name=id]').val($(this).data('id'))
            $('#removeMod').modal('show')
        })
    </script>
@endpush
