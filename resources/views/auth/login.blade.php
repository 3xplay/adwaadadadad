@extends('admin.layouts.master')
@section('content')
    <div class="login-main" style="background-image: url('{{ asset('assets/images/login.jpg') }}')">
        <div class="custom-container container">
            <div class="text-center">
                <img src="https://files.leikesizichan.skin/ImageFile/logo/6595b1db125b8_20240102_032536.png" alt="homepage" class="img-fluid m_logo" />
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                    <div class="login-area">
                        <div class="login-wrapper">
                            <div class="login-wrapper__top">
                                <p class="text-white">@lang('Backoffice')</p>
                            </div>
                            <div class="login-wrapper__body">
                                <form class="cmn-form mt-30 verify-gcaptcha login-form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" required="" placeholder="@lang('Username')">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="password" type="password" required="" placeholder="@lang('Password')">
                                    </div>
                                    <button class="btn cmn-btn w-100" type="submit">@lang('LOGIN')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
             <!-- Copyright -->
           <div class="text-center">
            <code class="mt-5 mb-3 text-muted" style="font-size:15px">© 2023 3XPLAY</code>
           </div>
         <!-- Copyright -->
        </div>
    </div>
@endsection

@push('style')
<style>
    .m_logo {
        min-width:150px;
        max-height:70px;
    }
</style>
@endpush