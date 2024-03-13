@push('head')
    <style type="text/css">
        #radioss label {
            cursor: pointer;
            position: relative;
        }

        #radioss input[type="radio"] {
            opacity: 0;
            /* hidden but still tabable */
            position: absolute;
        }

        #radioss div.info-box {
            min-height: 40px;
            margin-bottom: 5px;
        }

        #radioss div.info-box i {
            vertical-align: middle;
        }

        #radioss div.info-box-content {
            padding: 9px 5px;
            margin-left: 40px;
            vertical-align: middle;
        }

        #radioss div.info-box span {
            height: 40px;
            width: 40px;
            font-size: 35px;
            line-height: 35px;
            color: white;
        }

        #radioss input[type="radio"]+span {
            font-family: 'Material Icons';
            color: #707b7c;
        }

        #radioss input[type="radio"].blue:checked+div {
            color: #fdfefe;
            background-color: dodgerblue;
        }

        #radioss input[type="radio"].red:checked+div {
            color: #fdfefe;
            background-color: crimson;
        }

        #radioss input[type="radio"].green:checked+div {
            color: #fdfefe;
            background-color: seagreen;
        }

        #radioss input[type="radio"].orange:checked+div {
            color: #fdfefe;
            background-color: coral;
        }
    </style>
@endpush

@push('bottom')
    <script>
        window.onload = function() {
            var checkRadio = document.querySelector(
                'input[name="{{ $name }}"]:checked');
            if (checkRadio != null) {
                let element = document.getElementById(checkRadio.id + checkRadio.className);
                element.classList.replace('text-' + checkRadio.className, 'text-white');
            }
        };
        $('input[type=radio][name={{ $name }}]').on('change', function() {
            $("input[type='radio'][name={{ $name }}]:checked").each(function() {
                const idVal = this.id + this.className;
                let element = document.getElementById(this.id + this.className);
                element.classList.replace('text-' + this.className, 'text-white');
            });
        });
    </script>
@endpush
