@extends('admin.layouts.app')

@section('pagetitle')
    {{ 'Member Transaction' }}
@endsection

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                                <tr>
                                <tr>
                                    <th>@lang('No')</th>
                                    <th>@lang('Username')</th>
                                    <th>@lang('Transaction Type')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Note')</th>
                                    <th>@lang('Transaction Date')</th>
                                    <th>@lang('Status')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksi as $item)
                                    <tr>
                                        <td data-label="@lang('No')">{{ $loop->iteration }}</td>
                                        <td data-label="@lang('Username')">{{ $item->User->name }}</td>
                                        <td data-label="@lang('Transaction Type')">
                                            @if ($item->type == 1)
                                                Deposit
                                            @else
                                                Withdrawal
                                            @endif
                                        </td>
                                        <td data-label="@lang('Amount')">
                                            @if ($item->status == 1)
                                                @currency($item->nominal)
                                            @elseif ($item->status == 2)
                                                @currency($item->nominal)
                                            @else
                                                <strike>@currency($item->nominal)</strike>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Note')">
                                            @if ($item->type == 1)
                                                {{ $item->Databank->nama_bank ?? '' }} <span
                                                    style="color: red">{{ $item->alasan }}</span>
                                            @else
                                                {{ $item->keterangan ?? '' }}
                                            @endif
                                        </td>
                                        <td data-label="@lang('Transaction Date')">{{ $item->created_at }}</td>
                                        <td data-label="@lang('Status')">
                                            @if ($item->status == 1)
                                                <span class="badge badge--warning">@lang('Pending')</span>
                                            @elseif ($item-> status == 2)
                                                <span class="badge badge--success">@lang('Success')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Rejected')</span>    
                                            @endif
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">Data Not Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>

    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict"
            $(document).on('click', '.activateBtn', function() {
                var modal = $('#activateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=code]').val($(this).data('code'));
            });

            $(document).on('click', '.deactivateBtn', function() {
                var modal = $('#deactivateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=code]').val($(this).data('code'));
            });
        })(jQuery);
    </script>
@endpush
