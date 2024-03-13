<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
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
        @if ($readonly)
            <li class="list-group-item">
                @if ($value == '')
                    <strong><i class="fa-solid fa-at" style="color: #d9534f"></i></strong>

                    <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                        <span>Non saisie</span>
                    </a>
                @else
                    <strong><i class="fa-solid fa-at" style="color: SteelBlue"></i></strong>

                    <a class="pull-right btn btn-xs spin-icon btn-primary outline">
                        <span iid="{{ $name }}"> {{ $value }} </span>
                        @if ($form['becopy'])
                            <button onclick="copyMe('{{ $name }}','Champ')" type="button"><i class="fa-solid fa-copy" style="color: #5e5c64;"></i></button>
                        @endif
                    </a>
                @endif

            </li>
        @else
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input name="{{ $name }}" style="display: none" type="email">
                <input {{ $required }} {{ $readonly }} {{ $disabled }} {{ $validation['max'] ? 'maxlength=' . $validation['max'] : '' }} {!! $placeholder !!} class='form-control'
                    id="{{ $name }}" name="{{ $name }}" title="{{ $form['label'] }}" type='email' value='{{ $value }}' />
            </div>
            <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
            <p class='help-block'>{{ @$form['help'] }}</p>
        @endif
    </div>

</div>
