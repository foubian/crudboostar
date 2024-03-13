@push('head')
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">


@if (App::getLocale()=='ar')
<style>
    .datepicker-dropdown {
        max-width: 300px;
    }

    .datepicker {
        float: right
    }

    .datepicker.dropdown-menu {
        right: auto
    }
</style>

@endif


@endpush
