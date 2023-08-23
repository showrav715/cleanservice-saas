@extends('layouts.admin')

@section('title')
    @lang('Currency')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Currency')</h1>
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
                            <th>@lang('Code')</th>
                            <th>@lang('Symbol')</th>
                            <th>@lang('Value')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Default')</th>
                            <th class="text-right">@lang('Action')</th>
                        </tr>
                        @forelse ($currencies as $currency)
                            <tr>
                                <td data-label="@lang('Code')">
                                    {{ $currency->code }}
                                </td>
                                <td data-label="@lang('Expired Date')">
                                    {{ $currency->symbol }}
                                </td>
                                <td data-label="@lang('Percentage(%)')">
                                    {{ $currency->value }}
                                </td>

                                <td data-label="@lang('Status')">
                                    @if ($currency->status == 1)
                                        <span class="badge badge-success"> @lang('Active') </span>
                                    @else
                                        <span class="badge badge-danger"> @lang('Deactive') </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($currency->default == 1)
                                        <span class="badge badge-success"> @lang('Default') </span>
                                    @else
                                        <div class="btn-group mb-2">
                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @lang('Set Default')
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.currency.default', $currency->id) }}">@lang('Set Default')</a>
                                            </div>
                                        </div>
                                    @endif
                                </td>

                                <td data-label="@lang('Action')" class="text-right">
                                    <a href="javascript:void()" class="btn btn-primary btn-sm edit mb-1"
                                        data-route="{{ route('admin.currency.update', $currency->id) }}"
                                        data-item="{{ $currency }}" data-toggle="tooltip" title="@lang('Edit')"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm remove mb-1"
                                        data-id="{{ $currency->id }}" data-toggle="tooltip" title="@lang('Remove')">
                                        <i class="fas fa-trash"></i></a>
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

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.currency.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Add new coupon')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Code')</label>
                            <input class="form-control" type="text" name="code">
                        </div>
                        <div class="form-group">
                            <label>@lang('Symbol')</label>
                            <input class="form-control" type="text" name="symbol">
                        </div>
                        <div class="form-group">
                            <label>@lang('Value')</label>
                            <input class="form-control" type="number" step="any" name="value">
                        </div>
                        <div class="form-group">
                            <label>@lang('Status')</label>
                            <select name="status" class="form-control">
                                <option value="1">@lang('Active')</option>
                                <option value="0">@lang('Inactive')</option>
                            </select>
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
                        <h5 class="modal-title">@lang('Edit Currency')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Code')</label>
                            <input class="form-control" type="text" name="code">
                        </div>
                        <div class="form-group">
                            <label>@lang('Symbol')</label>
                            <input class="form-control" type="text" name="symbol">
                        </div>
                        <div class="form-group">
                            <label>@lang('Value')</label>
                            <input class="form-control" type="number" step="any" name="value">
                        </div>
                        <div class="form-group">
                            <label>@lang('Status')</label>
                            <select name="status" class="form-control">
                                <option value="1">@lang('Active')</option>
                                <option value="0">@lang('Inactive')</option>
                            </select>
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

    <div class="modal fade" id="removeMod" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.currency.delete') }}" method="POST">
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
        $('.edit').on('click', function() {
            var data = $(this).data('item')

            $('#edit').find('input[name=code]').val(data.code)
            $('#edit').find('input[name=symbol]').val(data.symbol)
            $('#edit').find('input[name=value]').val(data.value)
            $('#edit').find('select[name=status]').val(data.status)
            $('#edit').find('form').attr('action', $(this).data('route'))
            $('#edit').modal('show')
        })
        $('.remove').on('click', function() {
            $('#removeMod').find('input[name=id]').val($(this).data('id'))
            $('#removeMod').modal('show')
        })
    </script>
@endpush
