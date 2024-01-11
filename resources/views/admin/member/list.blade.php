@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('No')</th>
                                    <th>@lang('Username')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Nomor Telpon')</th>
                                    <th>@lang('Saldo')</th>
                                    <th>@lang('IP Register')</th>
                                    <th>@lang('Register Date')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_member as $item)
                                    <?php
                                    $saldo = isset($item->saldo[0]) ? $item->saldo[0]->saldo : 0;
                                    $bonus = isset($item->saldo[0]) ? $item->saldo[0]->bonus : 0;
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->name }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->email }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">+62 {{ $item->telp }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">IDR {{ number_format($saldo + $bonus) }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->ip_register }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->created_at }}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('backoffice.members.detail', $item->id) }}"
                                                class="btn btn-sm btn-outline--primary">
                                                <i class="las la-desktop"></i> @lang('Details')
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
                @if ($data_member->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($data_member) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection



@push('breadcrumb-plugins')
    <x-search-form placeholder="Username / Email" />
@endpush
