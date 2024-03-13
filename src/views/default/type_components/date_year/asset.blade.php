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
@push('bottom')
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@if (App::getLocale() != 'en')

<script
    src="{{ asset ('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.'.App::getLocale().'.js') }}"
    charset="UTF-8"></script>
@endif
<script type="text/javascript">
    var lang = '{{ App::getLocale() }}';
        $(document).ready(function() {
            $("#datepickeryear").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        })
</script>
@endpush