<script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/crudbooster/assets/bootstraptable/dist/bootstrap-table.min.js') }}"></script>
@php
    $mod4g = DB::table('g4modulze')
        ->select('mod_stat_id')
        ->where('id', $id)
        ->first();
       // dd( $mod4g);
    $membr = DB::table('g4mod_details')
        ->select('id')
        ->where('modstat_id', $mod4g->mod_stat_id)
        ->Where('g4mod_id', $id)
        ->get();
        //dd( $membr);
    $tot = $membr->count();
@endphp
<label class='control-label col-sm-2'>
    @if (in_array(App::getLocale(), ['ar', 'fa']))
        {{ $form['label_ar'] }}
    @else
        {{ $form['label'] }}
    @endif
    @if ($required)
        <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
    @endif
</label>

<div class="col-sm-11">

    <div class="toolbar">
        <label class="switch">
            <input id="selectAll" type="checkbox">
            <div>
                <span>Check Tous</span>
            </div>
        </label>

    </div>

    <table id="table" data-toggle="table" data-filter-control="true" data-sort-select-options="true"
        data-pagination="true" data-page-size="15" data-header-style="headerStyle" data-striped="true"
        data-toolbar=".toolbar" data-toolbar-align="right" data-unique-id="id"
        data-url="{{ CRUDBooster::mainpath('lista/' . $id) }}">

        <thead>
            <tr>
                <th data-field="id" data-visible="false">ID</th>
                <th data-field="name" data-filter-control="input" data-filter-control-placeholder="Rechercher">Name
                </th>
                <th data-field="comname" data-filter-control="select" data-filter-control-placeholder="--Tous--">
                    Commune</th>
                <th data-field="titro" data-filter-control="select" data-filter-strict-search="true"
                    data-filter-control-placeholder="--Tous--">Titre</th>
                <th data-field="kayen" data-formatter="stateFormatter">

                </th>
            </tr>
        </thead>
    </table>
    <script>
        var $table = $('#table');
        $('#justChek').click(function() {
            if (this.checked) {
                $table.bootstrapTable('refresh');
            }
        })
        document.getElementById('selectAll').onclick = function() {

            var checkboxes = document.getElementsByName('ispart');
            for (var checkbox of checkboxes) {
                if (checkbox.checked != this.checked) {
                    checkbox.checked = this.checked;
                    checkMe(checkbox);
                }
            }
        }
        $table.on('all.bs.table', function(e, name, args) {
            if (document.querySelectorAll('input[type="checkbox"][name="ispart"]:not(:checked)').length == 0) {
                $('input[id=selectAll]').prop('checked', true);
            } else {
                $('input[id=selectAll]').prop('checked', false);
            }

        })
        $table.on('page-change.bs.table', function(e, name, args) {
            if (document.querySelectorAll('input[type="checkbox"][name="ispart"]:not(:checked)').length == 0) {
                $('input[id=selectAll]').prop('checked', true);
            } else {
                $('input[id=selectAll]').prop('checked', false);
            }

        })
        $(function() {
            document.getElementById('selectAll').checked = false
            $table.bootstrapTable('refreshOptions', {
                stickyHeader: true,
                stickyHeaderOffsetLeft: parseInt($('body').css('padding-left'), 10),
                stickyHeaderOffsetRight: parseInt($('body').css('padding-right'), 10),
                paginationParts: ['pageInfo', 'pageList'],
                locale: 'fr-FR'
            });
        })

        function stateFormatter(value, row, index) {
            var xed = ((value == '1') ? 'checked' : '');
            return '<label class="switch"><input name="ispart" data-field="' + index + '" type="checkbox" ' + xed +
                ' value="' + row.id +
                '" onchange="checkMe(this)"><div><span></span></div></label>'

        }

        function checkMe(element) {
            var urlex;
            addvalues = document.getElementById("addperson").value;
            const addedtab = addvalues.split(",").filter(element => element);
            delvalues = document.getElementById("delperson").value;
            const deletedtab = delvalues.split(",").filter(element => element);
            //  alert(addvalues);
            //  alert(addedtab.length);
            if (element.checked) {
                if (!addedtab.includes(element.value)) {
                    addedtab.push(element.value);
                }
                const index = deletedtab.indexOf(element.value);
                if (index > -1) { // only splice array when item is found
                    deletedtab.splice(index, 1); // 2nd parameter means remove one item only
                }
                // document.getElementById("delperson").value = deletedtab;
                $('#delperson').val(deletedtab);
                //document.getElementById("addperson").value = addedtab;
                $('#addperson').val(addedtab);
                const spantotal = document.getElementById('total');
                spantotal.textContent = Number(spantotal.textContent) + 1;

            } else {
                $('#selectAll').prop("checked", false);
                if (!deletedtab.includes(element.value)) {
                    deletedtab.push(element.value);
                }
                const index = addedtab.indexOf(element.value);
                if (index > -1) { // only splice array when item is found
                    addedtab.splice(index, 1); // 2nd parameter means remove one item only
                }
                //document.getElementById("delperson").value = deletedtab;
                $('#delperson').val(deletedtab);
                //document.getElementById("addperson").value = addedtab;
                $('#addperson').val(addedtab);
                const spantotal = document.getElementById('total');
                spantotal.textContent = Number(spantotal.textContent) - 1;
            }
        }
    </script>

    <script src="{{ asset('vendor/crudbooster/assets/bootstraptable/dist/bootstrap-table-locale-all.min.js') }}"></script>
    <script
        src="{{ asset('vendor/crudbooster/assets/bootstraptable/dist/extensions/filter-control/bootstrap-table-filter-control.min.js') }}">
    </script>
    <script
        src="{{ asset('vendor/crudbooster/assets/bootstraptable/dist/extensions/sticky-header/bootstrap-table-sticky-header.min.js') }}">
    </script>
</div>
<div class="icon-bar" style="{{ cbLang('right') }}:5%;">
    <div id="stickynav" class="stickynav"><span style="font-size: 18px;" class="badge badge-success badge-outlined"><i
                class="fa-solid fa-user-check"></i> <span id="total">{{ $tot }}</span></span></div>
</div>
