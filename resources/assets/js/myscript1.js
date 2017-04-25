$( document ).ready(function() {
    $('#datepicker').datepicker({
      autoclose: true,
      dateFormat: 'dd-mm-yy'
    });
    $('textarea').on({
        keypress: function(e) {
            if(e.which == 13 && !event.shiftKey) {
                var data = $('#comment').val();
                if(data) {
                    var formData = $('#formComment').serialize();
                    var url = $("#formComment").attr('action');
                    $.ajax({
                        url: url,
                        type :"POST",
                        data: formData,
                        success:function(data) {
                            $('.box-comments').append(data);
                            $('#comment').val('');
                        }
                    });
                }
                e.preventDefault();
            }
        }
});
});
