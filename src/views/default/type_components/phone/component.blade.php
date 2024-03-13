<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        {{ $form['label'] }}
        @if ($required)
        <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
        @endif
    </label>

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-phone-volume"></i></span>
            <input type='text' style="direction:ltr;" data-inputmask="'mask': '(+212)9-99999999'" data-mask=""
                title="{{ $form['label'] }}" {{ $required }} {{ $readonly }} {!! $placeholder !!} {{ $disabled }}
                {{ $validation['max'] ? 'maxlength=' . $validation['max'] : '' }} class='form-control'
                name="{{ $name }}" id="{{ $name }}" value='{{ $value }}' />

            <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " .
                $errors->first($name) : '' !!}</div>
            <p class='help-block'>{{ @$form['help'] }}</p>

        </div>
    </div>
</div>