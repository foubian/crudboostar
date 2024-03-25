@extends('crudbooster::admin_template')

@section('content')

    @php
        $module = CRUDBooster::getCurrentModule();
        //dd($index_button);
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

    @if (!is_null($pre_index_html) && !empty($pre_index_html))
        {!! $pre_index_html !!}
    @endif

    @if ($index_button)
    <div class="box box-primary">

        <div class="box-header">
            <i class="fa fa-edit"></i>
            <h3 class="box-title">Actions</h3>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">
                <div class="description-block">

            @foreach ($index_button as $ib)
                @if ($ib['help'])
                <a class="dedcription-btn" href="{{ $ib['url'] }}" title="{{ $ib['label'] }}"  style="color: {{ $ib['color'] }};">
                            <span class="name-descripeion">{{ $ib['label'] }}</span>
                            <div class="btn-icon" style="background-color: {{ $ib['color'] }};">
                            <i class="{{ $ib['icon'] }}" style="color:white;"></i>
                            </div>
                        </a>
                    
                @endif
            @endforeach
            </div>

            </div>


            </div>

        </div>
    </div>
        @endif

    
                  
                  

                
    <div class="box">


        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4">
                    <div class="description-block" style="text-align: left">
                        <div class="description-header">
                            @if (g('return_url'))
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                        <div class="hex-background"
                                            style="width: 30.64px;height: 36px;  background: white;">
                                            <div class="overlayhex">
                                                <a class="iconhex spin-icon" href='{{ g('return_url') }}'
                                                    id='btn_show_data'
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
                                        <div class="hex-background"
                                            style="width: 30.64px;height: 36px;  background: white;">
                                            <div class="overlayhex">
                                                <a class="iconhex spin-icon" href='{{ g('return_url') }}'
                                                    id='btn_show_data'
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
                                        <div class="hex-background"
                                            style="width: 30.64px;height: 36px;  background: white;">
                                            <div class="overlayhex">
                                                <a class="iconhex spin-icon"
                                                    href="{{ CRUDBooster::mainpath()}}"
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
                                        <div class="hex-background"
                                            style="width: 30.64px;height: 36px;  background: white;">
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
                                        <div class="hex-background"
                                            style="width: 30.64px;height: 36px;  background: white;">
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
                                    @if (!$ib['help'])
                                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                            <div class="hex-background"
                                                style="width: 30.64px;height: 36px;  background: white;">
                                                <div class="overlayhex">
                                                    <a href='{{ $ib['url'] }}' title="{{ $ib['label'] }}"
                                                        id='{{ str_slug($ib['label']) }}' class='iconhex spin-icon'
                                                        @if ($ib['onClick']) onClick='return {{ $ib['onClick'] }}' @endif
                                                        @if ($ib['onMouseOver']) onMouseOver='return {{ $ib['onMouseOver'] }}' @endif
                                                        @if ($ib['onMouseOut']) onMouseOut='return {{ $ib['onMouseOut'] }}' @endif
                                                        @if ($ib['onKeyDown']) onKeyDown='return {{ $ib['onKeyDown'] }}' @endif
                                                        @if ($ib['onLoad']) onLoad='return {{ $ib['onLoad'] }}' @endif>

                                                        @if ($ib['caption'])
                                                            <strong> <span
                                                                    style="color:{{ !empty(g('stage')) && strtoupper(g('stage')) != $ib['caption'] ? 'DarkGray' : $ib['color'] }};">{{ $ib['caption'] }}</span>
                                                            </strong>
                                                        @else
                                                            <i class="{{ $ib['icon'] }} {{ strtoupper(g('filiere')) == $ib['label'] ? ' fa-flip' : '' }}"
                                                                style="color: {{ $ib['color'] ? $ib['color'] : 'MediumBlue' }}"></i>
                                                        @endif
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                                @if ($button_bulk_action && (($button_delete && CRUDBooster::isDelete()) || $button_selected))

                                    @if ($button_delete && CRUDBooster::isDelete())
                                        <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                            <div class="hex-background"
                                                style="width: 30.64px;height: 36px;  background: white;">
                                                <div class="overlayhex selected-action">
                                                    <a class="iconhex spin-icon" href="javascript:void(0)"
                                                        data-name='delete'
                                                        title='{{ cbLang('action_delete_selected') }}'>
                                                        <span class="spin-icon">
                                                            <i class="fa-solid fa-trash" style="color: #e66100;"></i>
                                                        </span>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($button_selected)
                                        @foreach ($button_selected as $button)
                                            <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                                <div class="hex-background"
                                                    style="width: 30.64px;height: 36px;  background: white;">
                                                    <div class="overlayhex selected-action">
                                                        <a class="iconhex spin-icon" href="javascript:void(0)"
                                                            data-name='{{ $button['name'] }}'
                                                            title='{{ $button['label'] }}'>
                                                            <span class="spin-icon">
                                                                <i class="fa-solid fa-{{ $button['icon'] }}"
                                                                    style="color:{{ $button['color'] }};"></i>
                                                            </span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                @endif




                            @endif <!--end-dropdown-menu-->
                        </div>
                    </div>

                </div>

                <div class="col-sm-4">
                    <div class="description-block">
                        @if ($button_filiere)
                            @php
                                $filiere = DB::table('filyir')->where('is_actif', '=', 1)->get()->toArray();
                                $labela = array_column($filiere, 'code_fyl');
                                $found_key = array_search(g('filiere'), $labela);
                            @endphp

                            <div class="icon">
                                <div class=" hex" style="width: 51.64px;height: 60px;background:DarkGray;">
                                    <div class="hex-background" style="width: 48.24px;height: 56px;  background: white;">
                                        <div class="overlayhex">
                                            <a href="http://ensup.local/admin/conventions" title="ALL" id="all"
                                                class="iconhex spin-icon">
                                                @if ($found_key)
                                                    <i class="fa {{ $filiere[$found_key]->iconfyl }} {{ strtoupper(g('filiere')) == $filiere[$found_key]->code_fyl ? ' fa-flip' : '' }}"
                                                        style="color: {{ $filiere[$found_key]->colorfyl ? $filiere[$found_key]->colorfyl : 'MediumBlue' }}"></i>
                                                @else
                                                    <i class="fa fa-list " style="color: SteelBlue"></i>
                                                @endif


                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <ul class="menu">

                                    @foreach ($filiere as $ib)
                                        <li class="spread">
                                            <div class="hex" style="width: 34.64px;height: 40px;background:DarkGray;">
                                                <div class="hex-background"
                                                    style="width: 30.64px;height: 36px;  background: white;">
                                                    <div class="overlayhex">
                                                        <a href='{{ CRUDBooster::mainpath() . '?filiere=' . $ib->code_fyl }}'
                                                            title="{{ $ib->code_fyl }}"
                                                            id='{{ str_slug($ib->code_fyl) }}' class='iconhex spin-icon'>
                                                            <i class="fa {{ $ib->iconfyl }} {{ strtoupper(g('filiere')) == $ib->iconfyl ? ' fa-flip' : '' }}"
                                                                style="color: {{ $ib->colorfyl ? $ib->colorfyl : 'MediumBlue' }}"></i>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="col-sm-4">
                    <div class="description-block" style="text-align: left">
                        <div class="description-header ">
                            @if ($button_filter)
                                <a style="margin-top:-23px" href="javascript:void(0)" id='btn_advanced_filter'
                                    data-url-parameter='{{ $build_query }}' title='{{ cbLang('filter_dialog_title') }}'
                                    class="btn btn-sm btn-default {{ Request::get('filter_column') ? 'active' : '' }}">
                                    <i class="fa fa-filter"></i> {{ cbLang('button_filter') }}
                                </a>
                            @endif

                            <form method='get' style="display:inline-block;" action='{{ Request::url() }}'>
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
                                        <button type='submit' class="btn btn-sm btn-default"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>

                            <form method='get' id='form-limit-paging' style="display:inline-block"
                                action='{{ Request::url() }}'>
                                {!! CRUDBooster::getUrlParameters(['limit']) !!}
                                <div class="input-group">
                                    <select onchange="$('#form-limit-paging').submit()" name='limit'
                                        style="width: 56px;" class='form-control input-sm'>
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

                        </div>
                        <div class="description-text">

                            <a class="center-block btn btn-xs spin-icon outline btn-primary">
                                <span>
                                    Total : {{ $result->total() }} <i class="fa-solid fa-arrows-down-to-line"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


    <div class="box-body table-responsive no-padding">
        @include('crudbooster::default.table')
    </div>
    </div>

    @if (!is_null($post_index_html) && !empty($post_index_html))
        {!! $post_index_html !!}
    @endif
    <div class="fab-container">
        <div class="fab shadow">
            <div class="fab-content">
                <i class="fa-solid fa-headset fa-2xl" style="color:white;"></i>
            </div>
        </div>
        <div class="sub-button shadow">
            <a href="{{ CRUDBooster::adminpath('tickets/add') }}" title="google" target="_blank">
                <i class="fa-solid fa-headset fa-lg" style="color:white;"></i>
            </a>
        </div>
        @if (!empty($index_button))
            @foreach ($index_button as $ib)
                @if ($ib['help'])
                    <div class="sub-button shadow" style="background-color: {{ $ib['color'] }};">
                        <a href="{{ $ib['url'] }}" title="{{ $ib['label'] }}">
                            <i class="{{ $ib['icon'] }}" style="color:white;"></i>
                        </a>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
