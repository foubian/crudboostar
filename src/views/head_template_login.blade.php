<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<!-- Font Awesome 6 Icons -->
<link href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/font-awesome6/css/all.min.css') }}" rel="stylesheet" />
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
@if (in_array(App::getLocale(), ['ar', 'fa']))
    <!-- RTL MODE -->
    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/rtl/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/rtl/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/rtl/AdminLTE-rtl2.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/rtl/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/style.css') }}">
@else
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css') }}">
@endif
<!-- AdminLTE Skins. -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css') }}">
<!-- HEXAGON BUTTON. -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/crudbooster/assets/css/hexagons.min.css') }}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/morris.js/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<!-- summernote - text editor -->
<link href="{{ asset('vendor/crudbooster/assets/adminlte/plugins/summernote/summernote.css') }}" rel="stylesheet">

<!-- Sweetalert -->
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert2.min.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- Google Font -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');
</style>
@if (in_array(App::getLocale(), ['ar', 'fa']))
    <style>
        body {
            font-family: 'Almarai', sans-serif;
            font-size: 16px;
        }
    </style>
@else
    <style>
        body {
            font-family: 'Aldrich', sans-serif;
            font-size: 16px;
        }
    </style>
@endif


<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets//css/retronotify.css') }}">

<!-- Main Css -->
<link rel='stylesheet' href='{{ asset('vendor/crudbooster/assets/css/main.css') }}' />

@stack('head')
