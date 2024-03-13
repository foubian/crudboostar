@push('head')
    <style>
        /**
             * Checkboxes
             */
        sup {
            font-weight: bold;
            font-size: smaller;
        }

        .checkbox {
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            font-size: 16px;
            font-weight: 400;
        }

        .checkbox>input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }

        .checkbox__icon {
            display: inline-block;
            /* Default State */
            color: IndianRed;
            /* Active State */
        }

        input[type="checkbox"]:checked~.checkbox__icon {
            color: LimeGreen;
        }

        /* IE6-8 Fallback */
        @media \0screen\,screen\9 {
            .checkbox__icon {
                display: none;
            }

            .checkbox>input[type="checkbox"] {
                position: static;
            }
        }

        /****************************
             ****************************
             ****************************
             * Helpers
             */
        .icon--check:before,
        input[type="checkbox"]:checked~.checkbox__icon:before {
            font-family: "FontAwesome";
            font: var(--fa-font-solid);
            font-size: 20px;
            content: "\f00c";
        }

        .icon--check-empty:before,
        .checkbox__icon:before {
            font-family: "FontAwesome";
            font: var(--fa-font-regular);
            font-size: 20px;
            content: "\f0c8";
        }
    </style>
@endpush
