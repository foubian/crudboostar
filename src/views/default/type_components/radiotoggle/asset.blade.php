@push('head')
    <style type="text/css">
        .radio-grp:after {
            content: ' ';
            display: table;
            clear: both;
        }

        .radio-grp .radio-btn {
            display: inline-block;
        }

        .radio-grp .radio-btn:last-of-type {
            margin-right: 0;
        }

        .radio-grp .radio-btn input {
            display: none;
        }

        .radio-grp .radio-btn input[type="radio"]:checked~label {
            color: seagreen;
        }
        .radio-grp  .red input[type="radio"]:checked~label {
            color: tomato;
        }

        .radio-grp .radio-btn label {
            font-size: 1rem;
            font-weight: 600;
            display: inline-block;
            color: #363636;
            color: #bdbdbd;
            padding: .5rem 2rem;
            border: 3px solid;
            transition: color .3s ease;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
@endpush
