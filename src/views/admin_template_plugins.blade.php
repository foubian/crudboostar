<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- jQuery 3 -->
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/morris.js/morris.min.js') }}"></script>
-->
<!-- Sparkline 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
-->
<!-- jvectormap  
<script src="{{ asset('vendor/crudbooster/assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
-->
<!-- jQuery Knob Chart 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
-->
<!-- daterangepicker 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
-->
<!-- datepicker 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
-->
<!-- Bootstrap WYSIHTML5
<script src="{{ asset('vendor/crudbooster/assets/adminlte/plugins/summernote/summernote.min.js') }}"></script>
 -->
<!-- SlimScroll 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
-->
<!-- FastClick -->
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/crudbooster/assets/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- ChartJS 
<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/chart.js/Chart.js') }}"></script>
-->
@if (in_array(App::getLocale(), ['ar', 'fa']))
    <!-- RTL MODE -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte/dist/js/rtl/app.min.js') }}"></script>
@endif

<!--SWEET ALERT-->
<script src="{{ asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/js/retronotify.js') }}"></script>
<script>
    var ASSET_URL = "{{ asset('/') }}";
    var APP_NAME = "{{ Session::get('appname') }}";
    var ADMIN_PATH = '{{ url(config('crudbooster.ADMIN_PATH')) }}';
    var NOTIFICATION_JSON = "{{ route('NotificationsControllerGetLatestJson') }}";
    var NOTIFICATION_INDEX = "{{ route('NotificationsControllerGetIndex') }}";

    var NOTIFICATION_YOU_HAVE = "{{ cbLang('notification_you_have') }}";
    var NOTIFICATION_NOTIFICATIONS = "{{ cbLang('notification_notification') }}";
    var NOTIFICATION_NEW = "{{ cbLang('notification_new') }}";

    function copyMe(span,label) {
        var copyText = document.getElementById(span);
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
        new RetroNotify({
        style: 'gray',
        animate:  'slideRightBottom',
        contentClose: '×',
        contentHeader: '<i class="fa-solid fa-bell" style="color: #c01c28;"></i> Message',
        contentText: "<strong>"+label+" coupié</strong>",
        closeDelay: 2500
    });

    }
</script>
<script src="{{ asset('vendor/crudbooster/assets/js/main.js') . '?r=' . time() }}"></script>
