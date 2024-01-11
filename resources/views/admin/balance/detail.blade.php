@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-12">
            <div class="row gy-4">
                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--1">
                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="widget-two__content">
                            <h3 class="text-white">{{ $data_member->name }}</h3>
                            <p class="text-white">@lang('Username')</p>
                        </div>
                    </div>
                </div>
                <!-- dashboard-w1 end -->

                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <i class="las la-money-bill-wave-alt"></i>
                        </div>
                        <div class="widget-two__content">
                            <h3 class="text-white">IDR @currency($saldo->saldo)</h3>
                            <p class="text-white">@lang('Saldo Utama')</p>
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
                            <h3 class="text-white">IDR @currency($saldo->bonus)</h3>
                            <p class="text-white">@lang('Saldo Bonus')</p>
                        </div>
                    </div>
                </div>
                <!-- dashboard-w1 end -->

                <div class="col-xxl-3 col-sm-6">
                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--17">

                        <div class="widget-two__icon b-radius--5 bg--primary">
                            <a href="{{ route('backoffice.balance.bonus', $saldo->id) }}"><i class="text-white las la-plus-circle"></i></a>
                        </div>
                        <div class="widget-two__content">
                            <a href="{{ route('backoffice.balance.bonus', $saldo->id) }}">
                                <h3 class="text-white">Tambah Saldo Bonus</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dashboard-w1 end -->
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <div class="flex-fill">
                    <a href="{{ route('backoffice.balance.bonus', $saldo->id) }}"><button
                            class="btn btn--success btn--shadow w-100 btn-lg h-45">
                            <i class="las la-plus-circle"></i> @lang('Tambah Saldo Bonus')
                        </button></a>
                </div>
            </div>


            <div class="card mt-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Saldo Utama') <strong>{{ $data_member->name }}</strong></h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.balance.update', $saldo->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Type') </label>
                                    <div class="input-group ">
                                        <select class="form-control" name="type" required>
                                            <option disabled selected value="">Select Type
                                            </option>
                                            <option value="1"> Tambah Saldo </option>
                                            <option value="2"> Kurangi Saldo </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Nominal') </label>
                                    <div class="input-group ">
                                        <span class="input-group-text mobile-code">IDR</span>
                                        <input type="number" name="nominal" class="form-control"
                                            placeholder="@lang('Nominal')" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Tambah Saldo')
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
    <x-back route="{{ route('backoffice.balance') }}" />
@endpush