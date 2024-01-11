@extends('admin.layouts.master')

@section('content')
@php
use App\Models\User;
    $user = User::where('id', Auth::user()->id)->first();
@endphp
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include('admin.partials.sidebar')
        @include('admin.partials.topnav')

        <div class="body-wrapper">
            <div class="bodywrapper__inner">

                @include('admin.partials.breadcrumb')

                @yield('panel')


            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>
    {{-- <footer>
        <!-- Copyright -->
        <div class="text-center">
            <a class="mt-5 mb-3 text-muted" style="font-size:17px" href="https://3xplay.co" target="_blank">© 2023 3XPLAY</a>
        </div>
        <!-- Copyright -->
      </footer> --}}
      



@endsection
