<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        @if (in_array(App::getLocale(), ['ar', 'fa']))
            {{ $form['label_ar'] }}
        @else
            {{ $form['label'] }}
        @endif
        @if ($required)
            <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
        @endif
    </label>

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <div class="input-group">
            <input type='color' {{ $required }} name="{{ $name }}" id="{{ $name }}" value='{{ $value }}' />

            <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
            <p class='help-block'>{{ @$form['help'] }}</p>

        </div>
    </div>
</div>
