@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <?php
            $saldo = isset($data_member->saldo[0]) ? $data_member->saldo[0]->saldo : 0;
            $bonus = isset($data_member->saldo[0]) ? $data_member->saldo[0]->bonus : 0;
        ?>
        <div class="col-12">
            <div class="row gy-4">
                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <i class="las la-money-bill-wave-alt"></i>
                        </div>
                        <div class="widget-two__content">
                            <h3 class="text-white">IDR {{ number_format($saldo + $bonus) }}</h3>
                            <p class="text-white">@lang('Balance')</p>
                        </div>
                    </div>
                </div>
                <!-- dashboard-w1 end -->


                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--primary">
                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <i class="las la-wallet"></i>
                        </div>
                        <div class="widget-two__content">
                            <h3 class="text-white"> </h3>
                            <p class="text-white">@lang('Deposits')</p>
                        </div>
                        <a href="{{ route('backoffice.deposit') }}?search={{ $data_member->name }}"
                            class="widget-two__btn">@lang('View All')</a>
                    </div>
                </div>
                <!-- dashboard-w1 end -->

                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--1">
                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="widget-two__content">
                            <h3 class="text-white"> </h3>
                            <p class="text-white">@lang('Total Deposit')</p>
                        </div>
                        <a href="{{ route('backoffice.deposit.approved') }}?search={{ $data_member->name }}"
                            class="widget-two__btn">@lang('View All')</a>
                    </div>
                </div>
                <!-- dashboard-w1 end -->

                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--17">
                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <i class="las la-exchange-alt"></i>
                        </div>
                        <div class="widget-two__content">
                            <h3 class="text-white"> </h3>
                            <p class="text-white">@lang('Transactions')</p>
                        </div>
                        <a href=" "
                            class="widget-two__btn">@lang('View All')</a>
                    </div>
                </div>
                <!-- dashboard-w1 end -->
            </div>


            <div class="card mt-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Information of') {{ $data_member->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.members.update', $data_member->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>@lang('Username')</label>
                                    <input class="form-control" type="text" name="nama" required
                                        value="{{ $data_member->name }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mobile Number') </label>
                                    <div class="input-group ">
                                        <span class="input-group-text mobile-code">+62</span>
                                        <input type="number" name="telp" value="{{ $data_member->telp }}"
                                            class="form-control checkUser" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Email') </label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ $data_member->email }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Change Password') </label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label>@lang('Bank Name')</label>
                                    <select name="bank" class="form-control">
                                         <option value="{{ $data_member->bank }}" readonly>{{ $data_member->bank }}
                                            </option>
                                        @foreach ($data_bank as $item)
                                            <option value="{{ $item->nama_bank }}" readonly>{{ $item->nama_bank }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label>@lang('Account Name') </label>
                                    <input class="form-control" type="text" name="nama_rek"
                                        value="{{ $data_member->nama_rek }}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label>@lang('Account No') </label>
                                    <input class="form-control" type="text" name="no_rek"
                                        value="{{ $data_member->no_rek }}" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                        
                            <div class="form-group  col-xl-4 col-md-6 col-12">
                                <label>@lang('Game Status')</label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                    data-bs-toggle="toggle" data-on="@lang('Verified')" data-on="@lang('Disable')"
                                    data-off="@lang('Enable')"
                                    name="game_mode" value="1"
                                    <?= $data_member->game_mode == 1 ? 'checked' : '' ?>>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('backoffice.members.list') }}" />
@endpush