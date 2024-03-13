<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>{{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
    </label>
    <div class="{{ $col_width ?: 'col-sm-10' }}">

        @if ($form['dataenum'] != '')
            <?php
            $value = explode(';', $value);
            array_walk($value, 'trim');
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
                    <label class="checkbox">
                        <input type="checkbox" {{ $disabled }} {{ $checked }} name="{{ $name }}[]" value="{{ $val }}">
                        <span class="checkbox__icon"></span>
                        &nbsp;{{ $label }}
                    </label>

                </div>
            @endforeach
        @endif

        @if ($form['datatable'])
            @php
                $datatable_array = explode(',', $form['datatable']);
                $datatable_tab = $datatable_array[0];
                $datatable_field = $datatable_array[1];
                $datatable_sort = $datatable_array[2];
                
                $tables = explode('.', $datatable_tab);
                $selects_data = DB::table($tables[0])->select($tables[0] . '.id');
                
                if (\Schema::hasColumn($tables[0], 'deleted_at')) {
                    $selects_data->where('deleted_at', null);
                }
                
                if ($form['datatable_where']) {
                    $selects_data->whereraw($form['datatable_where']);
                }
                
                if (count($tables)) {
                    for ($i = 1; $i <= count($tables) - 1; $i++) {
                        $tab = $tables[$i];
                        $selects_data->leftjoin($tab, $tab . '.id', '=', 'id_' . $tab);
                    }
                }
                
                $selects_data->addselect($datatable_field);
                
                $selects_data = $selects_data->orderby($datatable_sort, 'asc')->get();
               
            @endphp

            @if ($form['relationship_table'])
                @php
                    $foreignKey = CRUDBooster::getForeignKey($table, $form['relationship_table']);
                    $foreignKey2 = CRUDBooster::getForeignKey($datatable_tab, $form['relationship_table']);
                    
                    $value = DB::table($form['relationship_table'])->where($form['relationship_table'] . '.' . $foreignKey, $id);
                    $value = $value->pluck($foreignKey2)->toArray();
                @endphp

                @foreach ($selects_data as $d)
                    @php
                        $checked = is_array($value) && in_array($d->id, $value) ? 'checked' : '';
                    @endphp
                    <div data-val={{ $val }} class="checkbox {{ $disabled }}">
                        <label class="checkbox">
                            <input type="checkbox" {{ $disabled }} {{ $checked }} name="{{ $name }}[]" value="{{ $d->id }}">
                            <span class="checkbox__icon"></span>
                            &nbsp;{{ $d->{$datatable_field} }}
                        </label>

                    </div>
                @endforeach
            @else
                @php
                    $value = explode(';', $value);
                 //  dd( $selects_data);
                @endphp
                @foreach ($selects_data as $d)
                    @php
                       // $val = $d->{$datatable_field};
                       $val = $d->id;
                        $checked = is_array($value) && in_array($val, $value) ? 'checked' : '';
                        //dd( $val);
                        if ($val == '' || !$d->id) {
                            continue;
                        }
                        
                    @endphp
                    <div data-val={{ $val }} class="checkbox {{ $disabled }}">
                        <label class="checkbox">
                            <input type="checkbox" {{ $disabled }} {{ $checked }} name="{{ $name }}[]" value="{{ $d->id }}">
                            <span class="checkbox__icon"></span>
                            &nbsp;{{ $d->{$datatable_field} }}
                        </label>

                    </div>
                @endforeach

            @endif
            @if ($form['dataquery'])
                @php
                    $query = DB::select(DB::raw($form['dataquery']));
                    $value = explode(';', $value);
                @endphp
                @if ($query)
                    @foreach ($query as $q)
                        @php
                            $val = $q->value;
                            $checked = is_array($value) && in_array($val, $value) ? 'checked' : '';
                            
                        @endphp
                        <div data-val={{ $val }} class="checkbox {{ $disabled }}">
                            <label class="checkbox">
                                <input type="checkbox" {{ $disabled }} {{ $checked }} name="{{ $name }}[]" value="{{ $d->id }}">
                                <span class="checkbox__icon"></span>
                                &nbsp;{{ $q->label }}
                            </label>

                        </div>
                    @endforeach

                @endif
            @endif
        @endif
        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>
