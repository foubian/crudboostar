@extends('crudbooster::admin_template')
@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading ">
                @if (false)
                @if (CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
                    @if (g('return_url'))
                        @if (in_array(App::getLocale(), ['ar', 'fa']))
                            <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                <div class="hex-background" style="width: 30.64px;height: 36px;  background: #f5f5f5;">
                                    <div class="overlayhex">
                                        <a class="iconhex spin-icon" href='{{ g('return_url') }}'
                                            title=" {{ cbLang('form_back_to_list', ['module' => CRUDBooster::getCurrentModule()->name_ar]) }}">
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
                                <div class="hex-background" style="width: 30.64px;height: 36px;  background: #f5f5f5;">
                                    <div class="overlayhex">
                                        <a class="iconhex spin-icon" href='{{ g('return_url') }}'
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
                    @else
                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                            <div class="hex-background" style="width: 30.64px;height: 36px;  background: #f5f5f5;">
                                <div class="overlayhex">
                                    <a class="iconhex spin-icon" href='{{ CRUDBooster::mainpath() }}'
                                        title="{{ cbLang('form_back_to_list', ['module' => CRUDBooster::getCurrentModule()->name]) }}">
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
                <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                    <div class="hex-background" style="width: 30.64px;height: 36px;  background: #f5f5f5;">
                        <div class="overlayhex">
                            <a class="iconhex spin-icon" href='#'
                                title=" {{ cbLang('form_back_to_list', ['module' => CRUDBooster::getCurrentModule()->name]) }}">
                                <span class="spin-icon">
                                    <i class='{{ CRUDBooster::getCurrentModule()->icon }}' style="color:#2ecc71;"></i>
                                </span>
                            </a>  
                        </div>
                    </div>
                </div>
                @endif
                <strong style="display: inline-block;">{!! $page_title !!}</strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = @$row ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath('add-save');
                $return_url = $return_url ?: g('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data"
                    action='{{ $action }}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type='hidden' name='return_url' value='{{ @$return_url }}' />
                    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}' />
                    <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}' />
                    @if ($hide_form)
                        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                    @endif
                    <div class="box-body" id="parent-form-area">

                        @if ($command == 'detail')
                            @include('crudbooster::default.form_detail')
                        @else
                            @include('crudbooster::default.form_body')
                        @endif
                    </div><!-- /.box-body -->

                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                @if ($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                    @if (g('return_url'))
                                        <a href='{{ g('return_url') }}' class='btn btn-default'><i
                                                class='fa fa-chevron-circle-{{ cbLang('left') }}'></i>
                                            {{ cbLang('button_back') }}</a>
                                    @else
                                        <a href='{{ CRUDBooster::mainpath('?' . http_build_query(@$_GET)) }}'
                                            class='btn btn-default'><i
                                                class='fa fa-chevron-circle-{{ cbLang('left') }}'></i>
                                            {{ cbLang('button_back') }}</a>
                                    @endif
                                @endif
                                @if (CRUDBooster::isCreate() || CRUDBooster::isUpdate())
                                    @if (CRUDBooster::isCreate() && $button_addmore == true && $command == 'add')
                                        <input type="submit" name="submit" value='{{ cbLang('button_save_more') }}'
                                            class='btn btn-success'>
                                    @endif

                                    @if ($button_save && $command != 'detail')
                                        <input type="submit" name="submit" value='{{ cbLang('button_save') }}'
                                            class='btn btn-success'>
                                    @endif
                                @endif
                            </div>
                        </div>

                    </div><!-- /.box-footer-->

                </form>

            </div>
        </div>
    </div>
    <!--END AUTO MARGIN-->
@endsection
