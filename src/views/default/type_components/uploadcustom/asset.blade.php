@push('head')
    <style type="text/css">
        .imgup {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border-style: solid;
            border-color: LightGreen;
            /*  box-shadow: 0 0 8px 2px LimeGreen; */
            position: relative;
        }

        .imgup img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
        }

        .imgup i {
            position: absolute;
            top: 10px;
            right: -7px;
             border: 2px solid;
            border-radius: 50%;
            /* padding: 11px; */
            height: 30px;
            width: 30px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: LightCoral;
            box-shadow: 0 0 8px 3px #B8B8B8;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 5px 10px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
@endpush
