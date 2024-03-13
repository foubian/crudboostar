@push('head')
    <style type="text/css">
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .3s ease;
            background-color: red;
        }

        .hex-background:hover .overlay {
            opacity: 1;
        }

        .hex:hover {
            background-color: white;
        }

        .icon {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .fa-trash-can:hover {
            color: #eee;
        }
    </style>
@endpush
