<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
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
    @push('bottom')
    @if(!$readonly)
    <script>
        $(function() {

                $('span.{{ $name }}').click(function() {
                    if ($(this).hasClass('input-number-increment')) {
                        var max = document.getElementById("{{ $name }}").getAttribute("max") || false;
                        var value = document.getElementById("{{ $name }}").value;
                        // alert(max);
                        value++;
                        if (!max || value <= max) {
                            var addValue = parseInt(document.getElementById("{{ $name }}").value) + 1;
                            document.getElementById("{{ $name }}").value = addValue;
                        }


                    }
                    if ($(this).hasClass('input-number-decrement')) {
                        var min = document.getElementById("{{ $name }}").getAttribute("min") || false;
                        var value = document.getElementById("{{ $name }}").value;
                        value++;
                        if (!max || value <= max) {
                            var removeValue = parseInt(document.getElementById("{{ $name }}").value) - 1;
                            if (removeValue == 0) {
                                removeValue = 1;
                            }
                            document.getElementById("{{ $name }}").value = removeValue;
                        }

                    }
                });
            })
    </script>
    @endif
    @endpush
    @if ($value == '')
    @php $value=1; @endphp
    @endif

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <span class="input-number-decrement {{ $name }}">–</span>
        <input class="input-number" type="text" {{ $required }} {{ $readonly }} {!! $placeholder !!} {{ $disabled }}
            {{ $validation['min'] ? 'min=' . $validation['min'] : '' }}
            onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
            {{ $validation['max'] ? 'max=' . $validation['max'] : '' }} name="{{ $name }}" id="{{ $name }}"
            value="{{ $value }}">
        <span class="input-number-increment {{ $name }}">+</span>
        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " .
            $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>