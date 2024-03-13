<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <title>{{ $page_title ? get_setting('appname') . ': ' . strip_tags($page_title) : 'Admin Area' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name='generator'
        content='CRUDBooster {{ \crocodicstudio\crudbooster\commands\CrudboosterVersionCommand::$version }}' />
    <meta name='robots' content='noindex,nofollow' />
    <link rel="shortcut icon"
        href="{{ CRUDBooster::getSetting('favicon') ? asset(CRUDBooster::getSetting('favicon')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('crudbooster::head_template')
</head>

<body
    class=" @php echo (Session::get('theme_color'))?:'skin-blue'; echo ' '; echo config('crudbooster.ADMIN_LAYOUT'); @endphp  sidebar-mini sidebar-collapse">

    <div id='app' class="wrapper">

        <!-- Header -->
        @include('crudbooster::header')

        <!-- Sidebar -->
        @if (in_array(App::getLocale(), ['ar', 'fa']))
            @include('crudbooster::sidebar-rtl')
        @elseif (in_array(App::getLocale(), ['en', 'fr']))
            @include('crudbooster::sidebar')
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content-header">

                <?php
                $module = CRUDBooster::getCurrentModule();
               // dd(g('return_url'));
                ?>
                @if ($module)
                    @if (g('return_url'))
                        @if (in_array(App::getLocale(), ['ar', 'fa']))
                            <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                <div class="hex-background" style="width: 30.64px;height: 36px;  background: #ecf0f5;">
                                    <div class="overlayhex">
                                        <a class="iconhex spin-icon" href='{{ g('return_url') }}' id='btn_show_data'
                                            title="{{ cbLang('form_back_to_list', ['module' => CRUDBooster::getCurrentModule()->name_ar]) }}">
                                            <span class="spin-icon">
                                                <i class="fa-solid fa-angles-{{ cbLang('left') }} fa-fade"
                                                    style="color: #e01b24;"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                <div class="hex-background" style="width: 30.64px;height: 36px;  background: #ecf0f5;">
                                    <div class="overlayhex">
                                        <a class="iconhex spin-icon" href='{{ g('return_url') }}' id='btn_show_data'
                                            title=" {{ cbLang('form_back_to_list', ['module' => CRUDBooster::getCurrentModule()->name]) }}">
                                            <span class="spin-icon">
                                                <i class="fa-solid fa-angles-{{ cbLang('left') }} fa-fade"
                                                    style="color: #e01b24;"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <!--Now you can define $page_icon alongside $page_tite for custom forms to follow CRUDBooster theme style -->
                    <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                        <div class="hex-background" style="width: 30.64px;height: 36px;  background: #ecf0f5;">
                            <div class="overlayhex">
                                <a class="iconhex spin-icon" href='#'
                                    title="{{ cbLang('form_back_to_list', ['module' => CRUDBooster::getCurrentModule()->name_ar]) }}">
                                    <span class="spin-icon">
                                        <i class='{!! $page_icon ?: $module->icon !!}'></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    &nbsp; <h4 style="display:inline-block; position: absolute; top:28%;">
                        @if (in_array(App::getLocale(), ['ar', 'fa']))
                            {{ $module->name_ar }} &nbsp;&nbsp;
                        @else
                            {{ $module->name }} &nbsp;&nbsp;
                        @endif

                        @if (empty($index_button))
                            @foreach ($index_button as $ib)
                                <a href='{{ $ib['url'] }}' id='{{ str_slug($ib['label']) }}'
                                    class='btn {{ $ib['color'] ? 'btn-' . $ib['color'] : 'btn-primary' }} btn-sm'
                                    @if ($ib['onClick']) onClick='return {{ $ib['onClick'] }}' @endif
                                    @if ($ib['onMouseOver']) onMouseOver='return {{ $ib['onMouseOver'] }}' @endif
                                    @if ($ib['onMouseOut']) onMouseOut='return {{ $ib['onMouseOut'] }}' @endif
                                    @if ($ib['onKeyDown']) onKeyDown='return {{ $ib['onKeyDown'] }}' @endif
                                    @if ($ib['onLoad']) onLoad='return {{ $ib['onLoad'] }}' @endif>
                                    <i class='{{ $ib['icon'] }}'></i> {{ $ib['label'] }}
                                </a>
                            @endforeach
                        @endif
                        <!-- END BUTTON -->
                    </h4>

                    <ol class="breadcrumb">
                        <li><a href="{{ CRUDBooster::adminPath() }}"><i class="fa fa-dashboard"></i>
                                {{ cbLang('home') }}</a></li>
                        <li class="active">
                            @if (in_array(App::getLocale(), ['ar', 'fa']))
                                {{ $module->name_ar }} &nbsp;&nbsp;
                            @else
                                {{ $module->name }} &nbsp;&nbsp;
                            @endif

                        </li>
                    </ol>
                @else
                    <h1>{{ Session::get('appname') }}
                        <small> {{ cbLang('text_dashboard') }} </small>
                    </h1>
                @endif
            </section>

            <!-- Main content -->
            <section id='content_section' class="content">

                @if (@$alerts)
                    @foreach (@$alerts as $alert)
                        <div class='callout callout-{{ $alert['type'] }}'>
                            {!! $alert['message'] !!}
                        </div>
                    @endforeach
                @endif

                @if (Session::get('message') != '')
                    <script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
                    <script src="{{ asset('vendor/crudbooster/assets/js/retronotify.js') }}"></script>

                    <script type="text/javascript">
                        var msgikon = colortype = '';
                        var msgtype = "{{ Session::get('message_type') }}";
                        if (msgtype == 'success') {
                            colortype = 'green';
                            msgikon = 'fa-square-check';
                        } else if (msgtype == 'danger') {
                            colortype = 'red';
                            msgikon = 'fa-square-xmark';
                        } else if (msgtype == 'warning') {
                            colortype = 'yellow';
                            msgikon = 'fa-triangle-exclamation';
                        }
                        var locale = '{{ config('app.locale') }}';
                        var showin = 'slideRightBottom';
                        if (locale == 'ar')
                            showin = 'slideLeftBottom';


                        new RetroNotify({
                            style: colortype,
                            animate: showin,
                            contentClose: '×',
                            contentHeader: '<i class="fa-solid ' + msgikon + '" style="color: #f8e45c;"></i> Message',
                            contentText: "<strong>{!! Session::get('message') !!}</strong>",
                            closeDelay: 2500
                        });
                    </script>
                    <!-- <div class='alert alert-{{ Session::get('message_type') }}'>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> {{ cbLang('alert_' . Session::get('message_type')) }}</h4>
                        {!! Session::get('message') !!}
                    </div> -->
                @endif

                <!-- Your Page Content Here -->
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Footer -->
        @include('crudbooster::footer')

    </div><!-- ./wrapper -->

    @include('crudbooster::admin_template_plugins')

    <!-- load js -->
    @if ($load_js)
        @foreach ($load_js as $js)
            <script type="text/javascript" src="{{ $js }}"></script>
        @endforeach
    @endif
    <script type="text/javascript">
        var site_url = "{{ url('/') }}";
        @if ($script_js)
            {!! $script_js !!}
        @endif
    </script>

    @stack('bottom')

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>

</html>
