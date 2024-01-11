@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30 justify-content-center">
        <div class="col-xl-4 col-md-6 mb-30">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('Deposit Via') {{ $deposit->DataBank->nama_bank }}</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Transaction Date')
                            <span class="fw-bold">{{ $deposit->created_at }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Transaction Number')
                            <span class="fw-bold">{{ $deposit->trans_id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="fw-bold">
                                <a
                                    href="{{ route('backoffice.members.detail', $deposit->user_id) }}">{{ $deposit->User->name }}</a>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Tujuan')
                            <span class="fw-bold">{{ $deposit->DataBank->nama_bank }} - {{ $deposit->DataBank->no_rek }} A/n {{ $deposit->DataBank->nama_penerima }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Nominal Deposit')
                            <span class="fw-bold">IDR @currency($deposit->nominal)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Nominal Bonus')
                            <span class="fw-bold">IDR @currency(($deposit->nominal * $deposit->bonus_persentase) / 100)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Pembayaran Dari')
                            <span class="fw-bold">{{ $deposit->rek_pengirim }} A/n {{ $deposit->User->nama_rek }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Ketrangan')
                            <span class="fw-bold">{{ $deposit->keterangan }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                            @if ($deposit->status == 1)
                            <span class="badge badge-pill bg--warning">@lang('Pending')</span>
                            @elseif ($deposit->status == 2)
                            <span class="badge badge-pill bg--success">@lang('Approved')</span>
                            @else
                            <span class="badge badge-pill bg--danger">@lang('Rejected')</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       @if ($deposit->status == 1)
            <div class="col-xl-8 col-md-6 mb-30">
                <div class="card b-radius--10 overflow-hidden box--shadow1">
                    <div class="card-body">
                        <h5 class="card-title mb-50 border-bottom pb-2">@lang('User Deposit Information')</h5>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                                    <a href="{{ 'https://files.leikesizichan.skin/ImageFile/invoice/' . $deposit->bukti_transfer }}"
                                                        target="_blank" class="me-1"><i class="fa fa-file"></i> @lang('Payment Invoice') </a>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <form id="approve" action="{{ route('backoffice.deposit.approve', $deposit->id) }}"
                                            method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-outline--success btn-sm ms-1 approvebtn" data-original-title="@lang('Approve')"><i
                                                    class="la la-check-double"></i>
                                                @lang('Approve')
                                            </button>
                                        </form>
                                        <br>
                                        <br>
                                        <form action="{{ route('backoffice.deposit.reject', $deposit->id) }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="alasan" value="SILAHKAN HUBUNGI LIVECHAT!">
                                            <button class="btn btn-outline--danger btn-sm ms-1 rejectbtn" data-original-title="@lang('Reject')"><i
                                                    class="fas fa-ban"></i>
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
    <x-back route="{{ route('backoffice.deposit') }}" />
@endpush