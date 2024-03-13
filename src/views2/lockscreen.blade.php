<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>::LOCKSCREEN::</title>
    <meta name='generator' content='CRUDBooster' />
    <meta name='robots' content='noindex,nofollow' />
    <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon') ? asset(CRUDBooster::getSetting('favicon')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('crudbooster::head_template')
</head>

<style type="text/css">
    .lockscreen {
        background: {{ CRUDBooster::getSetting('login_background_color') ?: '#dddddd' }} url('{{ CRUDBooster::getSetting('login_background_image') ? asset(CRUDBooster::getSetting('login_background_image')) : asset('vendor/crudbooster/assets/bg_blur3.jpg') }}');
        color: {{ CRUDBooster::getSetting('login_font_color') ?: '#ffffff' }} !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>

<body class="lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="{{ url('/') }}">
                <img title='{!! $appname == 'CRUDBooster' ? '<b>CRUD</b>Booster' : $appname !!}' src='{{ CRUDBooster::getSetting('logo') ? asset(CRUDBooster::getSetting('logo')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
                    style='max-width: 100%;max-height:170px' />
            </a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">{{ Session::get('admin_name') }}</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{ Session::get('admin_photo') ?: asset('assets/adminlte/dist/img/user2-160x160.jpg') }}" alt="user image" />
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" method='post' action="{{ url(config('crudbooster.ADMIN_PATH') . '/unlock-screen') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="input-group">
                    <input type="password" class="form-control" required name='password' placeholder="password" />
                    <div class="input-group-btn">
                        <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form><!-- /.lockscreen credentials -->

        </div><!-- /.lockscreen-item -->
        <div class="text-center">
            {{ cbLang('text_enter_the_password') }}
        </div>
        <div class='text-center'>
            <a href="{{ route('getLogout') }}">{{ cbLang('text_or_sign_in') }}</a>
        </div>
        <div class='lockscreen-footer text-center'>
            Copyright &copy; {{ date('Y') }}<br>
            All rights reserved
        </div>
    </div><!-- /.center -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte2418/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.4.1 JS -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte2418/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>

</html>