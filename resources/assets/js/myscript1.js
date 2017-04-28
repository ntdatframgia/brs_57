$( document ).ready(function() {
    $('#datepicker').datepicker({
      autoclose: true,
      dateFormat: 'dd-mm-yy'
    });
    // custom text area
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
                            var count = parseInt($('#countItem').attr('data-sum'));
                            $('#countItem').text(count++);
                        }
                    });
                }
                e.preventDefault();
            }
        }
    });
// load comment
    $('#loadComment').on('click', function(e) {
        var nextPage = $('#loadComment').attr('data-nextPage');
        var token = $('#loadComment').attr('data-token');
        var url = nextPage
        $.ajax({
            url : url,
            type : 'GET',
            data :{_token:token},
            success:function(data){
                if(data.current_page == data.last_page){
                    $('#loadComment').hide();
                }
                var count = parseInt($('#countItem').attr('data-sum'));
                record = count+data.count;
                $('#countItem').text(record);
                $('#countItem').attr('data-sum',record);
                $('#loadComment').attr('data-nextPage',data.nextPage);
                $('.box-comments').append(data.html);
            }
        });
        e.preventDefault();
    });
// open  comment to edit
    $(".box-widget").on('click', '.editcomment', function() {
        var commentId = $(this).attr('data-id');
        $('.editcomment').addClass('hide');
        $('.commentText').removeClass('hide');
        $('.edit-comment-text').addClass('hide');
        $('textarea[data-id="' + commentId + '"]').removeClass('hide');
        $('.commentText[data-id="' + commentId + '"]').addClass('hide');
        $('.editcomment').removeClass('hide');
    });
// update comment
    $(document).on('keypress','.edit-comment-text', function(e) {
       if(e.which == 13 && !event.shiftKey) {
            var data = $(this).val();
            var token = $(this).attr('data-token');
            var method = $(this).attr('data-method');
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            if(data) {
                $.ajax({
                    url: url,
                    type :"PUT",
                    data: {data:data, _token:token,id:id},
                    success:function(data) {
                        console.log(data);
                        $('textarea[data-id="' + id + '"]').addClass('hide');
                        $('.commentText[data-id="' + id + '"]').text(data.data);
                        $('.commentText[data-id="' + id + '"]').removeClass('hide');
                        $('.text-muted[data-id="' + id + '"]').text('Edited '+data.updated_at);
                    }
                });
            }
            e.preventDefault();
        }
    });
    // delete comment
    $(".box-widget").on('click', '.deleteComment', function(e) {
        var commentId = $(this).attr('data-id');
        var token = $(this).attr('data-token');
        var url = $(this).attr('data-url');
        if( confirm('Are you sure you want to continue?')) {
            $.ajax({
                url : url,
                type : 'POST',
                data : {_token:token,_method:"DELETE",id:commentId},
                success:function(data){
                    $('.box-comment[data-id="' + commentId + '"]').addClass('hide');
                }
            });
        }
        e.preventDefault();
    });
    // bookmark a book
    $(document).on('click', '.markItem', function(e) {
        var bookId = $(this).attr('data-bookId');
        var userId = $(this).attr('data-user');
        var markId = $(this).attr('data-markId');
        var readStatus = $(this).attr('data-readStatus');
        var favoriteStatus = $(this).attr('data-favoriteStatus');
        var token = $(this).attr('data-token');
        var url = $(this).attr('data-url');
        var type = $(this).attr('data-type');
        $.ajax({
            url : url,
            type : "POST",
            data : {    bookId:bookId,
                        markId:markId,
                        userId:userId,
                        type:type,
                        readStatus:readStatus,
                        favoriteStatus:favoriteStatus,
                        _token:token,
                    },
            success:function(data){
                if (data.favorite == 0){
                    $('.fa-star[data-id="' + bookId + '"]').removeClass('favoriteStatus');
                } else {
                    $('.fa-star[data-id="' + bookId + '"]').addClass('favoriteStatus');
                }
                if (data.read_status == 0) {
                    $('.fa-flag-checkered[data-id="' + bookId + '"]').removeClass('readStatus');
                    $('.fa-flag[data-id="' + bookId + '"]').removeClass('readStatus');
                }  if (data.read_status == 1) {
                    $('.fa-flag-checkered[data-id="' + bookId + '"]').addClass('readStatus');
                    $('.fa-flag[data-id="' + bookId + '"]').removeClass('readStatus');
                } if (data.read_status == 2){
                    $('.fa-flag-checkered[data-id="' + bookId + '"]').removeClass('readStatus');
                    $('.fa-flag[data-id="' + bookId + '"]').addClass('readStatus');
                }
            }
        });
    });
    // like a comment
    $(document).on('click', '.like' ,function(){
        var userId = $(this).attr('data-userId');
        var bookId = $(this).attr('data-bookId');
        var url = $(this).attr('data-url');
        var action = $(this).attr('data-action');
        var token =  $(this).attr('data-token');
        var id =  $(this).attr('data-id');
        $.ajax({
            url : url,
            type :"PUT",
            data: {_token:token, action:action, bookId:bookId, url:url, userId:userId, commentId:id},
            success:function(data){
                alert(1);
                console.log(data);
            }
        });
    });
});
