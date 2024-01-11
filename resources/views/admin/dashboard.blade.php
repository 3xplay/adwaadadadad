@extends('admin.layouts.app')

@section('panel')
    <div class="row gy-4">
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--success has-link box--shadow2 overflow-hidden">
                <a class="item-link" href=""></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-users f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Members Total')</span>
                            <h2 class="text-white">{{ number_format($member->trans_all) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--primary has-link box--shadow2">
                <a class="item-link" href="{{ route('backoffice.members.list') }}"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-users f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Members Hari Ini')</span>
                            <h2 class="text-white">{{ number_format($member->trans_now) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--success has-link box--shadow2">
                <a class="item-link" href="{{ route('backoffice.deposit.approved') }}"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-user-check f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Members Deposit')</span>
                            <h2 class="text-white">{{ number_format($deposit->trans_count, 0) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card bg--success has-link box--shadow2">
                <a class="item-link" href="{{ route('backoffice.deposit.approved') }}"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="las la-money-bill-wave-alt f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Members Deposit Totals')</span>
                            <h2 class="text-white">{{ number_format($deposit->trans_all, 2) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="fas fa-hand-holding-usd overlay-icon text--success"></i>
                <div class="widget-two__icon b-radius--5 bg--success">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="widget-two__content">
                    <h3>IDR {{ number_format($deposit->trans_all, 2) }}</h3>
                    <p>@lang('Total Deposits')</p>
                </div>
                <a class="widget-two__btn border--success btn-outline--success border"
                    href="{{ route('backoffice.deposit.approved') }}">View All</a>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="fas fa-spinner overlay-icon text--warning"></i>
                <div class="widget-two__icon b-radius--5 bg--warning">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{ number_format($deposit->trans_pend, 0) }}</h3>
                    <p>@lang('Pending Deposits')</p>
                </div>
                <a class="widget-two__btn border--warning btn-outline--warning border"
                    href="{{ route('backoffice.deposit.list') }}">View All</a>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="fas fa-ban overlay-icon text--danger"></i>
                <div class="widget-two__icon b-radius--5 bg--danger">
                    <i class="fas fa-ban"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{ number_format($deposit->trans_reject, 0) }}</h3>
                    <p>@lang('Rejected Deposits')</p>
                </div>
                <a class="widget-two__btn border--danger btn-outline--danger border"
                    href="{{ route('backoffice.deposit.rejected') }}">View All</a>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="fas fa-dollar-sign overlay-icon text--success"></i>
                <div class="widget-two__icon b-radius--5 bg--success">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{ number_format($deposit->trans_done, 0) }}</h3>
                    <p>@lang('Approved Deposit')</p>
                </div>
                <a class="widget-two__btn border--success btn-outline--success border"
                    href="{{ route('backoffice.deposit.approved') }}">View All</a>
            </div>
        </div><!-- dashboard-w1 end -->
    </div><!-- row end-->

    <div class="row gy-4 mt-2">
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="las la-sync overlay-icon text--warning"></i>
                <div class="widget-two__icon b-radius--5 border--warning text--warning border">
                    <i class="las la-sync"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{ number_format($withdraw->trans_pend, 0) }}</h3>
                    <p>Pending Withdrawals</p>
                </div>
                <a class="widget-two__btn border--warning btn-outline--warning border"
                    href="{{ route('backoffice.withdrawal') }}">View All</a>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <i class="las la-times-circle overlay-icon text--danger"></i>
                <div class="widget-two__icon b-radius--5 border--danger text--danger border">
                    <i class="las la-times-circle"></i>
                </div>
                <div class="widget-two__content">
                    <h3>{{ number_format($withdraw->trans_reject, 0) }}</h3>
                    <p>Rejected Withdrawals</p>
                </div>
                <a class="widget-two__btn border--danger btn-outline--danger border"
                    href="{{ route('backoffice.withdrawal.rejected') }}">View All</a>
            </div>
        </div>
    </div><!-- row end-->
@endsection

@push('script')
    <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/chart.js.2.8.0.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            $('.copyBoard').on('click', function() {
                var copyText = document.getElementById("referralURL");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                iziToast.success({
                    message: "Copied: " + copyText.value,
                    position: "topRight"
                });
            });
        })(jQuery);
    </script>
@endpush
