@extends('layouts.seller')
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Request Domain')</h1>
        </div>
    </section>
@endsection
@section('title')
    @lang('Request Domain')
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
                            <th>@lang('Current Domain')</th>
                            <th>@lang('Domain Type')</th>
                            <th>@lang('Request Domain')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Created at')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        <tbody>
                            @forelse ($request_domains as $item)
                                <tr>
                                    <td>{{ getUser('domain') }}</td>
                                    <td>
                                        {{ $item->domain }}
                                    </td>
                                    <td>
                                        @if ($item->domain_type == 'Sub_domain')
                                            <span class="badge badge-dark">@lang('Subdomain')</span>
                                        @else
                                            <span class="badge badge-dark">@lang('Custom')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <span class="badge badge-warning">@lang('Pending')</span>
                                        @elseif($item->status == 1)
                                            <span class="badge badge-success">@lang('Approved')</span>
                                        @elseif($item->status == 2)
                                            <span class="badge badge-danger">@lang('Rejected')</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ dateFormat($item->created_at) }}
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a href="javascript:void()" class="btn btn-primary btn-sm edit mb-1"
                                                data-route="{{ route('seller.domain.request.update', $item->id) }}"
                                                data-item="{{ $item }}" data-toggle="tooltip"
                                                title="@lang('Edit')"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if ($item->status != 1)
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm remove mb-1"
                                                data-id="{{ $item->id }}" data-toggle="tooltip"
                                                title="@lang('Remove')"><i class="fas fa-trash"></i></a>
                                        @else
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm mb-1"
                                                data-toggle="tooltip" title="@lang('Approved')"><i
                                                    class="fas fa-check"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">@lang('No Data Available')</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('seller.domain.request.send') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Send Domain Request')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Domain Type *</label>
                            <select name="domain_type" class="form-control" id="domain_type">
                                <option value="" selected disabled>@lang('Select One')</option>
                                <option value="Sub_domain">@lang('Sub Domain')</option>
                                <option value="Custom_domain">@lang('Custom Domain')</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Domain Name *</label>
                            <input class="form-control" name="domain" type="text" placeholder="example.com"
                                value="">
                            <code class="form-text text_type">Enter your custom domain name. For example :
                                (example.com)</code>
                        </div>

                        <div class="form-group">
                            <label>Message <small>(optional)</small></label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <div class="form-group d-none" id="custom_domain_information">
                            <label>Configure your DNS records</label>
                            <br>
                            <code class="my-2">You'll need to setup a DNS record to point to your store on our server. DNS
                                records can be setup through your domain registrars control panel. Since every registrar has
                                a different setup, contact them for assistance if you're unsure.</code>
                            <table class="table table-dark text-white-50">
                                <thead class="ta table-light">
                                    <tr>
                                        <th>Type</th>
                                        <th>Record</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>&nbsp;</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CNAME</td>
                                        <td>www</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="form-text text-muted">
                                <code>DNS changes may take up to 24-72 hours to take effect, although it's normally a lot
                                    faster than that. You will receive a reply when your custom domain has been activated.
                                    Please allow 1-2 business days for this process to complete.</code>
                            </small>
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
                <form action="{{ route('seller.domain.request.send') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">@lang('Send Domain Request')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Domain Type *</label>
                                <select name="domain_type" class="form-control" id="domain_type">
                                    <option value="" selected disabled>Select One</option>
                                    <option value="Sub_domain">Sub Domain</option>
                                    <option value="Custom_domain">Custom Domain</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Domain Name *</label>
                                <input class="form-control" name="domain" type="text" placeholder="example.com"
                                    value="">
                                <code class="form-text text_type">Enter your custom domain name. For example :
                                    (example.com)</code>
                            </div>

                            <div class="form-group">
                                <label>Message <small>(optional)</small></label>
                                <textarea class="form-control" name="message" rows="3"></textarea>
                            </div>
                            <div class="form-group d-none" id="custom_domain_information">
                                <label>Configure your DNS records</label>
                                <br>
                                <code class="my-2">You'll need to setup a DNS record to point to your store on our
                                    server. DNS
                                    records can be setup through your domain registrars control panel. Since every registrar
                                    has
                                    a different setup, contact them for assistance if you're unsure.</code>
                                <table class="table table-dark text-white-50">
                                    <thead class="ta table-light">
                                        <tr>
                                            <th>Type</th>
                                            <th>Record</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A</td>
                                            <td>&nbsp;</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CNAME</td>
                                            <td>www</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <small class="form-text text-muted">
                                    <code>DNS changes may take up to 24-72 hours to take effect, although it's normally a
                                        lot
                                        faster than that. You will receive a reply when your custom domain has been
                                        activated.
                                        Please allow 1-2 business days for this process to complete.</code>
                                </small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                        </div>
                    </div>
                </form>
            </form>
        </div>
    </div>


    <div class="modal fade" id="removeMod" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{ route('seller.domain.request.destroy') }}" method="POST">
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
            $('#edit').find('select[name=domain_type]').val(data.domain_type)
            $('#edit').find('input[name=domain]').val(data.domain)
            $('#edit').find('textarea[name=message]').val(data.message)
            $('#edit').find('form').attr('action', $(this).data('route'))
            $('#edit').modal('show')
        })

        $(document).on('change', '#domain_type', function() {
            let type = $(this).val();
            if (type == 'Custom_domain') {
                $('#custom_domain_information').removeClass('d-none');
                $('input[name="domain"]').val('');
                $('.text_type').text('Enter your custom domain name. For example : (example.com)')
            } else {
                $('#custom_domain_information').addClass('d-none');
                $('input[name="domain"]').val('');
                $('.text_type').text('Enter your sub domain name. For example : (example.{{ env('MAIN_DOMAIN') }})')
            }
        })

        $('.remove').on('click', function() {
            $('#removeMod').find('input[name=id]').val($(this).data('id'))
            $('#removeMod').modal('show')
        })
    </script>
@endpush
