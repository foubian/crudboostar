<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Jihaty-Login Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name='generator' content='CRUDBooster {{ \crocodicstudio\crudbooster\commands\CrudboosterVersionCommand::$version }}' />
    <meta name='robots' content='noindex,nofollow' />
    <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon') ? asset(CRUDBooster::getSetting('favicon')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('crudbooster::head_template_login')
</head>

<style type="text/css">
    .login-page,
    .register-page {
        background: {{ CRUDBooster::getSetting('login_background_color') ?: '#dddddd' }} url('{{ CRUDBooster::getSetting('login_background_image') ? asset(CRUDBooster::getSetting('login_background_image')) : asset('vendor/crudbooster/assets/bg_blur3.jpg') }}');
        color: {{ CRUDBooster::getSetting('login_font_color') ?: '#ffffff' }} !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .login-box,
    .register-box {
        margin: 2% auto;
    }

    .login-box-body {
        box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.8);
        background: rgba(255, 255, 255, 0.9);
        color: {{ CRUDBooster::getSetting('login_font_color') ?: '#666666' }} !important;
    }

    html,
    body {
        overflow: hidden;
    }
</style>

<body class="login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">
                <img title='{!! Session::get('appname') == 'CRUDBooster' ? '<b>CRUD</b>Booster' : CRUDBooster::getSetting('appname') !!}' src='{{ CRUDBooster::getSetting('logo') ? asset(CRUDBooster::getSetting('logo')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
                    style='max-width: 100%;max-height:170px' />
            </a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">

            @if (Session::get('message') != '')
                <div class='alert alert-warning'>
                    {{ Session::get('message') }}
                </div>
            @endif

            <p class='login-box-msg'>{{ cbLang('login_message') }}</p>
            <form autocomplete='off' action="{{ route('postLogin') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                @if (!empty(config('services.google')))
                    <div style="margin-bottom:10px" class='row'>
                        <div class='col-xs-12'>

                            <a href='{{ route('redirect', 'google') }}' class="btn btn-primary btn-block btn-flat"><i class='fa fa-google'></i>
                                Google Login</a>

                            <hr>
                        </div>
                    </div>
                @endif

                <div class="form-group has-feedback">
                    <input autocomplete='off' type="text" class="form-control" name='email' required placeholder="Email" />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input autocomplete='off' type="password" class="form-control" name='password' required placeholder="Password" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div style="margin-bottom:10px" class='row'>
                    <div class='col-xs-12'>
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class='fa fa-lock'></i> {{ cbLang('button_sign_in') }}</button>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-xs-12' align="center">
                        <p style="padding:10px 0px 10px 0px">{{ cbLang('text_forgot_password') }} <a href='{{ route('getForgot') }}'>{{ cbLang('click_here') }}</a></p>
                    </div>
                </div>
            </form>

            <br />
            <!--a href="#">I forgot my password</a-->

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte2418/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.4.1 JS -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte2418/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>

</html>
