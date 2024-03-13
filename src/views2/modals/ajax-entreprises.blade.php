@push('bottom')
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script>
Array.from(document.getElementsByClassName('fone')).forEach(e => {

            e.addEventListener('input', function() {
                this.value = this.value
                    .replace(/[^\d]/g, '')
                    .replace(/(\d{2})(\d{4})(\d{4})/, '($1)$2-$3');
            });
        });
    $('#newentreprise').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            // everything looks good!
            //alert("vvv");
            e.preventDefault();
            var data = $('#newentreprise').serialize();
            $.ajax({
                type: 'post'
                , url: "{{CRUDBooster::mainpath('new-entreprise')}}"
                , data: data
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , beforeSend: function() {
                    $('#submitbtn').html('....Please wait');
                }
                , success: function(response) {
                    alert(response.success);
                }
                , complete: function(response) {
                    $('#submitbtn').html('Save');
                    //clearInput();
                    location.reload();
                }
            });
        }
    })

</script>

@endpush('bottom')
