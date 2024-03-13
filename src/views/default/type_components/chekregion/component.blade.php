<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>{{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
    </label>
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
            $selects_data->addselect($datatable_sort);
            
            $selects_data = $selects_data->orderby($datatable_sort, 'asc')->get();
            $collection_data = $selects_data->groupBy($datatable_sort);
            
            $value = explode(';', $value);
            //dd($collection_data);
        @endphp
        @foreach ($collection_data as $groupedresult)
            <div class="col-sm-3">
                @foreach ($groupedresult as $d)
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
                            <b>&nbsp;{{ $d->{$datatable_field} }}</b>
                            <sup>
                                @switch($d->{$datatable_sort})
                                    @case(2)
                                       <span class="text-primary">Pro</span>
                                    @break

                                    @case(3)
                                       <span class="text-yellow">Pre</span>
                                    @break

                                    @default
                                        <span class="text-red">Reg</span>
                                @endswitch
                            </sup>
                        </label>

                    </div>
                @endforeach
            </div>
        @endforeach

    @endif

    <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
    <p class='help-block'>{{ @$form['help'] }}</p>

</div>
