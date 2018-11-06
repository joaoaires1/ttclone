jQuery(document).ready(function () {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery('#form-tweet').on('submit', function (e) {
        var a = $('input[name=content]').val().length;
        if (a > 0) {
            let content = $('input[name=content]').val();

            jQuery.ajax({
                url: '/home/store',
                method: 'POST',
                data: {
                    content: content
                },
                success: function () {
                    $('input[name=content]').val('');
                    showLastPost();
                }
            });
        }
        
        e.preventDefault();
    });

    function showPosts() {
        jQuery.ajax({
            url: '/home/getPosts',
            method: 'GET',
            success: function (result) {
                result.data.map(dado => {
                    if (dado.user.image == null) dado.user.image = 'avatar-generico.png';

                    $('#timeline').append(`
                        <div class="col-12 p-3 border border-top-0">
                            <div>
                                <a href="/user/${dado.user.username}">
                                <img src="/storage/users/${dado.user.image}" alt="${dado.user.name}" class="image rounded-circle">
                                <span class="pl-3"><strong>${dado.user.name}</strong> @${dado.user.username}</span> - ${format_data(dado.created_at)}
                                </a>
                            </div>

                            <div class="p-3">${dado.content}</div>
                        </div>
                    `);
                });

                var next = 2;
                var last_page = result.last_page;
                $(window).scroll(function() {
                    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                        if (next <= last_page) {
                            $.ajax({
                                url: '/home/getPosts?page='+next,
                                method: 'GET',
                                success: function (result) {
                                    result.data.map(dado => {
                                        if (dado.user.image == null) dado.user.image = 'avatar-generico.png';

                                        $('#timeline').append(`
                                        <div class="col-12 p-3 border border-top-0">
                                            <div>
                                                <a href="/user/${dado.user.username}">
                                                <img src="/storage/users/${dado.user.image}" alt="${dado.user.name}" class="image rounded-circle">
                                                <span class="pl-3"><strong>${dado.user.name}</strong> @${dado.user.username}</span> - ${format_data(dado.created_at)}
                                                </a>
                                            </div>
                
                                            <div class="p-3">${dado.content}</div>
                                        </div>
                                        `);
                                    })
                                }
                            });
                        }
                        next++;
                    }
                });
            }
        });
    };

    function showLastPost() {
        jQuery.ajax({
            url: '/home/getLastPost',
            method: 'GET',
            success: function (dado) {
                if (dado.user.image == null) dado.user.image = 'avatar-generico.png';
                
                $('#timeline').prepend(`
                    <div class="col-12 p-3 border border-top-0">
                        <div> <img src="/storage/users/${dado.user.image}" alt="${dado.user.name}" class="image rounded-circle"> <span class="pl-3"><strong>${dado.user.name}</strong> @${dado.user.username}</span> - ${format_data(dado.created_at)}</div>
                        <div class="p-3">${dado.content}</div>
                    </div>
                `);
            }
        });
    };
    
    function format_data(a) {
        var str = a;
        var res = str.substr(0, 10);
        return res;
    }

    showPosts();
});

