@push('head')
    <style type="text/css">


        .formulario label {
            display: inline-block;
            cursor: pointer;
            color: #8b8b8b;
            position: relative;
            padding: 5px 15px 5px 51px;
            font-size: 1em;
            border-radius: 5px;
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .formulario label:hover {
            background: rgba(0, 116, 217, 0.1);
        }

        .formulario label:before {
            content: "";
            display: inline-block;
            width: 17px;
            height: 17px;
            position: absolute;
            left: 15px;
            border-radius: 50%;
            background: none;
            border: 3px solid #8b8b8b;
        }

        .formulario input[type=radio] {
            display: none;
        }

        .formulario input[type=radio]:checked+label:before {
            display: none;
        }

        .formulario input[type=radio]:checked+label {
            padding: 5px 15px;
            background: #0074D9;
            border-radius: 2px;
            color: #fff;
        }

    </style>
@endpush
