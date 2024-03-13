<div class='form-group form-datepicker {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>@if (in_array(App::getLocale(), ['ar', 'fa']))
        {{ $form['label_ar'] }}
        @else
        {{ $form['label'] }}
        @endif
        @if ($required)
        <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
        @endif
    </label>
     @php
 
     $yearsarray = explode('-', $value);
     $value = end($yearsarray);

    @endphp
 

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <div class="input-group">
            <span class="input-group-addon open-datetimepicker"><a><i class='fa fa-calendar '></i></a></span>
            <input type="text" type='text' title="{{ $form['label'] }}" readonly {{ $required }} {{ $readonly }} {!!
                $placeholder !!} {{ $disabled }} class='form-control notfocus input_date' name="{{ $name }}"
                value='{{ $value }}' id="datepickeryear" />

        </div>
        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " .
            $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>