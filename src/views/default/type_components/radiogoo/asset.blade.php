@push('head')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        #radios label {
            cursor: pointer;
            position: relative;
        }

        #radios label+label {
            margin-left: 0px;
        }

        input[type="radio"] {
            opacity: 0;
            /* hidden but still tabable */
            position: absolute;
        }

        input[type="radio"]+span {
            font-family: 'Material Icons';
            color: #707b7c;
            border-radius: 20%;
            padding: 9px;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
        }

        input[type="radio"].blue:checked+span {
            color: #fdfefe;
            background-color: #4285F4;
        }

        input[type="radio"].red:checked+span {
            color: #fdfefe;
            background-color: #e74c3c;
        }

        input[type="radio"].hotpink:checked+span {
            color: #fdfefe;
            background-color: #FF69B4;
        }

        input[type="radio"]:focus+span {
            color: #fff;
        }

        /* ================ TOOLTIPS ================= */
        #radios label:hover::before {
            content: attr(for);
            font-family: Roboto, -apple-system, sans-serif;
            text-transform: capitalize;
            font-size: 11px;
            position: absolute;
            top: 90%;
            left: 0;
            right: 0;
            opacity: 0.75;
            background-color: #323232;
            color: #fff;
            padding: 4px;
            border-radius: 3px;
            display: block;
        }
    </style>
@endpush
