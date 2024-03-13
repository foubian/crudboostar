@push('head')
    <style type="text/css">
        .input-number {
            width: 80px;
            padding: 0 12px;
            vertical-align: top;
            text-align: center;
            outline: none;
        }

        .input-number,
        .input-number-decrement,
        .input-number-increment {
            border: 1px solid #ccc;
            height: 35px;
            user-select: none;
        }

        .input-number-decrement,
        .input-number-increment {
            display: inline-block;
            width: 30px;
            line-height: 30px;
            background: #f1f1f1;
            color: #444;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
        }

        .input-number-decrement:active,
        .input-number-increment:active {
            background: #ddd;
        }

        .input-number-decrement {
            border-radius: 4px 0 0 4px;
        }

        .input-number-increment {
            border-radius: 0 4px 4px 0;
        }
    </style>
@endpush
