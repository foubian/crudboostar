@push('head')
    <style type="text/css">
        button,
        input,
        optgroup,
        select,
        textarea {
            color: black;
        }

        input[type="checkbox"] {
            position: relative;
            width: 40px;
            height: 20px;
            -webkit-appearance: none;
            background: LightCoral;
            outline: none;
            border-radius: 20px;
            box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.2);
            transition: 0.7s;
        }

        input:checked[type="checkbox"] {
            background: #52be80;
        }

        input[type="checkbox"]:before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 20px;
            top: 0;
            left: 0;
            background: #ffffff;
            transform: scale(1.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: .5s;
        }

        input:checked[type="checkbox"]:before {
            left: 20px;
        }

        table.dataTable tbody th td {
            vertical-align: top;
        }
    </style>
@endpush
@push('bottom')
    <script type="text/javascript">
        $(".users").html(numberNotChecked());
        $(document).ready(function() {



            var table = $('#datamembres').DataTable({
                // "deferRender": true,
                "dom": 'rtip',
                fixedHeader: true,
                paging: true,
                "pageLength": 50,
                "fnDrawCallback": function(oSettings) {
                    $('#xked').prop('checked', false);
                    $('#all').prop('checked', false);
                },
                initComplete: function() {
                    var api = this.api();

                    api.columns([1, 2])
                        .every(function(i) {
                            if (i != 0) {
                                var column = this;
                                var select = $('<select><option value="">Filtrer</option></select>')
                                    .appendTo($(column.header()).empty())
                                    .on('change', function() {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                        $('#all').prop('checked', false);
                                        $('#xked').prop('checked', false);
                                    });
                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function(d, j) {
                                        select.append('<option value="' + d + '">' + d + '</option>');
                                    });
                                $(column.footer()).empty();

                            }
                        });

                },
            });
            $('#datamembres thead th').each(function(i) {
                if (i == 0) {
                    var title = $('#datamembres thead th').eq($(this).index()).text();
                    $(this).html('<input type="text" placeholder="' + title + '" data-index="' + i + '" />');
                }
            });
            $(table.table().container()).on('keyup', 'thead input', function() {
                table
                    .column($(this).data('index'))
                    .search(this.value)
                    .draw();
            });
        });
        $('#all').click(function(e) {


            if ($(this).is(':checked')) {
                var tabmembers = $('[name="table-memberz"]');
                $.each(tabmembers, function() {
                    var $this = $(this);
                    if (!$this.is(":checked")) {
                        $this.prop('checked', true);
                        $("#memberz").val($("#memberz").val() + $this.val() + ',');
                    }
                });

            } else {
                var tabmembers = $('[name="table-memberz"]');
                $.each(tabmembers, function() {
                    var $this = $(this);
                    const valuetodelete = ',' + $this.val() + ',';
                    $("#memberz").val($("#memberz").val().replace(valuetodelete, ","));
                    $this.prop('checked', false);
                });


            }
            //  $('#datamembres tbody :checkbox').prop('checked', $(this).is(':checked'));
            e.stopImmediatePropagation();
            $(".users").html(numberNotChecked());

        });
        $('#xked').click(function(e) {
            var table = $('#datamembres').DataTable();
            var ischecked = $(this).is(':checked');
            if (ischecked) {
                table.draw();
                $.fn.dataTable.ext.search.pop();
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        if ($('#memberz' + dataIndex).is(":checked")) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                );

                table.draw();

            } else {
                table.draw();
                $.fn.dataTable.ext.search.pop();
                table.draw();
            }
        });
        $("td input:checkbox").change(function() {

            if (this.checked) {

                $("#memberz").val($("#memberz").val() + $(this).val() + ',');

            } else {

                const valuetodelete = ',' + $(this).val() + ',';
                $("#memberz").val($("#memberz").val().replace(valuetodelete, ","));
            }
            $(".users").html(numberNotChecked());
        });

        function numberNotChecked() {
            return $('td input:checkbox:checked').length;
        }
    </script>
@endpush
@push('bottom')
    <script src="{{ asset('vendor/crudbooster/assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/crudbooster/assets/datatables/datatables.min.css') }}"></script>
@endpush
