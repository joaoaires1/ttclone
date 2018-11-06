jQuery(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery('#form-procurar').on('submit', function (e) {
        $('.pessoas').html('');
        var pessoa = $('input[name=pessoa]').val();
        
        $.ajax({
            url: '/procurar/getPessoas',
            method: 'GET',
            data: {
                pessoa: pessoa
            },
            success: result => {
                $('input[name=pessoa]').val('');

                result.map( dado => {
                    if (dado.image == null) dado.image = 'avatar-generico.png';

                    if (dado.seguindo_id) {
                        $('.pessoas').append(`
                            <div class="col-12 mb-3 clearfix">
                                <a href="/user/${dado.username}">
                                    <div class="col-2 float-left">
                                        <img src="/storage/users/${dado.image}" alt="${dado.name}" class="image rounded-circle">
                                    </div>
                                    <div class="col-7 float-left pl-4">
                                        <strong>${dado.name}</strong> @${dado.username}
                                    </div>
                                </a>
                                <div class="col-3 float-left">
                                    <span id="btn${dado.id}">
                                        <button id="btn-deixar" value="${dado.id}" class="btn btn-danger">Deixar</button>
                                    </span>
                                </div>
                            </div>
                        `);
                    } else {
                        $('.pessoas').append(`
                            <div class="col-12 mb-3 clearfix">
                                <a href="/user/${dado.username}">
                                    <div class="col-2 float-left">
                                        <img src="/storage/users/${dado.image}" alt="${dado.name}" class="image rounded-circle">
                                    </div>
                                    <div class="col-7 float-left pl-4">
                                        <strong>${dado.name}</strong> @${dado.username}
                                    </div>
                                </a>
                                <div class="col-3 float-left ">
                                    <span id="btn${dado.id}">
                                        <button id="btn-seguir" value="${dado.id}" class="btn btn-success">Seguir</button>
                                    </span>
                                </div>
                            </div>
                        `);
                    }  
                });
            }
        });
        

        e.preventDefault();
    });

    jQuery('body').on('click', '#btn-deixar', function () {
        var pessoa_id = (this.value);
        
        jQuery.ajax({
            url: '/procurar/deixar',
            method: 'GET',
            data: {
                pessoa_id: pessoa_id
            },
            success: function () {
                $('#btn' + pessoa_id).html('');
                $('#btn' + pessoa_id).append(`
                    <button id="btn-seguir" value="${pessoa_id}" class="btn btn-success">Seguir</button>
                `);
            }
        })
    });

    jQuery('body').on('click', '#btn-seguir', function () {
        var pessoa_id = (this.value);

        jQuery.ajax({
            url: '/procurar/seguir',
            method: 'GET',
            data: {
                pessoa_id: pessoa_id
            },
            success: function () {
                $('#btn' + pessoa_id).html('');
                $('#btn' + pessoa_id).append(`
                    <button id="btn-deixar" value="${pessoa_id}" class="btn btn-danger">Deixar</button> 
                `);
            } 
        });
    });
});