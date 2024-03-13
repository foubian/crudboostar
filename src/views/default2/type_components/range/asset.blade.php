
@push('head') 
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@endpush
@push('bottom') 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

@if (App::getLocale() != 'en')
    <script src="{{ asset('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/locales.min.js') }}" charset="UTF-8"></script>

    @endif
<script type="text/javascript">
    $('.input-daterange')
        .datepicker({
            orientation: "auto",
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
            startView: "years",
            minViewDate: 0,
            maxViewDate: 0,
            weekStart: 1,
        });

    $('#ArrivalDate').each(function() {
        $(this).on('changeDate', function(e) {
            CheckIn = $('#DepartDate').datepicker('getDate');
            // alert(CheckIn);
            //  CheckOut = moment(CheckIn).add(1, 'day').toDate();
            CheckOut = moment(CheckIn, "YYYY-MM-DD").toDate();
            $('#DepartDate').datepicker('update', CheckOut).focus();
        });
    });

    $('#DepartDate').each(function() {
        $(this).on('changeDate', function(e) {
            CheckIn = $('#ArrivalDate').datepicker('getDate');
            Checkout = $('#ArrivalDate').val();
            //CheckOut = moment(CheckIn, "YYYY-MM-DD");
            //alert(CheckOut);
            $("#daterange").val($('#ArrivalDate').val() + ';' + $('#DepartDate').val());

        });
    });
</script>
@endpush
