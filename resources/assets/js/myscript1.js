$( document ).ready(function() {
    $('#datepicker').datepicker({
      autoclose: true,
      dateFormat: 'dd-mm-yy'
    });
    $('#comment').on({
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
                            $('.box-comments').prepend(data);
                            $('#comment').val('');
                        }
                    });
                }
                e.preventDefault();
            }
        }
    });

    $('#loadComment').on('click', function(e) {
        var curentPage = $('#loadComment').attr('data-curentPage');
        var token = $('#loadComment').attr('data-token');
        var url = curentPage
        $.ajax({
            url : url,
            type : 'GET',
            data :{_token:token},
            success:function(data){
                console.log(data);
            }
        });
        e.preventDefault();
    });
});
