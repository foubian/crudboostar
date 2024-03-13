<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
            {{ $form['label'] }}
            @if ($required)
                <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>* </span>
            @endif
            :
    </label>
    <div class="{{ $col_width ?: 'col-sm-10' }}">
        @if (!$readonly)
            <div class="input-group">
                <span class="input-group-addon"><i class="{{ $form['ikon'] }}"></i></span>
                <input {{ $disabled }} {{ $required }} {{ $readonly }} {{ $validation['max'] ? 'maxlength=' . $validation['max'] : '' }} {!! $placeholder !!} class='form-control'
                    id="{{ $name }}" name="{{ $name }}" title="{{ $form['label'] }}" type='text' value='{{ $value }}' />

                <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
                <p class='help-block'>{{ @$form['help'] }}</p>

            </div>
        @else
        <li class="list-group-item">
            @if ($value == '')
            <strong><i class="fa-solid {{ $form['ikon'] }}" style="color: #d9534f"></i></strong>

                <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                    <span>Non saisie</span>
                </a>
            @else
            <strong><i class="fa-solid {{ $form['ikon'] }}" style="color: SteelBlue"></i></strong>

                <a class="pull-right btn btn-xs spin-icon btn-primary outline">
                    <span id="{{ $name }}"> {{ $value}} </span>
                    @if ($form['becopy'])
                        <button onclick="copyMe('{{ $name }}','Champ')" type="button"><i class="fa-solid fa-copy" style="color: #5e5c64;"></i></button>
                    @endif
                </a>
            @endif

        </li>
        @endif

    </div>

</div>
