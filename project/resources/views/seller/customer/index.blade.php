@extends('layouts.admin')

@section('title')
    @lang('Customers')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Customers')</h1>
            <a href="{{ route('admin.customer.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                @lang('Create New') </a>
        </div>
    </section>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Domain')</th>
                                <th>@lang('Package/Plan')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td data-label="@lang('Title')">
                                    {{ $user->name }}
                                </td>
                                <td data-label="@lang('URL Slug')">
                                    {{ $user->email }}
                                </td>
                                @php
                                if (request()->secure()) {
                                    $customer_domain = 'https://' . $user->domain->domain;
                                } else {
                                    $customer_domain = 'http://' . $user->domain->domain;
                                }
                            @endphp
                                <td data-label="@lang('Details')">
                                    <a href="{{ $customer_domain ?? '' }}"
                                        target="_blank">{{ $user->domain->domain ?? '' }}</a>
                                </td>
                                <td data-label="@lang('Package')">
                                    {{ $user->user_package->package_info->name ?? '' }}
                                </td>
                                <td>
                                    @if ($user->status == 1)
                                        <span class="badge badge-success">{{ __('Active') }}</span>
                                    @elseif($user->status == 0)
                                        <span class="badge badge-danger">{{ __('Trash') }}</span>
                                    @elseif($user->status == 2)
                                        <span class="badge badge-warning">{{ __('Suspended') }}</span>
                                    @elseif($user->status == 3)
                                        <span class="badge badge-primary">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Actions')">
                                    <div class="dropdown d-inline ">
                                        <button class="btn btn-primary dropdown-toggle"
                                            type="button"id="dropdownMenuButton2" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item has-icon edit" href="javascript:;"
                                                data-route="{{ route('admin.customer.update', $user->id) }}"
                                                data-item="{{ $user }}" data-toggle="tooltip"
                                                title="@lang('Edit')"><i class="fas fa-user-edit"></i>
                                                {{ __('Edit') }}</a>
                                            <a class="dropdown-item has-icon sendMail" href="javascript:;"
                                                data-route="{{ route('admin.customer.send.mail', $user->id) }}"
                                                data-item="{{ $user }}" data-toggle="tooltip"
                                                title="@lang('Send Mail')"><i class="fas fa-envelope"></i>
                                                {{ __('Send Mail') }}</a>
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.customer.package.edit', $user->id) }}"><i
                                                    class="far fa-edit"></i>{{ __('Edit Package') }}</a>
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.customer.view', $user->id) }}"><i
                                                    class="far fa-eye"></i>{{ __('View') }}</a>
                                            <a class="dropdown-item has-icon remove"  data-id="{{ $user->id }}" data-toggle="tooltip"><i
                                                    class="fas fa-trash"></i>{{ __('Delete') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Edit Customer')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>@lang('Email')</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                        <div class="form-group">
                            <label>@lang('Password')</label>
                            <input class="form-control" type="text" name="password">
                        </div>
                        <div class="form-group">
                            <label>@lang('Status')</label>
                            <select name="status" class="form-control">
                                <option value="1">@lang('Active')</option>
                                <option value="2">@lang('Ban')</option>
                                <option value="0">@lang('Request')</option>
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

    <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Send Mail')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Customer Name')</label>
                            <input class="form-control" readonly type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>@lang('Customer Email')</label>
                            <input class="form-control" readonly type="text" name="email">
                        </div>
                        <div class="form-group">
                            <label>@lang('Subject')</label>
                            <input class="form-control" type="text" name="subject">
                        </div>
                        <div class="form-group">
                            <label>@lang('Subject')</label>
                            <textarea name="body" class="form-control" id="" cols="20" rows="7"></textarea>
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
            <form action="{{ route('admin.customer.destroy') }}" method="POST">
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
        $('.edit').on('click', function() {
            var data = $(this).data('item')
            $('#edit').find('input[name=name]').val(data.name)
            $('#edit').find('input[name=email]').val(data.email)
            $('#edit').find('select[name=status]').val(data.status)
            $('#edit').find('form').attr('action', $(this).data('route'))
            $('#edit').modal('show')
        })

        $('.sendMail').on('click', function() {
            var data = $(this).data('item')
            $('#sendMail').find('input[name=name]').val(data.name)
            $('#sendMail').find('input[name=email]').val(data.email)
            $('#sendMail').find('form').attr('action', $(this).data('route'))
            $('#sendMail').modal('show')
        })

        $('.remove').on('click', function(e) {
            e.preventDefault()
            $('#removeMod').find('input[name=id]').val($(this).data('id'))
            $('#removeMod').modal('show')
        })
    </script>
@endpush
