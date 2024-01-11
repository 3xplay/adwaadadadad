<?php

use Illuminate\Support\Facades\Auth;

$user_level = Auth::user()->level;
$is_developer = (int) $user_level === 2;
$is_admin = (int) $user_level <= 2;

?>
<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{ route('backoffice.dashboard') }}" class="sidebar__main-logo"><img
                    src="https://files.leikesizichan.skin/ImageFile/logo/6595b1db125b8_20240102_032536.png" alt="@lang('image')"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{ menuActive('backoffice.dashboard') }}">
                    <a href="{{ route('backoffice.dashboard') }}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('backoffice.deposit*', 3) }}">
                        <i class="menu-icon las la-file-invoice-dollar"></i>
                        <span class="menu-title">@lang('Deposits')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('backoffice.deposit*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item  {{ menuActive('backoffice.deposit.list') }}">
                                <a href="{{ route('backoffice.deposit.list') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Deposits')</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-menu-item {{ menuActive('backoffice.deposit.approved') }}">
                                <a href="{{ route('backoffice.deposit.approved') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Deposits')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('backoffice.deposit.rejected') }} ">
                                <a href="{{ route('backoffice.deposit.rejected') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Deposits')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('backoffice.deposit') }}">
                                <a href="{{ route('backoffice.deposit') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Deposits')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('backoffice.withdrawal*', 3) }}">
                        <i class="menu-icon la la-bank"></i>
                        <span class="menu-title">@lang('Withdrawals')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('backoffice.withdrawal*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('backoffice.withdrawal') }}">
                                <a href="{{ route('backoffice.withdrawal') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Withdrawals')</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-menu-item {{ menuActive('backoffice.withdrawal.approved') }}">
                                <a href="{{ route('backoffice.withdrawal.approved') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Withdrawals')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('backoffice.withdrawal.rejected') }}">
                                <a href="{{ route('backoffice.withdrawal.rejected') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Withdrawals')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('backoffice.withdrawal.list') }}">
                                <a href="{{ route('backoffice.withdrawal.list') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Withdrawals')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.balance*', 1) }}">
                    <a href="{{ route('backoffice.balance') }}" class="nav-link ">
                        <i class="menu-icon las la-wallet"></i>
                        <span class="menu-title">@lang('Pengaturan Saldo')</span>
                    </a>
                </li>

                
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{ menuActive('backoffice.members*', 3) }}">
                        <i class="menu-icon las la-users"></i>
                        <span class="menu-title">@lang('Member')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('backoffice.members*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('backoffice.members.list') }}">
                                <a href="{{ route('backoffice.members.list') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Member List')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('backoffice.members.login*', 1) }}">
                                <a href="{{ route('backoffice.members.login.history') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Login History')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <?php if ($is_developer) { ?>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('backoffice.admin*', 3) }}">
                            <i class="menu-icon las la-user-shield"></i>
                            <span class="menu-title">@lang('Admin')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('backoffice.admin*', 2) }}">
                            <ul>
                                <li class="sidebar-menu-item {{ menuActive('backoffice.admin.create') }}">
                                    <a href="{{ route('backoffice.admin.create') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Tambah Admin')</span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item {{ menuActive('backoffice.admin.list') }}">
                                    <a href="{{ route('backoffice.admin.list') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">@lang('Admin List')</span>
                                    </a>
                                </li>
    
                            </ul>
                        </div>
                    </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.gateway*', 1) }}">
                    <a href="{{ route('backoffice.gateway') }}" class="nav-link ">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Rekening Deposit')</span>
                    </a>
                </li>

                <li class="sidebar__menu-header">@lang('Settings')</li>
                <li class="sidebar-menu-item {{ menuActive('backoffice.website.setting', 1) }}">
                    <a href="{{ route('backoffice.website.setting') }}" class="nav-link ">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('Pengaturan Webite')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.website.setting.logo', 1) }}">
                    <a href="{{ route('backoffice.website.setting.logo') }}" class="nav-link ">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">@lang('Logo & Icon')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.website.extension', 1) }}">
                    <a href="{{ route('backoffice.website.extension') }}" class="nav-link ">
                        <i class="menu-icon las la-cogs"></i>
                        <span class="menu-title">@lang('Livechat & Sosmed')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.website.setting.seo', 1) }}">
                    <a href="{{ route('backoffice.website.setting.seo') }}" class="nav-link ">
                        <i class="menu-icon las la-globe"></i>
                        <span class="menu-title">@lang('Pengaturan SEO')</span>
                    </a>
                </li>

                <li class="sidebar__menu-header">@lang('Frontend Manager')</li>
                
                <li class="sidebar-menu-item {{ menuActive('backoffice.banners*', 1) }}">
                    <a href="{{ route('backoffice.banners') }}" class="nav-link ">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">@lang('Banner Slide')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.website.promotion*', 1) }}">
                    <a href="{{ route('backoffice.website.promotion') }}" class="nav-link ">
                        <i class="menu-icon las la-gift"></i>
                        <span class="menu-title">@lang('Promosi')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.website.depositPromotion*', 1) }}">
                    <a href="{{ route('backoffice.website.depositPromotion') }}" class="nav-link ">
                        <i class="menu-icon las la-pencil-ruler"></i>
                        <span class="menu-title">@lang('Promosi Deposit')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('backoffice.website.themes') }}">
                    <a href="{{ route('backoffice.website.themes') }}" class="nav-link ">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title">@lang('Ubah Thema')</span>
                    </a>
                </li>
                <?php } ?>

                <li class="sidebar-menu-item">
                    <a href="https://3xplay.co" target="_blank" class="nav-link ">
                        <i class="menu-icon la la-bug"></i>
                        <span class="menu-title">@lang('BUG Report')</span>
                    </a>
                </li>

            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary">3XPLAY</span>
                <span class="text--success">V3.1</span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
    <script>
        if ($('li').hasClass('active')) {
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            }, 500);
        }
    </script>
@endpush
