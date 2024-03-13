@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/crudbooster/assets/adminlte/plugins/lightpick/lightpick.css') }}">
@endpush
@push('bottom')
    <script src="{{ asset('vendor/crudbooster/assets/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/crudbooster/assets/adminlte/plugins/lightpick/lightpick.js') }}"></script>
    <script>
        var from = document.getElementById('{{ $form['from'] }}');
        var to = document.getElementById('{{ $form['to'] }}');
      //  document.getElementById('spanfrom').innerText = from.value;
      //  document.getElementById('spanto').innerText = to.value;

        var picker = new Lightpick({
            field: document.getElementById('{{ $name }}'),
            lang: 'fr',
            format: 'YYYY-MM-DD',
            singleDate: false,
            selectForward: true,
            numberOfMonths: 2,
            startDate: moment(from.value),
            endDate: moment(to.value),

            onSelect: function(start, end) {
                from.value = start.format('YYYY-MM-DD');
                to.value = end.format('YYYY-MM-DD');

            },
            onClose: function() {
                var end = picker.getEndDate();
                var start = picker.getStartDate();
                if (Object.is(end, null)) {
                    end = moment(start, "YYYY-MM-DD").add(3, 'months');
                    picker.setDateRange(start, end);
                    picker.reloadOptions({});
                    from.value = start.format('YYYY-MM-DD');
                    to.value = end.format('YYYY-MM-DD');
                }

            },

        });
    </script>
@endpush
