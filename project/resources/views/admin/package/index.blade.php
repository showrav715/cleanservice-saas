@extends('layouts.admin')

@section('title')
    @lang('Package')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Package')</h1>
            <a href="{{ route('admin.package.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> @lang('Create New')
            </a>
        </div>
    </section>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table table-striped">
                        <tr>
                            <th>@lang('Title')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Duration')</th>
                            <th>@lang('Featured')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        @forelse ($packages as $info)
                            <tr>

                                <td data-label="@lang('Title')">
                                    {{ $info->name }}
                                </td>
                                <td data-label="@lang('Price')">
                                    {{ adminShowAmount($info->price) }}
                                </td>
                                <td data-label="@lang('Duration')">
                                    {{ $info->days }} / @lang('Days')
                                </td>

                                <td data-label="@lang('Featured')">
                                    @if ($info->is_featured == 1)
                                        <span class="badge badge-success  badge-sm">Yes</span>
                                    @else
                                        <span class="badge badge-danger  badge-sm">No</span>
                                    @endif
                                </td>

                                <td data-label="@lang('Actions')">
                                    <a href="{{ route('admin.package.edit', $info) }}" class="btn btn-primary btn-sm mb-1"
                                        data-toggle="tooltip" title="@lang('Edit')"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm remove mb-1"
                                        data-id="{{ $info->id }}" data-toggle="tooltip" title="@lang('Remove')"><i
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
            <form action="{{ route('admin.package.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
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
