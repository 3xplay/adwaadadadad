@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('No')</th>
                                    <th>@lang('Username')</th>
                                    <th>@lang('Nominal Deposit')</th>
                                    <th>@lang('Nominal Bonus')</th>
                                    <th>@lang('Transaction By')</th>
                                    <th>@lang('Transaction Number')</th>
                                    <th>@lang('Approved / Rejected Date')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($deposit as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->User->name }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">@currency($item->nominal)</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">@currency(($item->nominal * $item->bonus_persentase) / 100)</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->approved_by }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->trans_id }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->approved_at }}</span>
                                        </td>

                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge--warning">@lang('Pending')</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge badge--success">@lang('Approved')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Rejected')</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('backoffice.deposit.detail', $item->id) }}"
                                                class="btn btn-sm btn-outline--primary ms-1">
                                                <i class="la la-desktop"></i> @lang('Details')
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">@lang('Data Not Found')</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                {{-- @if ($deposits->())
                    <div class="cardhasPages-footer py-4">
                        @php echo paginateLinks($deposits) @endphp
                    </div>
                @endif --}}
            </div><!-- card end -->
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <x-search-form placeholder="Username" />
@endpush
