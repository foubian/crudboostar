@push('bottom')
    <script>
        Array.from(document.getElementsByClassName('full')).forEach(e => {

            e.addEventListener('input', function() {
                this.value = this.value
                    .replace(/[^\d]/g, '')
                    .replace(/(\d{2})(\d{4})(\d{4})/, '($1)$2-$3');
            });
        });
    </script>
@endpush
