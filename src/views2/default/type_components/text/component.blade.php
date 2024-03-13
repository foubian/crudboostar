<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        {{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>* </span>:
        @endif
    </label>
    @if ($readonly)
    <div class="{{ $col_width ?: 'col-sm-10' }}">
    <label class='control-label col-sm-2'>
    {{ $value }}
    </label>
    </div>

@else
    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <div class="input-group">
            <span class="input-group-addon"><i class="{{ $form['ikon'] }}"></i></span>
            <input type='text' title="{{ $form['label'] }}" {{ $required }} {{ $readonly }} {!! $placeholder !!} {{ $disabled }} {{ $validation['max'] ? 'maxlength=' . $validation['max'] : '' }}
                class='form-control' name="{{ $name }}" id="{{ $name }}" value='{{ $value }}' />

            <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
            <p class='help-block'>{{ @$form['help'] }}</p>

        </div>
    </div>
    @endif
</div>
