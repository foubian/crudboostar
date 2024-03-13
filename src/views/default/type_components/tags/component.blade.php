<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        {{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
        @endif :
    </label>
    @if ($readonly)
        <div class="{{ $col_width ?: 'col-sm-10' }}">
            @if ($value)
                @php
                    $tagvalues = explode(',', $value);
                @endphp
                @foreach ($tagvalues as $tagvalue)
                    <span class="label label-warning">{{ $tagvalue }}</span>
                @endforeach
            @endif

        </div>
    @else
        <input {{ $required }}  {{ $disabled }} {{ $validation['max'] ? 'maxlength=' . $validation['max'] : '' }} {!! $placeholder !!} class='form-control'
            id="{{ $name }}store" name="{{ $name }}store" title="{{ $form['label'] }}" type='hidden' value='{{ $value }}' />
        <div class="{{ $col_width ?: 'col-sm-10' }}">
            <div class="tags-input form-control tag-bg-warning" data-name="{{ $name }}"></div>

            <div class="input-group">
                <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
                <p class='help-block'>{{ @$form['help'] }}</p>

            </div>
        </div>
    @endif

</div>
<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
</div>
