@push('head')
    <link href="{{ asset('vendor/crudbooster/assets/tags/tags.css') }}" rel="stylesheet">
@endpush
@push('bottom')
    <script src="{{ asset('vendor/crudbooster/assets/tags/tags.js') }}"></script>
    <script type="text/javascript">
        window.onload = function(event) {
            let tagtext = document.getElementById("{{ $name }}store").value;
            if (tagtext.length === 0) {
                initTags();
            } else {
                const myTagArray = tagtext.split(",");
                initTags(myTagArray);
            }

        }
    </script>
@endpush
