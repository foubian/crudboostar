<div class='form-group  {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>

        @if (in_array(App::getLocale(), ['ar', 'fa']))
            {{ $form['label_ar'] }}
        @elseif (in_array(App::getLocale(), ['en', 'fr']))
            {{ $form['label'] }}
        @endif
        @if ($required)
            <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
        @endif
    </label>
    <div class="{{ $col_width ?: 'col-sm-10' }}">

        @if (!$form['dataenum'] && !$form['datatable'] && !$form['dataquery'])
            <em>{{ cbLang('there_is_no_option') }}</em>
        @endif

        @if ($form['dataenum'] != '')
            <?php
            @$value = explode(';', $value);
            @array_walk($value, 'trim');
            $dataenum = $form['dataenum'];
            $dataenum = is_array($dataenum) ? $dataenum : explode(';', $dataenum);
            ?>
            <div id="radioss">
                @foreach ($dataenum as $k => $d)
                    <?php
                    if (strpos($d, '|')) {
                        [$val, $label, $icon, $color] = explode('|', $d);
                        //$icon = '&#' . $icon . ';';
                    } else {
                        $val = $label = $d;
                    }
                    $datachecked = DB::table($form['dbsource'])
                        ->join('comunz', $form['dbsource'] . '.' . $form['dbkolum'], '=', 'comunz.id')
                        ->where($form['dbsource'] . '.id', $id)
                        ->select('comunz.type_com')
                        ->first();
                    $value[0] = $datachecked->type_com;
                    $checked = ($value && in_array($val, $value)) || (CRUDBooster::isCreate() && ($k == 0 && $form['validation'])) ? 'checked' : '';

                    ?>

                    <label for="{{ $label }}">
                        <input type="radio" class="{{ $color }}" {{ $disabled }} {{ $checked }}
                            name="{{ $name }}" id="{{ $label }}" value="{{ $val }}" />
                        <div class="info-box">
                            <span class="info-box-icon">
                                <i class="fa  {{ $icon }} fa-2xs"></i>
                            </span>
                            <div  id="{{ $label }}{{ $color }}" class="info-box-content text-{{ $color }}">
                                {{ $label }}
                            </div>

                        </div>
                    </label>
                @endforeach
            </div>
            <div id="posts"></div>

        @endif

        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>
