<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ CRUDBooster::getSetting('appname')  }}-Login Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name='generator'
        content='CRUDBooster {{ \crocodicstudio\crudbooster\commands\CrudboosterVersionCommand::$version }}' />
    <meta name='robots' content='noindex,nofollow' />
    <link rel="shortcut icon"
        href="{{ CRUDBooster::getSetting('favicon') ? asset(CRUDBooster::getSetting('favicon')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('crudbooster::head_template_login')
</head>

<style type="text/css">
    .form-container {
        background-color: #fff;
        font-size: 0;
        box-shadow: 0 0 25px -15px rgba(0, 0, 0, 0.3);
        height: 100%;
    }

    .form-container .left-content {
        background-color: #114780;
        width: 60%;
        height: 100%;
        padding: 66px 50px;
        display: inline-block;
        vertical-align: middle;
    }

    .main-row {
        margin-left: 0;
        margin-right: 0;
        height: 100%;
    }

    .form-container .left-content .title {
        color: LightSalmon;
        font-size: 20px;
        font-weight: 300;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin: 0 0 55px;
    }

    .form-container .left-content .sub-title {
        color: #fff;
        font-size: 40px;
        text-align: center;
        margin: 0 0 5px;
        font-weight: 300;
    }

    .form-container .right-content {
        text-align: center;
        width: 40%;
        height: 100%;
        padding: 30px 30px;
        display: inline-block;
        vertical-align: middle;

    }

    .form-container .right-content .form-title {
        color: #888;
        font-size: 30px;
        font-weight: 400;
        text-align: left;
        text-transform: uppercase;
        padding: 0 0 2px;
        margin: 0 0 10px;
        border-bottom: 2px solid #F9BC16;
    }

    .form-container .right-content .form-copyright {
        color: #888;
        font-size: 14px;
        position: absolute;
        width: 35%;
        bottom: 2%;
        text-align: left;
        border-top: 2px solid #259CD4;
    }

    .form-container .right-content .form-horizontal {
        color: #999;
        font-size: 14px;
        text-align: left;
        margin: 0 0 15px;
    }

    .form-container .form-horizontal .form-group {
        margin: 0 0 20px;
    }

    .form-container .form-horizontal .form-group:nth-of-type(2) {
        margin-bottom: 35px;
    }

    .form-container .form-horizontal .form-group label {
        font-weight: 500;
    }

    .form-container .form-horizontal .form-control {
        color: #888;
        background: #f9f9f9;
        font-weight: 400;
        letter-spacing: 1px;
        height: 40px;
        padding: 6px 12px;
        border-radius: 5px;
        border: none;
        box-shadow: none;
    }

    .form-container .form-horizontal .form-control:focus {
        box-shadow: 0 0 5px LightSalmon;
    }

    .form-container .form-horizontal .signin {
        color: #fff;
        background: #C75C16;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: 0.5px;
        text-transform: capitalize;
        width: 100%;
        padding: 9px 11px;
        margin: 0 0 20px;
        border-radius: 50px;
        transition: all 0.3s ease 0s;
    }

    .form-container .form-horizontal .btn:hover,
    .form-container .form-horizontal .btn:focus {
        box-shadow: 0 0 10px LightSalmon;
        outline: none;
    }

    .form-container .form-horizontal .remember-me {
        width: calc(100% - 105px);
        display: inline-block;
    }

    .form-container .form-horizontal .remember-me .check-label {
        color: #999;
        font-size: 12px;
        font-weight: 400;
        vertical-align: top;
        display: inline-block;
    }

    .form-container .form-horizontal .remember-me .checkbox {
        height: 17px;
        width: 17px;
        min-height: auto;
        margin: 0 1px 0 0;
        border: 2px solid #259CD4;
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
        position: relative;
        appearance: none;
        -moz-appearance: none;
        -webkit-appearance: none;
        transition: all 0.3s ease 0s;
    }

    .form-container .form-horizontal .remember-me .checkbox:before {
        content: '';
        height: 5px;
        width: 10px;
        border-bottom: 2px solid #fff;
        border-left: 2px solid #fff;
        transform: rotate(-45deg);
        position: absolute;
        left: 2px;
        top: 2.5px;
        transition: all 0.3s ease;
    }

    .form-container .form-horizontal .remember-me .checkbox:checked {
        background-color: LightSalmon;
    }

    .form-container .form-horizontal .remember-me .checkbox:checked:before {
        opacity: 1;
    }

    .form-container .form-horizontal .remember-me .checkbox:not(:checked):before {
        opacity: 0;
    }

    .form-container .form-horizontal .remember-me .checkbox:focus {
        outline: none;
    }

    .form-container .form-horizontal .forgot {
        color: #999;
        font-size: 12px;
        text-align: right;
        width: 100px;
        vertical-align: top;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }

    .form-container .form-horizontal .forgot:hover {
        text-decoration: underline;
    }

    .form-container .right-content .separator {
        color: #999;
        font-size: 15px;
        text-align: center;
        margin: 0 0 15px;
        display: block;
    }

    .form-container .right-content .signup-link {
        color: #999;
        font-size: 13px;
    }

    .form-container .right-content .signup-link a {
        color: Coral;
        transition: all 0.3s ease 0s;
    }

    .form-container .right-content .signup-link a:hover {
        text-decoration: underline;
    }

    @media only screen and (max-width:767px) {

        .form-container .left-content {
            display: none;
        }

        .form-container .right-content {
            width: 100%;
            padding: 30px;
        }

        .form-container .left-content .title {
            margin: 0 0 20px;
        }

        .form-container .left-content .sub-title {
            font-size: 40px;
        }

        .form-container .right-content .form-copyright {

            width: 90%;

        }
    }
</style>

<body>


    <div class="form-container">
        <div class="left-content">
            <h3 class="title">{!! Session::get('appname') == 'CRUDBooster' ? '<b>CRUD</b>Booster' : CRUDBooster::getSetting('appname') !!}</h3>
            <h4 class="sub-title">{{ CRUDBooster::getSetting('desciption_name')  }}</h4>
            <br>
            <h4 style=" font-family: 'Almarai';" class="sub-title">{{ CRUDBooster::getSetting('slogan')  }}</h4>
            <br>
            <img title='{!! Session::get('appname') == 'CRUDBooster' ? '<b>CRUD</b>Booster' : CRUDBooster::getSetting('appname') !!}' class="img-responsive center-block"
                src='{{ CRUDBooster::getSetting('logo') ? asset(CRUDBooster::getSetting('loginImg')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
                style='max-width: 70%;' />
        </div>
        <div class="right-content">
            <img title='{!! Session::get('appname') == 'CRUDBooster' ? '<b>CRUD</b>Booster' : CRUDBooster::getSetting('appname') !!}'
                src='{{ CRUDBooster::getSetting('logo') ? asset(CRUDBooster::getSetting('logoRoyaume')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
                style='max-width: 100%;max-height:15%' />
            <img title='{!! Session::get('appname') == 'CRUDBooster' ? '<b>CRUD</b>Booster' : CRUDBooster::getSetting('appname') !!}'
                src='{{ CRUDBooster::getSetting('logo') ? asset(CRUDBooster::getSetting('logo')) : asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
                style='max-width: 100%;max-height:25%' />
            <span class="separator">
                @if (Session::get('message') != '')
                    <div class='alert alert-danger'>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </span>
            <h5 class="form-title">Login</h5>
            <form class="form-horizontal" autocomplete='off' action="{{ route('postLogin') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label>Username / Email</label>
                    <input autocomplete='off' type="text" class="form-control" name='email' required
                        placeholder="Email" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input autocomplete='off' type="password" class="form-control" name='password' required
                        placeholder="Password" />
                </div>
                <button type="submit" class="btn signin">{{ cbLang('button_sign_in') }}</button>
                <div class="remember-me">
                    <input type="checkbox" class="checkbox">
                    <span class="check-label">Remember Me</span>
                </div>
                <a href="href='{{ route('getForgot') }}'" class="forgot">{{ cbLang('text_forgot_password') }}</a>
            </form>


            <div class="form-copyright">
                <h6>Copyright © 2023. Tous droits réservés . Propulsé par Jihaty 2.0</h6>
            </div>

        </div>
    </div>


    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte2418/bower_components/jquery/dist/jquery.min.js') }}">
    </script>
    <!-- Bootstrap 3.4.1 JS -->
    <script src="{{ asset('vendor/crudbooster/assets/adminlte2418/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
</body>

</html>
