<div class='form-group form-datepicker {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        @if (in_array(App::getLocale(), ['ar', 'fa']))
            {{ $form['label_ar'] }}
        @else
            {{ $form['label'] }}
        @endif
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
        :
    </label>
   

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        @if ($readonly)
       
            <label class=control-label col-sm-2'>
                <a class="'pull-left btn btn-xs spin-icon outline btn-success">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span id="spanfrom"></span>
                </a>
            </label>
            <label class=control-label col-sm-2'>
                <a class="'pull-left btn btn-xs spin-icon outline btn-danger">
                    <i class="fa-solid fa-calendar-minus"></i>
                    <span id="spanto"></span>
                </a>
            </label>
            <script>
                var from = document.getElementById('{{ $form['from'] }}');
                var to = document.getElementById('{{ $form['to'] }}');
                document.getElementById('spanfrom').innerText = from.value;
                document.getElementById('spanto').innerText = to.value;
              </script>
        @else
            <div class="input-group">
                <span class="input-group-addon open-datetimepicker"><a><i class='fa fa-calendar'
                            style="color:#555"></i></a></span>
                <input type="text" title="{{ $form['label'] }}" class="form-control form-control-sm"
                    {{ $required }} {{ $readonly }} {!! $placeholder !!} {{ $disabled }}
                    name="{{ $name }}" id="{{ $name }}" value='{{ $value }}' />
            </div>
            <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
            <p class='help-block'>{{ @$form['help'] }}</p>
        @endif
    </div>
</div>

