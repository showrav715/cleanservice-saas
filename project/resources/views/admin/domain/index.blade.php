@extends('layouts.admin')
@section('title')
    @lang('All Domain')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header  d-flex justify-content-between">
            <h1>@lang('All Domain')</h1>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i>
                @lang('Back')</a>
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
                                <th>@lang('Current Domain')</th>
                                <th>@lang('Request Domain')</th>
                                <th>@lang('Domain Type')</th>
                                <th>@lang('User Name')</th>
                                <th>@lang('User Email')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Created At')</th>
                                <th>@lang('Message')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($domain_requests as $domain)
                                <tr>
                                    <td data-label="@lang('Title')">
                                        {{ $domain->user->domain->domain }}
                                    </td>
                                    <td data-label="@lang('Title')">
                                        <strong>{{ $domain->domain }}</strong>
                                    </td>
                                    <td>
                                        @if ($domain->domain_type == 'Sub_domain')
                                            <span class="badge badge-dark">Subdomain</span>
                                        @else
                                            <span class="badge badge-dark">Custom</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.customer.view',$domain->user->id)}}">{{ $domain->user->name }}</a>
                                    </td>

                                    <td>
                                        <a href="{{route('admin.customer.view',$domain->user->id)}}">{{ $domain->user->email }}</a>
                                    </td>
                                   

                                    <td>
                                        @php
                                            if ($domain->status == 0) {
                                                $class = 'primary';
                                            } elseif ($domain->status == 1) {
                                                $class = 'success';
                                            } elseif ($domain->status == 2) {
                                                $class = 'danger';
                                            }
                                        @endphp

                                        <div class="btn-group mb-2">
                                           @if ($domain->status != 1)
                                           <button class="btn btn-{{ $class }} btn-sm dropdown-toggle"
                                           type="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="true">
                                           @if ($domain->status == 0)
                                               @lang('Pending')
                                           @elseif($domain->status == 1)
                                               @lang('Approved')
                                           @elseif($domain->status == 2)
                                               @lang('Rejected')
                                           @endif

                                       </button>
                                       <div class="dropdown-menu " x-placement="bottom-start">
                                           <a class="dropdown-item"
                                               href="{{ route('admin.domain.request.status', [$domain->id, 0]) }}">Pending</a>
                                           <a class="dropdown-item"
                                               href="{{ route('admin.domain.request.status', [$domain->id, 1]) }}">Approved</a>
                                           <a class="dropdown-item"
                                               href="{{ route('admin.domain.request.status', [$domain->id, 2]) }}">Rejected</a>
                                       </div>
                                            @else
                                            <span class="badge badge-success">@lang('Approved')</span>
                                           @endif
                                        </div>
                                    </td>

                                    <td>
                                        {{ dateFormat($domain->created_at) }}
                                    </td>
                                    <td>
                                        @if ($domain->message)
                                            {{ $domain->message }}
                                        @else
                                            <span class="badge badge-danger">@lang('No Message')</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict';

        $('.edit').on('click', function() {
            var data = $(this).data('item')
            $('#edit').find('input[name=domain]').val(data.domain)
            $('#edit').find('textarea[name=message]').val(data.message)
            $('#edit').find('form').attr('action', $(this).data('route'))
            $('#edit').modal('show')
        })
    </script>
@endpush
