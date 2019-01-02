let Post = {
    save:function (data) {
        $.ajax({
            type: 'POST',
            url: '/post',
            data: data,
            success: function(result){
                $('.post_content').val('');
                Post.load();
            }
        });
    },
    eventLoad:function () {
        $(".add").click(function (e) {
            e.preventDefault();
            Post.save($('.post_store').serialize())
        })
    },
    load:function () {
        let id_user = location.pathname.split('/')[2];
        $.ajax({
            type: 'POST',
            url: '/post/all',
            data:{id_user:id_user,_token:$('meta[name="csrf-token"]').attr('content')},
            success: function(result){
                $('.post_all').html(result);
            }
        });
    }
};
