@push('head')
    <style type="text/css">
        .radio-toolbar input[type="radio"] {
            visibility: hidden;
            display: none;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: white;
            padding: 2px 10px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }
        .radio-toolbar label.red {
            border: 2px solid Crimson;
        }

        .radio-toolbar label.red:hover {
            background-color: Crimson;
            color: white
        }

        .radio-toolbar input[type="radio"]:focus+label.red {
            border: 2px dotted Crimson;
        }

        .radio-toolbar input[type="radio"]:checked+label.red {
            background-color: Crimson;
            color: white;
            border: 2px dotted white;
        }
        .radio-toolbar label.orange {
            border: 2px solid Tomato;
        }

        .radio-toolbar label.orange:hover {
            background-color: Tomato;
            color: white
        }

        .radio-toolbar input[type="radio"]:focus+label.orange {
            border: 2px dotted Tomato;
        }

        .radio-toolbar input[type="radio"]:checked+label.orange {
            background-color: Tomato;
            color: white;
            border: 2px dotted white;
        }
        .radio-toolbar label.blue {
            border: 2px solid SkyBlue;
        }

        .radio-toolbar label.blue:hover {
            background-color: SkyBlue;
            color: white
        }

        .radio-toolbar input[type="radio"]:focus+label.blue {
            border: 2px dotted SkyBlue;
        }

        .radio-toolbar input[type="radio"]:checked+label.blue {
            background-color: SkyBlue;
            color: white;
            border: 2px dotted white;
        }
        .radio-toolbar label.green {
            border: 2px solid LimeGreen;
        }

        .radio-toolbar label.green:hover {
            background-color: LimeGreen;
            color: white
        }

        .radio-toolbar input[type="radio"]:focus+label.green {
            border: 2px dotted LimeGreen;
        }

        .radio-toolbar input[type="radio"]:checked+label.green {
            background-color: LimeGreen;
            color: white;
            border: 2px dotted white;
        }
    </style>
@endpush
