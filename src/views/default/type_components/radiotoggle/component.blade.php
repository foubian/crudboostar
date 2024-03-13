<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">

    <label class='control-label col-sm-2'>
        {{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
        :
    </label>
    <div class="{{ $col_width ?: 'col-sm-10' }}">
        @if ($readonly)
            @switch($value)
                @case(8)
                    <span class="'pull-left btn btn-block btn-xs spin-icon btn-success outline">
                        <i class="fa-solid fa-check"></i>
                        Validé
                    </span>
                @break

                @case(9)
                    <span class="'pull-left btn btn-block btn-xs spin-icon btn-danger outline">
                        <i class="fa-solid fa-xmark"></i>
                        Non Validé
                    </span>
                @break

                @default
                    <span class="'pull-left btn btn-block btn-xs spin-icon btn-navy outline">
                        <i class="fa-solid fa-xmark"></i>
                        Non Traité
                    </span>
            @endswitch
        @else
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
                <div class="radio-grp {{ $disabled }}">
                    @foreach ($dataenum as $k => $d)
                        <?php
                        if (strpos($d, '|')) {
                            $dataradio = explode('|', $d);
                            $val = $dataradio[0];
                            $label = $dataradio[1];
                            $klass = $dataradio[2];
                        
                            //$val = substr($d, 0, strpos($d, '|'));
                            //$label = substr($d, strpos($d, '|') + 1);
                            //$klass = substr($d, strpos($d, '|') + 2);
                        } else {
                            $val = $label = $d;
                        }
                        
                        $checked = $value && in_array($val, $value) ? 'checked' : '';
                        //dd($checked);
                        ?>
                        <div class="radio-btn {{ $klass ? $klass : '' }}">
                            <input {{ $checked }} {{ $disabled }} id="{{ $name }}{{ $val }}" name="{{ $name }}" type="radio" value="{{ $val }}">
                            <label class="{{ $name }}" for="{{ $name }}{{ $val }}">{{ $label }}</label>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
            <p class='help-block'>{{ @$form['help'] }}</p>
        @endif
    </div>
</div>
