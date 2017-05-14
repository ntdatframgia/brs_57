$(document).ready(function(){
    $(document).on('click', '.markItem', function(){
        var type = $(this).attr('data-type');
        var url = $('#markBook').attr('data-url');
        var markId = $('#markBook').attr('data-markId');
        var userId = $('#markBook').attr('data-user');
        var bookId = $('#markBook').attr('data-bookId');
        var token = $('#markBook').attr('data-token');
        var favorite = $('#markBook').attr('data-favorite');
        var read_status = $('#markBook').attr('data-read_status');
        $.ajax({
            url : url,
            type : 'POST',
            data : {user_id:userId, id:markId, book_id:bookId, _token:token, type:type, favorite:favorite, read_status:read_status},
            success : function(data){
                console.log(data);
            }
        });
    });
});
