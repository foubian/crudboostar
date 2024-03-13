@if ($form['datatable'])

    @if ($form['relationship_table'])
        @push('bottom')
            <script type="text/javascript">
                $(function() {
                    $('#{{ $name }}').select2();
                })
            </script>
        @endpush
    @else
        @if ($form['datatable_ajax'] == false)
            <?php
            
            $datatable = @$form['datatable'];
            $raw = explode(',', $datatable);
            $tablerekord = $raw[0];
            $columnrekord = $raw[1];
            $datavalue = @$form['datavalue'];
            $raw = explode(',', $datavalue);
            $tablevalue = $raw[0];
            $columnvalue = $raw[1];
            $wherevalue = $raw[2];
            
            $rekordvalue = DB::table($tablevalue)
                ->select($columnvalue)
                ->where($wherevalue, $id)
                ->first();
            
            $rekords = DB::table($tablerekord)
                ->select('id', $columnrekord)
                ->get();
            //  dd($rekordvalue->{$columnvalue});
            ?>
        @else
            @push('bottom')
                <script type="text/javascript">
                    $(function() {
                        $('#{{ $name }}').select2();
                    })
                </script>
            @endpush
        @endif
    @endif
@else
    @push('bottom')
        <script type="text/javascript">
            $(function() {
                $('#{{ $name }}').select2();
            })
        </script>
    @endpush

@endif

<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        @if (in_array(App::getLocale(), ['ar', 'fa']))
            {{ $form['label_ar'] }}
        @else
            {{ $form['label'] }}
        @endif
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
    </label>

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <select style='width:100%' class='form-control' id="{{ $name }}" {{ $required }} {{ $readonly }} {!! $placeholder !!} {{ $disabled }}
            name="{{ $name }}{{ $form['relationship_table'] ? '[]' : '' }}" {{ $form['relationship_table'] ? 'multiple="multiple"' : '' }}>
            @if ($form['datatable'])
                <option>Select Item</option>

                @foreach ($rekords as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $rekordvalue->{$columnvalue} ? 'selected' : '' }}>

                        {{ $item->{$columnrekord} }}

                    </option>
                @endforeach

            @endif
        </select>
        <div class="text-danger">
            {!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}
        </div>
        <!--end-text-danger-->
        <p class='help-block'>{{ @$form['help'] }}</p>

    </div>
</div>
