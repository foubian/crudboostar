@push('bottom')
    <script type="text/javascript">
        $(function() {
            $('#{{ $name }}').select2();
        })
    </script>
@endpush
@php
    $convention = DB::table('abo_convention')->select('abo_convention.cnvstate')->where('abo_convention.id', $id)->first();
    $select_table = $form['datatable'];
    $select_table_pk = CRUDBooster::findPrimaryKey($select_table);
    $result = DB::table($select_table)->select($select_table_pk);
    foreach ($form['fieldscol'] as $item) {
        $result = $result->addSelect($item['field']);
    }
    $result = $result->orderby('dinomination', 'asc')->get();
@endphp

<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">

    @if ($readonly)
     
        <label class='control-label col-sm-2'>
           État de convention :
        </label>
        <div class="{{ $col_width ?: 'col-sm-10' }}">

            <li class="list-group-item">
                <a class="btn btn-block">
                    {!! customCallback($convention->cnvstate, 'btn-block') !!}
                </a>
            </li>
        </div>
    @endif
</div>

<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">

    @if ($readonly)
        @php
            $result = $result->where($select_table_pk, $value)->first();
        @endphp
        <label class='control-label col-sm-2'>
            {{ $form['label'] }}
            @if ($required)
                <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
            @endif
            :
        </label>
        <div class="{{ $col_width ?: 'col-sm-10' }}">
            @foreach ($form['fieldscol'] as $item)
                <li class="list-group-item">
                    <strong><i class="fa-solid {{ $item['icon'] }}" style="color: {{ $item['color'] }};"></i> {{ $item['title'] }} :</strong>
                    @if ($result->{$item['field']} == '')
                        <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                            <span>Non saisie</span>
                        </a>
                    @else
                        <a class="pull-right btn btn-xs spin-icon btn-primary outline">
                            <span id="{{$item['becopy']}}"> {{ $result->{$item['field']} }} </span>
                            @if ($item['becopy'])
                                <button onclick="copyMe('{{$item['becopy']}}','{{$item['becopy']}}')" type="button"><i class="fa-solid fa-copy" style="color: #5e5c64;"></i></button>
                            @endif
                        </a>
                    @endif

                </li>
            @endforeach
        </div>
    @else
        <label class='control-label col-sm-2'>
            {{ $form['label'] }} {{ $value }}
            @if ($required)
                <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
            @endif
        </label>

        <div class="{{ $col_width ?: 'col-sm-10' }}">
            <select {{ $required }} {{ $readonly }} {{ $disabled }} {{ $form['relationship_table'] ? 'multiple="multiple"' : '' }} {!! $placeholder !!} class='form-control'
                id="{{ $name }}" name="{{ $name }}{{ $form['relationship_table'] ? '[]' : '' }}" style='width:100%'>
                @if ($form['datatable'])
                    <option value=''>{{ cbLang('text_prefix_option') }} {{ $form['label'] }}</option>

                    @foreach ($result as $r)
                        @php
                            $option_value = $r->$select_table_pk;
                            $selected = $option_value == $value ? 'selected' : '';
                            $showfields = '';
                            foreach ($form['fieldscol'] as $item) {
                                if ($item['showed']) {
                                    $showfields = $showfields . $r->{$item['field']};
                                    if (next($form['fieldscol'])) {
                                        $showfields .= '-';
                                    }
                                }
                            }
                        @endphp
                        <option {{ $selected }} value='{{ $option_value }}'>{{ $showfields }}</option>
                    @endforeach

                    <!--end-datatable-->
                @endif
            </select>
            <div class="text-danger">
                {!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}
            </div>
            <!--end-text-danger-->
            <p class='help-block'>{{ @$form['help'] }}</p>

        </div>
        <a class="btn btn-primary" data-toggle="modal" href="#{{ strtolower($form['label']) }}" role="button">+ {{ $form['label'] }}</a>

    @endif
</div>
