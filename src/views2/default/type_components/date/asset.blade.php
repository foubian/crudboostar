@push('head')
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('bottom')

    @if (App::getLocale() != 'en')
        <script
            src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.' . App::getLocale() . '.js') }}"
            charset="UTF-8"></script>
    @endif
    <script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        var lang = '{{ App::getLocale() }}';
        $(function() {
            $('.input_date').datepicker({
                format: 'yyyy-mm-dd',
                @if (in_array(App::getLocale(), ['ar', 'fa']))
                    rtl: true,
                @endif
                language: lang
            });

            $('.open-datetimepicker').click(function() {
                $(this).next('.input_date').datepicker('show');
            });

        });
    </script>
@endpush
