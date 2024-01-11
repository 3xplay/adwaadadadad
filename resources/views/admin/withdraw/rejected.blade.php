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
                                    <th>@lang('Withdrawal Amount')</th>
                                    <th>@lang('Withdraw Methode')</th>
                                    <th>@lang('Note')</th>
                                    <th>@lang('Rejected By')</th>
                                    <th>@lang('Transaction Date')</th>
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
                                            <span class="fw-bold">{{ $item->rek_pengirim }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->keterangan }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->approved_by }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->created_at }}</span>
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
                                            <a href="{{ route('backoffice.withdrawal.detail', $item->id) }}"
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
