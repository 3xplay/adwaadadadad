<?php
use App\Models\Setting;

$setting = Setting::first();
?>
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3XPLAY Backoffice</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('style-lib')

    <link rel="stylesheet" href="{{ asset('assets/css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <script src="https://files.leikesizichan.skin/assets/jquery/sweet_alert2.min.js"></script>


    @stack('style')
</head>

<body>
    @yield('content')
    <script src="{{ asset('assets/global/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.slimscroll.min.js') }}"></script>


    @include('admin.partials.sweetallert')
    @stack('script-lib')

    <script src="{{ asset('assets/js/nicEdit.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/modules/sweetalert.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- LOAD NIC EDIT --}}
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);
    </script>

    @stack('script')


</body>

</html>
