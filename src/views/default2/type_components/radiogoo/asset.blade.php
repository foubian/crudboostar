@push('head')
    <style type="text/css">
        #radios label {
            cursor: pointer;
            position: relative;
        }
        input[type="radio"] {
            opacity: 0;
            /* hidden but still tabable */
            position: absolute;
        }
        input[type="radio"]+span {
            color: #707b7c;
            border-radius: 20%;
            padding: 9px;
        }
  </style>
@endpush
