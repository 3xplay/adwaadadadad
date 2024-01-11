@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30 justify-content-center">
        <div class="col-xl-4 col-md-6 mb-30">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('Withdraw Via') {{ $withdraw->User->bank }}</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Transaction Date')
                            <span class="fw-bold">{{ $withdraw->created_at }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Transaction Number')
                            <span class="fw-bold">{{ $withdraw->trans_id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="fw-bold">
                                <a
                                    href="{{ route('backoffice.members.detail', $withdraw->user_id) }}">{{ $withdraw->User->name }}</a>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Payment Method')
                            <span class="fw-bold">{{ $withdraw->User->bank }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Withdrawal Amount')
                            <span class="fw-bold">IDR @currency($withdraw->nominal)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Transfer Amount')
                            <span class="fw-bold">IDR @currency($withdraw->nominal)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                            @if ($withdraw->status == 1)
                                <span class="badge badge-pill bg--warning">@lang('Pending')</span>
                            @elseif ($withdraw->status == 2)
                                <span class="badge badge-pill bg--success">@lang('Approved')</span>
                            @else
                                <span class="badge badge-pill bg--danger">@lang('Rejected')</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if ($withdraw->status == 1)
            <div class="col-xl-8 col-md-6 mb-30">
                <div class="card b-radius--10 overflow-hidden box--shadow1">
                    <div class="card-body">
                        <h5 class="card-title mb-50 border-bottom pb-2">@lang('User Withdraw Information')</h5>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6>@lang('Bank Name')</h6>
                                    <p>{{ $withdraw->User->bank }}</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6>@lang('Account Name')</h6>
                                    <p>{{ $withdraw->User->nama_rek }}</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6>@lang('Account Number')</h6>
                                    <p>{{ $withdraw->User->no_rek }}</p>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <form id="approve" action="{{ route('backoffice.withdrawal.approve', $withdraw->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-outline--success btn-sm ms-1 approvebtn"
                                    data-original-title="@lang('Approve')"><i class="la la-check-double"></i>
                                    @lang('Approve')
                                </button>
                            </form>
                            <br>
                            <br>
                            <form action="{{ route('backoffice.withdrawal.reject', $withdraw->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="alasan" value="SILAHKAN HUBUNGI LIVECHAT!">
                                <button class="btn btn-outline--danger btn-sm ms-1 rejectbtn"
                                    data-original-title="@lang('Reject')"><i class="fas fa-ban"></i>
                                    @lang('Reject')
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('backoffice.withdrawal') }}" />
@endpush
