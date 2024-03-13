
<div class='form-group form-datepicker {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        @if (in_array(App::getLocale(), ['ar', 'fa']))
            {{ $form['label_ar'] }}
        @else
            {{ $form['label'] }}
        @endif
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
    </label>
    @php
        $datevalue = DB::table($form['tabla'])
            ->select($form['starto'], $form['endo'])
            ->where('id', $id)
            ->first();
        
        if ($datevalue === null) {
            $datevalue = new stdClass();
        }
        
        if (empty($datevalue->{$form['starto']})) {
            $datevalue->{$form['starto']} = date('Y-m-d');
        }
        
        if (empty($datevalue->{$form['endo']})) {
            $datevalue->{$form['endo']} = date('Y-m-d');
        }
        
    @endphp

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <div class="input-daterange input-group" id="datepicker">
            <span class="input-group-addon" style="color:IndianRed; "><b>
                    @if (in_array(App::getLocale(), ['ar', 'fa']))
                        من:
                    @else
                        De:
                    @endif
                </b></span>
            <input id="ArrivalDate" type="text" class="input-sm form-control" name="{{ $form['starto'] }}" value='{{ $datevalue->{$form['starto']} }}' />
            <span class="input-group-addon" style="color:LimeGreen; "><b>
                    @if (in_array(App::getLocale(), ['ar', 'fa']))
                        الى:
                    @else
                        Au:
                    @endif
                </b></span>
            <input id="DepartDate" type="text" class="input-sm form-control" name="{{ $form['endo'] }}" value='{{ $datevalue->{$form['endo']} }}' />
        </div>
        <input type='hidden' id="{{ $name }}" name="{{ $name }}" value='{{ $datevalue->{$form['starto']} . ';' . $datevalue->{$form['endo']} }}' />
        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>
