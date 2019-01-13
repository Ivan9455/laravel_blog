let Post = {
    postLimit: 3,
    save: function (data) {
        $.ajax({
            type: 'POST',
            url: '/post/store',
            data: data,
            success: function (result) {
                $('.post_content').val('');
                Post.load($('.post_all')[0].children.length + 1);
            }
        });
    },
    eventAdd: function () {
        $(".add").click(function (e) {
            e.preventDefault();
            Post.save($('.post_store').serialize())
        });
    },
    eventStatusBest:function(){
        $(".post_all").on('click', ".status", function () {
            if(Post.userAuth()==='true'){
                $.ajax({
                    type: 'POST',
                    url: '/post/status',
                    data: {
                        id: $(this).attr('data-post-id'),
                        id_user: $(this).attr('data-post-id_user'),
                        status: $(this).attr('data-status'),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        Post.loadBest($('.post_all')[0].children.length);
                    }
                })
            }else{
                document.location.href = document.location.origin + '/login';
            }
        });

    },
    eventStatus: function () {
        $(".post_all").on('click', ".status", function () {
            $.ajax({
                type: 'POST',
                url: '/post/status',
                data: {
                    id: $(this).attr('data-post-id'),
                    id_user: $(this).attr('data-post-id_user'),
                    status: $(this).attr('data-status'),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    Post.load($('.post_all')[0].children.length);
                }
            })
        });
    },
    eventLoad: function () {
        $('.post_load').click(function (e) {
            e.preventDefault();
            Post.load($('.post_all')[0].children.length + Post.postLimit)
        })
    },
    load: function (post_limit = Post.postLimit) {
        let id_user = location.pathname.split('/')[2];
        $.ajax({
            type: 'POST',
            url: '/post/all',
            data: {
                id_user: id_user,
                post_limit: post_limit,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                $('.post_all').html(result);
            }
        });
    },
    eventLoadBest: function () {
        $('.post_load').click(function (e) {
            e.preventDefault();
            Post.loadBest($('.post_all')[0].children.length + Post.postLimit)
        })
    },
    loadBest: function (post_limit = Post.postLimit) {
        $.ajax({
            type: 'POST',
            url: '/post/best',
            data: {
                post_limit: post_limit,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                $('.post_all').html(result);
            }
        });
    },
    userAuth: function () {
        $.when(
            $.ajax({
                type: 'POST',
                url: '/auth',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    return result;
                }
            })
        ).done(function (result) {
            return result;
        })
    }
};

