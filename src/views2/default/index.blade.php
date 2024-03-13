@extends('crudbooster::admin_template')

@section('content')
    @php
        $module = CRUDBooster::getCurrentModule();
    @endphp
    @if ($index_statistic)
        <div id='box-statistic' class='row'>
            @foreach ($index_statistic as $stat)
                <div class="{{ $stat['width'] ?: 'col-sm-3' }}">
                    <div class="small-box bg-{{ $stat['color'] ?: 'red' }}">
                        <div class="inner">
                            <h3>{{ $stat['count'] }}</h3>
                            <p>{{ $stat['label'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if ($is_child == true)
        @if (g('parent_table') == '')
            {{ CRUDBooster::redirect(Request::server('HTTP_REFERER'), cbLang('denied_access'), 'danger') }}
        @else
            @if ($module->path == 'mod4stationz')
                @include('crudbooster::default.stazions')
            @elseif ($module->path == 'g4modulze')
                @include('crudbooster::default.g4modulze')
            @elseif ($module->path == 'g4mod_details')
                @include('crudbooster::default.g4modetail')
            @elseif ($module->path == 'modules')
                @include('crudbooster::default.cedules')
            @elseif ($module->path == 'cedules')
                @include('crudbooster::default.schema')
            @elseif($parent_table)
                <div class="box box-default">
                    <div class="box-body table-responsive no-padding">
                        <table class='table table-bordered'>
                            <tbody>
                                <tr class='active'>
                                    <td colspan="2"><strong><i class='fa fa-bars'></i>
                                            {{ ucwords(urldecode(g('label'))) }}</strong></td>
                                </tr>

                                @foreach (explode(',', urldecode(g('parent_columns'))) as $c)
                                    <tr>
                                        <td width="25%"><strong>
                                                @if (urldecode(g('parent_columns_alias')))
                                                    {{ explode(',', urldecode(g('parent_columns_alias')))[$loop->index] }}
                                                @else
                                                    {{ ucwords(str_replace('_', ' ', $c)) }}
                                                @endif
                                            </strong></td>
                                        <td> {{ $parent_table->$c }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endif
    @elseif ($module->path == 'comunz' && g('parent_id'))
        @include('crudbooster::default.provinz')
    @elseif ($module->path == 'participants' && g('parent_id'))
        @if (g('parent_table') == 'comunz')
            @include('crudbooster::default.comunz')
        @elseif (g('parent_table') == 'tabtitre')
            @include('crudbooster::default.titre')
        @endif
    @elseif ($module->path == 'formed' && g('mid'))
        @include('crudbooster::default.module')
    @endif
    @if (!is_null($pre_index_html) && !empty($pre_index_html))
        {!! $pre_index_html !!}
    @endif
    <div class="box">
        <div class="box-header">
            <div class="pull-{{ cbLang('left') }}">
                @if (g('return_url'))
                    @if (in_array(App::getLocale(), ['ar', 'fa']))
                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                            <div class="hex-background" style="width: 30.64px;height: 36px;  background: white;">
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
                            <div class="hex-background" style="width: 30.64px;height: 36px;  background: white;">
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
                @if (CRUDBooster::getCurrentMethod() == 'getIndex')
                    @if ($button_show)
                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                            <div class="hex-background" style="width: 30.64px;height: 36px;  background: white;">
                                <div class="overlayhex">
                                    <a class="iconhex spin-icon"
                                        href="{{ CRUDBooster::mainpath() . '?' . http_build_query(Request::all()) }}"
                                        id='btn_show_data' title="{{ cbLang('action_show_data') }}">
                                        <span class="spin-icon">
                                            <i class="fa-regular fa-eye" style="color: #1a5fb4;"></i>
                                        </span></a>

                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($button_add && CRUDBooster::isCreate())
                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                            <div class="hex-background" style="width: 30.64px;height: 36px;  background: white;">
                                <div class="overlayhex">
                                    <a class="iconhex spin-icon" id='btn_add_new_data'
                                        title="{{ cbLang('action_add_data') }}"
                                        href="{{ CRUDBooster::mainpath('add') . '?return_url=' . urlencode(Request::fullUrl()) . '&parent_id=' . g('parent_id') . '&parent_field=' . $parent_field }}">
                                        <span class="spin-icon">
                                            <i class="fa-solid fa-plus" style="color: #26a269;"></i>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($button_export && CRUDBooster::getCurrentMethod() == 'getIndex')
                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                            <div class="hex-background" style="width: 30.64px;height: 36px;  background: white;">
                                <div class="overlayhex">
                                    <a class="iconhex spin-icon" id="btn_export_data" href="javascript:void(0)"
                                        data-url-parameter='{{ $build_query }}' title='Export Data'>
                                        <span class="spin-icon">
                                            <i class="fa-solid fa-download" style="color: #e66100;"></i>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!empty($index_button))
                        @foreach ($index_button as $ib)
                            <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                <div class="hex-background" style="width: 30.64px;height: 36px;  background: white;">
                                    <div class="overlayhex">
                                        <a href='{{ $ib['url'] }}' title="{{ $ib['label'] }}"
                                            id='{{ str_slug($ib['label']) }}' class='iconhex spin-icon'
                                            @if ($ib['onClick']) onClick='return {{ $ib['onClick'] }}' @endif
                                            @if ($ib['onMouseOver']) onMouseOver='return {{ $ib['onMouseOver'] }}' @endif
                                            @if ($ib['onMouseOut']) onMouseOut='return {{ $ib['onMouseOut'] }}' @endif
                                            @if ($ib['onKeyDown']) onKeyDown='return {{ $ib['onKeyDown'] }}' @endif
                                            @if ($ib['onLoad']) onLoad='return {{ $ib['onLoad'] }}' @endif>
                                            @if ($ib['caption'])
                                                <span style="color:{{ $ib['color'] }}">{{ $ib['caption'] }}</span>
                                            @else
                                                <i class='{{ $ib['icon'] }}'
                                                    style="color: {{ $ib['color'] ? $ib['color'] : 'MediumBlue' }}"></i>
                                            @endif
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
                @if (!$button_bulk_action && (($button_delete && CRUDBooster::isDelete()) || $button_selected))

                    <div class="selected-action" style="display:inline-block;position:relative;bottom: 4px;">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false"><i class='fa fa-check-square-o'></i>
                            {{ cbLang('button_selected_action') }}
                            <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                            @if ($button_delete && CRUDBooster::isDelete())
                                <li><a href="javascript:void(0)" data-name='delete'
                                        title='{{ cbLang('action_delete_selected') }}'><i class="fa fa-trash"></i>
                                        {{ cbLang('action_delete_selected') }}</a></li>
                            @endif

                            @if ($button_selected)
                                @foreach ($button_selected as $button)
                                    <li><a href="javascript:void(0)" data-name='{{ $button['name'] }}'
                                            title='{{ $button['label'] }}'><i class="fa fa-{{ $button['icon'] }}"></i>
                                            {{ $button['label'] }}</a></li>
                                @endforeach
                            @endif

                        </ul>
                        <!--end-dropdown-menu-->
                    </div>
                    <!--end-selected-action-->

                @endif
            </div>
            <!--end-pull-left-->
            <div class="box-tools pull-{{ cbLang('right') }}"
                style="position: relative;margin-top: -5px;margin-right: -10px">

                @if ($button_filter)
                    <a style="margin-top:-23px" href="javascript:void(0)" id='btn_advanced_filter'
                        data-url-parameter='{{ $build_query }}' title='{{ cbLang('filter_dialog_title') }}'
                        class="btn btn-sm btn-default {{ Request::get('filter_column') ? 'active' : '' }}">
                        <i class="fa fa-filter"></i> {{ cbLang('button_filter') }}
                    </a>
                @endif

                <form method='get' style="display:inline-block;width: 260px;" action='{{ Request::url() }}'>
                    <div class="input-group">
                        <input type="text" name="q" value="{{ Request::get('q') }}"
                            class="form-control input-sm pull-{{ cbLang('right') }}"
                            placeholder="{{ cbLang('filter_search') }}" />
                        {!! CRUDBooster::getUrlParameters(['q']) !!}
                        <div class="input-group-btn">
                            @if (Request::get('q'))
                                <?php
                                $parameters = Request::all();
                                unset($parameters['q']);
                                $build_query = urldecode(http_build_query($parameters));
                                $build_query = $build_query ? '?' . $build_query : '';
                                $build_query = Request::all() ? $build_query : '';
                                ?>
                                <button type='button'
                                    onclick='location.href="{{ CRUDBooster::mainpath() . $build_query }}"'
                                    title="{{ cbLang('button_reset') }}" class='btn btn-sm btn-warning'><i
                                        class='fa fa-ban'></i></button>
                            @endif
                            <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <form method='get' id='form-limit-paging' style="display:inline-block" action='{{ Request::url() }}'>
                    {!! CRUDBooster::getUrlParameters(['limit']) !!}
                    <div class="input-group">
                        <select onchange="$('#form-limit-paging').submit()" name='limit' style="width: 56px;"
                            class='form-control input-sm'>
                            <option {{ $limit == 5 ? 'selected' : '' }} value='5'>5</option>
                            <option {{ $limit == 10 ? 'selected' : '' }} value='10'>10</option>
                            <option {{ $limit == 20 ? 'selected' : '' }} value='20'>20</option>
                            <option {{ $limit == 25 ? 'selected' : '' }} value='25'>25</option>
                            <option {{ $limit == 50 ? 'selected' : '' }} value='50'>50</option>
                            <option {{ $limit == 100 ? 'selected' : '' }} value='100'>100</option>
                            <option {{ $limit == 200 ? 'selected' : '' }} value='200'>200</option>
                        </select>
                    </div>
                </form>
                <a class="center-block btn btn-xs spin-icon outline btn-primary">
                    <span> Total : {{ $result->total() }} <i class="fa-solid fa-arrows-down-to-line"></i></span></a>

            </div>

            <br style="clear:both" />

        </div>
        <div class="box-body table-responsive no-padding">
            @include('crudbooster::default.table')
        </div>
    </div>

    @if (!is_null($post_index_html) && !empty($post_index_html))
        {!! $post_index_html !!}
    @endif

@endsection