<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>{{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
    </label>




    <div class="{{ $col_width ?: 'col-sm-10' }}">

        @if ($form['dataenum'] != '')
            <?php
            @$value = explode(';', $value);
            @array_walk($value, 'trim');
            $dataenum = $form['dataenum'];
            $dataenum = is_array($dataenum) ? $dataenum : explode(';', $dataenum);
            ?>
            @foreach ($dataenum as $k => $d)
                <?php
                if (strpos($d, '|')) {
                    $val = substr($d, 0, strpos($d, '|'));
                    $label = substr($d, strpos($d, '|') + 1);
                } else {
                    $val = $label = $d;
                }
                $checked = $value && in_array($val, $value) ? 'checked' : '';
                ?>

                <div class="checkbox {{ $disabled }}">
                    <input class="tgl tgl-flip" id="cb5"  type="checkbox" {{ $disabled }} {{ $checked }} name="{{ $name }}[]"
                    value="{{ $val }}">
                    <label class="tgl-btn" data-tg-off="NV" data-tg-on="Validé" for="cb5"></label>

              </div>
            @endforeach
        @endif
        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>
