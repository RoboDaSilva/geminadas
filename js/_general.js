jQuery.noConflict();
jQuery(".btn-avancar").click(function () {
    jQuery('html,body').animate({
        scrollTop: jQuery("#idPassos").offset().top},
    'slow');
});
jQuery(document).ready(function () {

    jQuery(".loading").hide();
    /*
     * Formatar Moeda
     */
    function formatReal(int) {
        var tmp = int + '';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if (tmp.length > 6)
            tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        return tmp;
    }





    var passo = "passo-1";
    /**
     * 1º Passo ########################################################################################
     */
    /* Ações Projeto Exclusivo */
    jQuery('.btn-projeto-exclusivo').click(function (e) {
        e.preventDefault();
        jQuery(".monte-seu-projeto").stop().animate({
            'opacity': '0'
        }, 200, function () {
            jQuery('.monte-seu-projeto').css('display', 'none');
            jQuery('.projeto-exclusivo').css('display', 'block');
            jQuery(".projeto-exclusivo").stop().animate({
                'opacity': '1'
            }, 200);
        });
    });
    jQuery('.projeto-exclusivo .btn-voltar').click(function (e) {
        e.preventDefault();
        jQuery(".projeto-exclusivo").stop().animate({
            'opacity': '0'
        }, 200, function () {
            jQuery('.projeto-exclusivo').css('display', 'none');
            jQuery('.monte-seu-projeto').css('display', 'block');
            jQuery(".monte-seu-projeto").stop().animate({
                'opacity': '1'
            }, 200);
        });
    });
    /* ########################## */
    var valorPlanta;
    var valorFachada;
    function generateItemPasso2(id, nome, foto, valor, valor_formatado, posicao) {

        var item = "";
        item += '<div class="col-sm-6 col-md-3 column item-box-opcao">';
        item += '<div class="panel panel-default">';
        item += '<div class="panel-body text-center">';
        if (foto != "") {
            item += '<a class="icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="" name="' + posicao + '" href="uploads/plantas/' + foto + '">';
            item += '<div id="image">';
            item += '<img class="img-responsive" src="uploads/plantas/' + foto + '" />';
            item += '</div>';
            item += '<div id="watermark"></div>';
            item += '</a>';
            item += '<div class="loading col-xs-12"><img class="center-block" src="img/ajax-loader.gif" alt="" /></div>';
        } else {
            item += '<img src="img/marcadagua-geminadas.png">';
        }
        item += '<br />';
        item += '<div class="input-group">';
        item += '<span class="input-group-addon">';
        item += '<input class="planta" name="planta" id="planta-' + id + '" type="radio" valor="' + valor + '" valor_formatado="' + valor_formatado + '" value="' + id + '">';
        item += '</span>';
        item += '<label for="planta-' + id + '" class="form-control">' + nome + '</label>';
        item += '</div>';
        item += '</div>';
        item += '</div>';
        item += '</div>';
        return item;
    } /* End function listarConteudoPasso2 */

    var idTamanhoTerreno = "";
    var idPavimentos = "";
    var quartos = "";
    var suites = "";
    var banheiros = "";
    function listarItensPasso2() {
        jQuery(".loading").show();
        jQuery("#passo-1 .btn-avancar").attr("disabled", "true");
        jQuery.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                action: "passo-1",
                tamanho_terrenos_id: idTamanhoTerreno,
                plantas_tipos_id: idPavimentos,
                quartos: quartos,
                suites: suites,
                banheiros: banheiros
            },
            success: function (response) {
                if (response['result']) {
//                    if (!response['cidade_estado']) {
//                        jQuery('#cidadeModal').modal('show');
//                        jQuery(".loading").hide();
//                        jQuery("#passo-1 .btn-avancar").removeAttr('disabled');
//                        return false;
//                    }
//
//                    jQuery('.topo-box-linhacima .cidade-estado').find('.collapse').removeClass('collapse');
                    jQuery("#passo-1").hide();
                    jQuery("#passo-2").show();
                    jQuery(".loading").hide();
                    /* Lista todas as plantas relacionadas ##################### */
                    var content = "";
                    for (var i = 0; i < response['itens'].length; i++) {
                        content += generateItemPasso2(response['itens'][i]['id'], response['itens'][i]['nome'], response['itens'][i]['foto'], response['itens'][i]['valor'], response['itens'][i]['valor_formatado'], i);
                    }

                    jQuery('#passo-2 .content').empty();
                    jQuery('#passo-2 .content').append(content);
                    /* Inicia os passos para o carregando das imagens */
                    jQuery('#passo-2 .content a.icon-gallery').css({
                        'opacity': '0',
                        'display': 'none'
                    });
                    jQuery("#passo-2 .content .loading").show();
                    /* ********************************************** */
                    jQuery("#passo-2 .content").stop().animate({
                        'opacity': '1'
                    }, 300, function () {
                        jQuery("#passo-2 .content").show();
                        jQuery('#passo-2 .icon-gallery').click(function (e) {
                            e.preventDefault();
                            jQuery('#galeriaModal .modal-dialog').css('max-width', '900px');
                            /* Atribui valores aos detalhes da planta selecionada ##################### */
                            var idPlanta = jQuery(this).attr('name');
                            var contentDetalhes = "";
                            jQuery('#galeriaModal .modal-title').empty();
                            jQuery('#galeriaModal .modal-title').append(response['itens'][idPlanta]['nome']);
                            contentDetalhes += '<div class="col-sm-12">';
                            contentDetalhes += '<div id="galleria">';
//                            if (response['itens'][idPlanta]['imagens']) {
//                                for (var i = 0; i < response['itens'][idPlanta]['imagens'].length; i++) {
//                                    contentDetalhes += '<a title="" href="uploads/plantas/galeria/' + response['itens'][idPlanta]['imagens'][i]['foto'] + '">';
//                                    contentDetalhes += '<img class="img-responsive" src="uploads/plantas/galeria/' + response['itens'][idPlanta]['imagens'][i]['foto'] + '" data-big="uploads/plantas/galeria/' + response['itens'][idPlanta]['imagens'][i]['foto'] + '" />';
//                                    contentDetalhes += '</a>';
//                                }
//                            } else {
                            contentDetalhes += '<a class="btn-img" title="" href="uploads/plantas/' + response['itens'][idPlanta]['foto'] + '">';
                            //contentDetalhes += '<div id="image">';
                            contentDetalhes += '<img height="460" src="uploads/plantas/' + response['itens'][idPlanta]['foto'] + '" data-big="uploads/plantas/' + response['itens'][idPlanta]['foto'] + '" />';
                            // contentDetalhes += '</div>';
                            contentDetalhes += '</a>';
//                            }
                            contentDetalhes += '</div><div id="watermark"></div>';
                            contentDetalhes += '</div>';
                            contentDetalhes += '<div class="descricao well col-sm-12">';
//contentDetalhes += '<h2><span><i class="fa fa-arrow-circle-down"></i></span> Descrição do projeto</h2>';
                            contentDetalhes += response['itens'][idPlanta]['descricao'];
                            contentDetalhes += '</div>';
                            jQuery('#galeriaModal .conteudo').empty();
                            jQuery('#galeriaModal .conteudo').append(contentDetalhes);
                            /* Inicia a galeria ##################### */
//                            Galleria.run('#galleria');
                            jQuery("#galleria .btn-img").parent().zoom();
                            jQuery('#galeriaModal').modal('show');
                        });
                    });
                    jQuery('#passo-2 .content a.icon-gallery img').load(function () {
                        jQuery('#passo-2 .content .loading').css('display', 'none');
                        jQuery('#passo-2 .content a.icon-gallery').css('display', 'block');
                        jQuery("#passo-2 .content a.icon-gallery").stop().animate({
                            'opacity': '1'
                        }, 300);
                    });
//                    setInterval(function() {
//                        jQuery('#passo-2 .content .loading').css('display', 'none');
//                        jQuery('#passo-2 .content a.icon-gallery').css('display', 'block');
//                        jQuery("#passo-2 .content a.icon-gallery").stop().animate({
//                            'opacity': '1'
//                        }, 300);
//                    }, 1000);
                    /* ######################################################### */

                    jQuery(".progress .progress-bar").css('width', '25%');
                    jQuery('.btn-breadcrumb').find('.active').removeClass('active');
                    jQuery(".btn-breadcrumb .btn-passo-2").removeAttr("disabled");
                    jQuery(".btn-breadcrumb .btn-passo-2").addClass("active");
                    jQuery("#passo-1 .btn-avancar").removeAttr('disabled');
                    passo = "passo-2";
                    /* Ação do input */
                    jQuery('#passo-2 input').change(function (e) {
                        e.preventDefault();
                        valorPlanta = jQuery(this).attr('valor');
//                        var valorPlantaFormat = jQuery(this).attr('valor_formatado');
//
//                        jQuery('#passo-2 #valor-total').empty();
//                        jQuery('#passo-2 #valor-total').append('<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Total: R$ ' + valorPlantaFormat);
//                        jQuery('#passo-3 #valor-total').empty();
//                        jQuery('#passo-3 #valor-total').append('<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Total: R$ ' + valorPlantaFormat);
                    });
                } else {
                    if (passo == "passo-1") {
                        alert("Não há plantas cadastradas para essa tipo de terreno e pavimento.");
                    } else {
                        jQuery('#passo-2 .content').empty();
                        jQuery('#passo-2 .content').append('<div class="warning col-xs-12"><h4><span><i class="fa fa-warning"></i></span> ' + response['error_message'] + '</h4></div>');
                        jQuery("#passo-2 .content").stop().animate({
                            'opacity': '1'
                        }, 300, function () {
                            jQuery("#passo-2 .content").show();
                        });
                    }
                    jQuery(".loading").hide();
                    jQuery("#passo-1 .btn-avancar").removeAttr('disabled');
                }
            }, error: function () {
                alert("erro");
            }
        });
    }

    jQuery('#passo-1 .btn-avancar').click(function (e) {
        e.preventDefault();
        /* Validando campos terreno e pavimentos */
        jQuery('.terreno').each(function (i) {
            if (jQuery(this).is(':checked')) {
                idTamanhoTerreno = jQuery(this).val();
            }
        });
        jQuery('.pavimentos').each(function (i) {
            if (jQuery(this).is(':checked')) {
                idPavimentos = jQuery(this).val();
            }
        });
        if (idTamanhoTerreno == "") {
            alert("Selecione a medida do seu terreno");
            return false;
        } else if (idPavimentos == "") {
            alert("Selecione o pavimento desejado");
            return false;
        } else {
            listarItensPasso2();
        }
    });
    /**
     * 2º Passo ########################################################################################
     */
    var valorFinal = "";
    jQuery('#passo-2 .form-filtro-passo-2 .btn-filtro').click(function (e) {
        e.preventDefault();
        jQuery("#passo-2 .content").stop().animate({
            'opacity': '0'
        }, 300, function () {
            jQuery("#passo-2 .content").hide();
        });
        jQuery('#passo-2 #valor-total').empty();
        jQuery('#passo-2 #valor-total').append('<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Total: R$ 0,00');
        // Validando radio terreno

        quartos = jQuery('.form-filtro-passo-2 #quartos').val();
        suites = jQuery('.form-filtro-passo-2 #suites').val();
        banheiros = jQuery('.form-filtro-passo-2 #banheiros').val();
        listarItensPasso2();
    });
    function generateItemPasso3(id, id_planta, nome, foto, valor, valor_formatado, posicao) {
        var item = "";
        item += '<div class="col-sm-6 col-md-3 column item-box-opcao">';
        item += '<div class="panel panel-default">';
        item += '<div class="panel-body text-center">';
        if (foto != "") {
            item += '<a class="icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="" name="' + posicao + '" href="uploads/fachadas/' + foto + '">';
//            item += '<a class="icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="" name="' + posicao + '" href="http://www.youtube.com/watch?v=GCZrz8siv4Q">';
            item += '<div id="image">';
            item += '<img class="img-responsive" src="uploads/fachadas/' + foto + '" />';
            item += '</div>';
            item += '<div id="watermark"></div>';
            item += '</a>';
            item += '<div class="loading col-xs-12"><img class="center-block" src="img/ajax-loader.gif" alt="" /></div>';
        } else {
            item += '<img src="img/marcadagua-geminadas.png">';
        }
        item += '<br />';
//        item += '<h1>' + nome + '</h1>';
        item += '<div class="input-group">';
        item += '<span class="input-group-addon">';
        item += '<input class="fachada" name="fachada" id="fachada-' + id + '" type="radio" valor="' + valor + '" value="' + id + '">';
        item += '</span>';
        item += '<label for="fachada-' + id + '" class="form-control">' + nome + '</label>';
        item += '</div>';
        item += '<br />';
        item += '<button class="btn btn-labeled btn-default btn-alterar-projeto-existente show" planta="' + id_planta + '" fachada="' + id + '" type="button">';
        item += '<span class="btn-label">';
        item += '<i class="glyphicon glyphicon-plus-sign"></i>';
        item += '</span>';
        item += '<span class="txt">Desejo alterar esse projeto</span>';
        item += '</button>';
//        item += '<div class="fb-share-button" data-href="http://geminadas.com/fachada/' + id + '" data-layout="button"></div>';
//        (function (d, s, id) {
//            var js, fjs = d.getElementsByTagName(s)[0];
//            if (d.getElementById(id))
//                return;
//            js = d.createElement(s);
//            js.id = id;
//            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=180361308708884";
//            fjs.parentNode.insertBefore(js, fjs);
//        }(document, 'script', 'facebook-jssdk'));
//        item += '<a href="javascript: void(0);" onclick="window.open("http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/' + id + '","ventanacompartir", "toolbar=0, status=0, width=650, height=450′);">Compartilhar no Facebook</a>';
//        item += '<a href="javascript: void(0);" onclick="window.open(\'http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/'+ id,'ventanacompartir', 'toolbar=0, status=0, width=650, height=300\');">Compartilhar</a>';
//        item += '<a href="javascript: void(0);" onclick="window.open(\'http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/'+ id,'ventanacompartir', 'toolbar=0, status=0, width=650, height=300\');">Compartilhar</a>';

        item += '<a href="' + id + '" class="btn-compartilhar-fachada"><img src="img/compartilhar.png" alt=""></a>';

//        item += '<a href="https://www.facebook.com/sharer/sharer.php?u=http://geminadas.com/fachada/' + id + '"">Compartilhar</a>';

        item += '</div>';
        item += '</div>';
        item += '</div>';
        return item;
    } /* End function listarConteudoPasso3 */

    jQuery('#passo-2 .btn-avancar').click(function (e) {
        e.preventDefault();
        var plantas_id = "";
        /* Validando campo planta */
        jQuery('.planta').each(function (i) {
            if (jQuery(this).is(':checked')) {
                plantas_id = jQuery(this).val();
            }
        });
        if (plantas_id == "") {
            alert("Selecione a planta desejada");
            return false;
        } else {
            jQuery(".loading").show();
            jQuery("#passo-2 .btn-avancar").attr("disabled", "true");
            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: {
                    action: "passo-2",
                    plantas_id: plantas_id
                },
                success: function (response) {
                    if (response['result']) {
                        jQuery("#passo-2").hide();
                        jQuery("#passo-3").show();
                        jQuery(".loading").hide();
                        var content = "";
                        for (var i = 0; i < response['itens'].length; i++) {
                            content += generateItemPasso3(response['itens'][i]['id'], response['itens'][i]['plantas_id'], response['itens'][i]['nome'], response['itens'][i]['foto'], response['itens'][i]['valor'], response['itens'][i]['valor_formatado'], i);
                        }

                        jQuery('#passo-3 .content').empty();
                        jQuery('#passo-3 .content').append(content);
                        /* Inicia os passos para o carregando das imagens */
                        jQuery('#passo-3 .content a.icon-gallery').css({
                            'opacity': '0',
                            'display': 'none'
                        });
                        jQuery("#passo-3 .content .loading").show();

                        /* Cria a ação do botão de compartilhar no facebook */
                        jQuery('.btn-compartilhar-fachada').click(function (e) {
                            e.preventDefault();
                            var id = jQuery(this).attr('href');
                            window.open("http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/" + id, "ventanacompartir", "toolbar=0, status=0, width=650, height=300");
                        });

                        /* ********************************************** */
                        jQuery("#passo-3 .content").stop().animate({
                            'opacity': '1'
                        }, 300, function () {
                            jQuery("#passo-3 .content").show();
                            /* Ações Desejo Alterar esse Projeto */
                            jQuery('.btn-alterar-projeto-existente').click(function (e) {
                                e.preventDefault();
                                var planta = jQuery(this).attr('planta');
                                var fachada = jQuery(this).attr('fachada');
                                document.getElementById("cod_planta").value = planta;
                                document.getElementById("cod_planta2").value = planta;
                                document.getElementById("cod_fachada").value = fachada;
                                document.getElementById("cod_fachada2").value = fachada;
                                jQuery(".monte-seu-projeto").stop().animate({
                                    'opacity': '0'
                                }, 200, function () {
                                    jQuery('.monte-seu-projeto').css('display', 'none');
                                    jQuery('.alterar-projeto-existente').css('display', 'block');
                                    jQuery(".alterar-projeto-existente").stop().animate({
                                        'opacity': '1'
                                    }, 200);
                                });
                            });
                            jQuery('.alterar-projeto-existente .btn-voltar').click(function (e) {
                                e.preventDefault();
                                jQuery(".alterar-projeto-existente").stop().animate({
                                    'opacity': '0'
                                }, 200, function () {
                                    jQuery('.alterar-projeto-existente').css('display', 'none');
                                    jQuery('.monte-seu-projeto').css('display', 'block');
                                    jQuery(".monte-seu-projeto").stop().animate({
                                        'opacity': '1'
                                    }, 200);
                                });
                            });
                            /* Fim Alterar projeto ################################# */

                            function jYoutube(url, size) {
                                if (url === null) {
                                    return "";
                                }

                                size = (size === null) ? "big" : size;
                                var vid;
                                var results;

                                results = url.match("[\?&amp;]v=([^&amp;#]*)");

                                vid = (results === null) ? url : results[1];

                                if (size == "small") {
                                    return "http://img.youtube.com/vi/" + vid + "/2.jpg";
                                } else {
                                    return "http://img.youtube.com/vi/" + vid + "/0.jpg";
                                }
                            }

                            jQuery('#passo-3 .icon-gallery').click(function (e) {
                                e.preventDefault();
                                jQuery('#galeriaModal .modal-dialog').css('max-width', '600px');
                                /* Atribui valores aos detalhes da fachada selecionada ##################### */
                                var idFachada = jQuery(this).attr('name');
                                var contentDetalhes = "";
                                jQuery('#galeriaModal .modal-title').empty();
                                jQuery('#galeriaModal .modal-title').append(response['itens'][idFachada]['nome']);
                                contentDetalhes += '<div class="col-sm-12">';
                                contentDetalhes += '<div id="galleria">';
                                if (response['itens'][idFachada]['video']) {
                                    contentDetalhes += '<a title="" href="' + response['itens'][idFachada]['video'] + '">';
                                    var imgUrl_big = jYoutube(response['itens'][idFachada]['video']);
                                    contentDetalhes += '<img id="zoom-video" src="' + imgUrl_big + '" data-big="' + imgUrl_big + '" />';
                                    contentDetalhes += '</a>';
                                }
                                if (response['itens'][idFachada]['imagens']) {
                                    for (var i = 0; i < response['itens'][idFachada]['imagens'].length; i++) {
                                        contentDetalhes += '<a title="" href="uploads/fachadas/galeria/' + response['itens'][idFachada]['imagens'][i]['foto'] + '">';
                                        contentDetalhes += '<img src="uploads/fachadas/galeria/' + response['itens'][idFachada]['imagens'][i]['foto'] + '" data-big="uploads/fachadas/galeria/' + response['itens'][idFachada]['imagens'][i]['foto'] + '" />';
                                        contentDetalhes += '</a>';
                                    }
                                } else {
                                    contentDetalhes += '<a title="" href="uploads/fachadas/' + response['itens'][idFachada]['foto'] + '">';
                                    contentDetalhes += '<img src="uploads/fachadas/' + response['itens'][idFachada]['foto'] + '" data-big="uploads/fachadas/' + response['itens'][idFachada]['foto'] + '" />';
                                    contentDetalhes += '</a>';
                                }
                                
                                contentDetalhes += '</div><div id="watermark"></div>';
                                contentDetalhes += '</div>';
//                                contentDetalhes += '<div class="descricao col-sm-4">';
//                                contentDetalhes += '<h3>Descrição</h3>';
//                                contentDetalhes += response['itens'][idFachada]['descricao'];
//                                contentDetalhes += '</div>';

                                jQuery('#galeriaModal .conteudo').empty();
                                jQuery('#galeriaModal .conteudo').append(contentDetalhes);
                                /* Inicia a galeria ##################### */
                                Galleria.run('#galleria');
//                                jQuery('#zoom-video').trigger('zoom.destroy');
                                jQuery('#galeriaModal').modal('show');
                            });

                            jQuery('#galeriaModal').on('hidden.bs.modal', function () {
                                jQuery('#galeriaModal .conteudo').empty();
                            });
                        });
                        /* esconde o carregando e mostra as imagens */
                        jQuery('#passo-3 .content a.icon-gallery img').load(function () {
                            jQuery('#passo-3 .content .loading').css('display', 'none');
                            jQuery('#passo-3 .content a.icon-gallery').css('display', 'block');
                            jQuery("#passo-3 .content a.icon-gallery").stop().animate({
                                'opacity': '1'
                            }, 300);
                        });
                        /* ######################################################### */

                        jQuery(".progress .progress-bar").css('width', '50%');
                        jQuery('.btn-breadcrumb').find('.active').removeClass('active');
                        jQuery(".btn-breadcrumb .btn-passo-3").removeAttr("disabled");
                        jQuery(".btn-breadcrumb .btn-passo-3").addClass("active");
                        jQuery("#passo-2 .btn-avancar").removeAttr('disabled');
                        passo = "passo-3";
                        /* Ação do input */
                        jQuery('#passo-3 input').change(function (e) {
                            e.preventDefault();
                            valorFachada = jQuery(this).attr('valor');
                            var valorTotal = parseFloat(valorFachada) + parseFloat(valorPlanta);
                            valorFinal = formatReal(valorTotal);
                            valorFinal = valorFinal.replace(".", "");
                            jQuery('#passo-3 #valor-total').empty();
                            jQuery('#passo-3 #valor-total').append('<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Total: R$ ' + valorFinal);
                        });
                    } else {
                        alert(response['error_message']);
                        jQuery(".loading").hide();
                        jQuery("#passo-2 .btn-avancar").removeAttr('disabled');
                    }
                }, error: function () {
                    alert("Não foi possível avançar para o próximo passo!");
                    jQuery(".loading").hide();
                    jQuery("#passo-2 .btn-avancar").removeAttr('disabled');
                }
            });
        }
    });
    /**
     * 3º Passo ########################################################################################
     */
    jQuery('#passo-3 .btn-avancar').click(function (e) {
        e.preventDefault();
        var idFachada = "";
        /* Validando campo fachada */
        jQuery('.fachada').each(function (i) {
            if (jQuery(this).is(':checked')) {
                idFachada = jQuery(this).val();
            }
        });
        if (idFachada == "") {
            alert("Selecione a fachada desejada");
            return false;
        } else {
            jQuery(".loading").show();
            jQuery("#passo-3 .btn-avancar").attr("disabled", "true");
            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: {
                    action: "passo-3",
                    id_fachada: idFachada
                },
                success: function (response) {
                    if (response['result']) {
                       //if (!response['cidade_estado']) {
                         //   jQuery('#cidadeModal').modal('show');
                           // jQuery(".loading").hide();
                           // jQuery("#passo-3 .btn-avancar").removeAttr('disabled');
                           // return false;
                       // }

                        jQuery('.topo-box-linhacima .cidade-estado').find('.collapse').removeClass('collapse');
                        jQuery("#passo-3").hide();
                        jQuery("#passo-4").show();
                        jQuery(".loading").hide();
                        var content = '';
                        content += '<form id="form-conclusao" method="POST">';
                        content += '<div class="row-fluid clearfix">';
                        content += '<div class="planta col-xs-12 col-md-6 column">';
                        content += '<h4><span><i class="fa fa-arrow-circle-down"></i></span> Sua planta</h4>';
                        content += '<div class="panel panel-default">';
                        content += '<div class="panel-body text-center">';
                        content += '<a class="icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="" href="uploads/plantas/' + response['itens_planta'][0]['foto'] + '">';
                        content += '<div id="image"><img class="img-responsive" src="uploads/plantas/' + response['itens_planta'][0]['foto'] + '" /></div><div id="watermark"></div>';
                        content += '</a>';
                        content += '<h2>' + response['itens_planta'][0]['nome'] + '</h2>';
                        //content += '<h3>R$ ' + response['itens_planta'][0]['valor'] + '</h3>';
                        content += '</div>'; // end div.panel-body
                        content += '</div>'; // end div.panel
                        content += '</div>'; // end div.planta

                        content += '<div class="fachada col-xs-12 col-md-6 column">';
                        content += '<h4><span><i class="fa fa-arrow-circle-down"></i></span> Sua fachada</h4>';
                        content += '<div class="panel panel-default">';
                        content += '<div class="panel-body text-center">';
                        content += '<a class="icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="" href="uploads/plantas/' + response['itens_fachada'][0]['foto'] + '">';
                        content += '<div id="image"><img class="img-responsive" src="uploads/fachadas/' + response['itens_fachada'][0]['foto'] + '" /></div><div id="watermark"></div>';
                        content += '</a>';
                        content += '<h2>' + response['itens_fachada'][0]['nome'] + '</h2>';
                        //                        content += '<h3>R$ ' + response['itens_fachada'][0]['valor'] + '</h3>';
                        content += '</div>'; // end div.panel-body
                        content += '</div>'; // end div.panel
                        content += '</div>'; // end div.fachada
                        content += '</div>'; // fecha Row

                        content += '<div class="row-fluid clearfix">';
                        content += '<div class="col-xs-12 col-md-12 column">';
                        content += '<div class="valor-total">';
                        content += '<h2 class="valor-total">Total: <strong>R$ ' + response['itens_venda'][0]['valor_final'] + '</strong></h2><hr>';
                        content += '</div>'; // end div.valor-total
                        content += '<h4 class="titulo"><span><i class="fa fa-arrow-circle-down"></i></span> Opcionais:</h4>';
                        if (response['opcionais']) {
                            content += '<input type="hidden" name="action" value="gravar-opcionais" />';
                            for (var i = 0; i < response['opcionais'].length; i++) {
                                content += '<div class="form-group">';
                                content += '<input type="checkbox" id="opcional-' + response['opcionais'][i]['id'] + '" class="checkbox_opcionais" name="opcionais[]" value="' + response['opcionais'][i]['id'] + '" valor="' + response['opcionais'][i]['valor'] + '" /> ';
                                content += ' <label for="opcional-' + response['opcionais'][i]['id'] + '"> ' + response['opcionais'][i]['nome'] + ' - R$ ' + response['opcionais'][i]['valor'] + '</label>';
                                content += '</div>';
                            }
                        }
                        content += '<button id="btnavancar" class="btn btn-labeled btn-warning btn-avancar pull-right" name="btnavancar" type="button">';
                        content += '<span class="btn-label"><i class="glyphicon glyphicon-forward"></i></span> Comprar';
                        content += '</button>';
                        content += '</div>'; // end div.opcionais
                        content += '</div>';
                        content += '<div class="clearfix"></div>';
                        content += '<div class="descricao col-xs-12 column">';
                        content += '<h2><span><i class="fa fa-arrow-circle-down"></i></span> Descrição do projeto</h2>';
                        content += '<div class="well">';
                        content += '<p>' + response['itens_planta'][0]['descricao'] + '</p>';
                        content += '</div>';
                        content += '<div class="col-xs-12 column">';
                        content += '<h2><span><i class="fa fa-arrow-circle-down"></i></span> Cupom de desconto</h2>';
                        content += '<div class="well">';
                        content += '<input type="text" name="cupom" id="cupom" class="form-control">';
                        content += '</div>';
                        content += '</div>'; // end div.descricao


                        content += '</form>'; // end div.clearfix

                        jQuery('#passo-4 .content').empty();
                        jQuery('#passo-4 .content').append(content);
                        jQuery("#passo-4 .content").stop().animate({
                            'opacity': '1'
                        }, 300, function () {
                            jQuery("#passo-4 .content").show();
                            /* Ação ao clicar em mais detalhes da planta ########################################## */
                            jQuery('#passo-4 .content .planta .icon-gallery').click(function (e) {
                                e.preventDefault();
                                jQuery('#galeriaModal .modal-dialog').css('max-width', '900px');
                                /* Atribui valores aos detalhes da planta selecionada ##################### */
                                var contentDetalhes = "";
                                jQuery('#galeriaModal .modal-title').empty();
                                jQuery('#galeriaModal .modal-title').append(response['itens_planta'][0]['nome']);
                                contentDetalhes += '<div class="col-sm-12">';
                                contentDetalhes += '<div id="galleria">';
//                                if (response['itens_planta'][0]['imagens']) {
//                                    for (var i = 0; i < response['itens_planta'][0]['imagens'].length; i++) {
//                                        contentDetalhes += '<a title="" href="uploads/plantas/galeria/' + response['itens_planta'][0]['imagens'][i]['foto'] + '">';
//                                        contentDetalhes += '<img src="uploads/plantas/galeria/' + response['itens_planta'][0]['imagens'][i]['foto'] + '" data-big="uploads/plantas/galeria/' + response['itens_planta'][0]['imagens'][i]['foto'] + '" />';
//                                        contentDetalhes += '</a>';
//                                    }
//                                } else {
                                contentDetalhes += '<a class="btn-img" title="" href="uploads/plantas/' + response['itens_planta'][0]['foto'] + '">';
                                contentDetalhes += '<img height="460" src="uploads/plantas/' + response['itens_planta'][0]['foto'] + '" data-big="uploads/plantas/' + response['itens_planta'][0]['foto'] + '" /><div id="watermark"></div>';
                                contentDetalhes += '</a>';
//                                }

                                contentDetalhes += '</div>';
                                contentDetalhes += '</div>';
                                contentDetalhes += '<div class="descricao well col-sm-12">';
//contentDetalhes += '<h2><span><i class="fa fa-arrow-circle-down"></i></span> Descrição do projeto</h2>';
                                contentDetalhes += response['itens_planta'][0]['descricao'];
                                contentDetalhes += '</div>';
                                jQuery('#galeriaModal .conteudo').empty();
                                jQuery('#galeriaModal .conteudo').append(contentDetalhes);
                                /* Inicia a galeria ##################### */
//                                Galleria.run('#galleria');
                                jQuery("#galleria .btn-img").parent().zoom();
                                jQuery('#galeriaModal').modal('show');
                            });
                            /* Ação ao clicar em mais detalhes da fachada ########################################## */
                            function jYoutube(url, size) {
                                if (url === null) {
                                    return "";
                                }
                                size = (size === null) ? "big" : size;
                                var vid;
                                var results;

                                results = url.match("[\?&amp;]v=([^&amp;#]*)");
                                vid = (results === null) ? url : results[1];

                                if (size == "small") {
                                    return "http://img.youtube.com/vi/" + vid + "/2.jpg";
                                } else {
                                    return "http://img.youtube.com/vi/" + vid + "/0.jpg";
                                }
                            }

                            jQuery('#passo-4 .content .fachada .icon-gallery').click(function (e) {
                                e.preventDefault();
                                jQuery('#galeriaModal .modal-dialog').css('max-width', '600px');
                                /* Atribui valores aos detalhes da fachada selecionada ##################### */
                                var contentDetalhes = "";
                                jQuery('#galeriaModal .modal-title').empty();
                                jQuery('#galeriaModal .modal-title').append(response['itens_fachada'][0]['nome']);
                                contentDetalhes += '<div class="col-sm-12">';
                                contentDetalhes += '<div id="galleria">';
                                if (response['itens_fachada'][0]['video']) {
                                    contentDetalhes += '<a title="" href="' + response['itens_fachada'][0]['video'] + '">';
                                    var imgUrl_big = jYoutube(response['itens_fachada'][0]['video']);
                                    contentDetalhes += '<img id="zoom-video" src="' + imgUrl_big + '" data-big="' + imgUrl_big + '" />';
                                    contentDetalhes += '</a>';
                                }
                                if (response['itens_fachada'][0]['imagens']) {
                                    for (var i = 0; i < response['itens_fachada'][0]['imagens'].length; i++) {
                                        contentDetalhes += '<a title="" href="uploads/fachadas/galeria/' + response['itens_fachada'][0]['imagens'][i]['foto'] + '">';
                                        contentDetalhes += '<img src="uploads/fachadas/galeria/' + response['itens_fachada'][0]['imagens'][i]['foto'] + '" data-big="uploads/fachadas/galeria/' + response['itens_fachada'][0]['imagens'][i]['foto'] + '" />';
                                        contentDetalhes += '</a>';
                                    }
                                } else {
                                    contentDetalhes += '<a title="" href="uploads/fachadas/' + response['itens_fachada'][0]['foto'] + '">';
                                    contentDetalhes += '<div id="image"><img src="uploads/fachadas/' + response['itens_fachada'][0]['foto'] + '" data-big="uploads/fachadas/' + response['itens_fachada'][0]['foto'] + '" /></div><div id="watermark"></div>';
                                    contentDetalhes += '</a>';
                                }

                                contentDetalhes += '</div><div id="watermark"></div>';
                                contentDetalhes += '</div>';
                                jQuery('#galeriaModal .conteudo').empty();
                                jQuery('#galeriaModal .conteudo').append(contentDetalhes);
                                /* Inicia a galeria ##################### */
                                Galleria.run('#galleria');
                                jQuery('#galeriaModal').modal('show');
                            });

                            jQuery('#galeriaModal').on('hidden.bs.modal', function () {
                                jQuery('#galeriaModal .conteudo').empty();
                            });
                        });
                        var valorTotalParaSomar = response['itens_venda'][0]['valor_final_float'];
                        jQuery('#passo-4 .opcionais input[type="checkbox"]').change(function (e) {
                            e.preventDefault();
                            var valor = jQuery(this).attr('valor');
                            if (jQuery(this).is(':checked')) {
                                valorTotalParaSomar = parseFloat(valorTotalParaSomar) + parseFloat(valor);
                            } else {
                                valorTotalParaSomar = parseFloat(valorTotalParaSomar) - parseFloat(valor);
                            }
                            valorTotalParaSomar = valorTotalParaSomar.toFixed(2);
                            var valorFinal = formatReal(valorTotalParaSomar);
                            valorFinal = valorFinal.replace(".", "");
                            jQuery('#passo-4 .opcionais .valor-total strong').empty();
                            jQuery('#passo-4 .opcionais .valor-total strong').append('R$ ' + valorFinal);
                        });
                        /* Adiciona a ação ao botão comprar do 4º Passo */
                        jQuery('#passo-4 .btn-avancar').click(function (e) {
                            e.preventDefault();
                            // Verifica se pelo menos 1 campo do checkbox foi selecionado ############
                            var todos_inputs = document.getElementsByClassName('checkbox_opcionais');
                            var opcionais = false;
                            for (var i = 0; i < todos_inputs.length; i++) {
                                if (todos_inputs[i].checked == true) {
                                    window.console.log(todos_inputs[i].value);
                                    opcionais = true;
                                }
                            }
                            /* ######################################################################## */

                            if (!opcionais) {
                                /* Se não houver nenhum opcional selecionado */
                                jQuery("#passo-4 .resumo").stop().animate({
                                    'opacity': '0'
                                }, 200, function () {
                                    jQuery("#passo-4 .resumo").hide();
                                    jQuery("#passo-4 .identificacao").show();
                                    jQuery("#passo-4 .identificacao").stop().animate({
                                        'opacity': '1'
                                    }, 200);
                                });
                            } else {
                                /* Se houver pelo menos um opcional selecionado */
                                jQuery(".loading").show();
                                jQuery("#passo-4 .btn-avancar").attr("disabled", "true");
                                var dados = jQuery('#form-conclusao').serialize();
                                jQuery.ajax({
                                    url: "projeto-actions.php",
                                    type: "POST",
                                    dataType: "json",
                                    data: dados,
                                    success: function (response) {
                                        if (response['result']) {

                                            jQuery("#passo-4 .resumo").stop().animate({
                                                'opacity': '0'
                                            }, 200, function () {
                                                jQuery("#passo-4 .resumo").hide();
                                                jQuery("#passo-4 .identificacao").show();
                                                jQuery("#passo-4 .identificacao").stop().animate({
                                                    'opacity': '1'
                                                }, 200);
                                            });
                                            jQuery(".loading").hide();
                                            jQuery("#passo-4 .btn-avancar").removeAttr('disabled');
                                        }
                                    }, error: function () {
                                        alert("Erro!");
                                    }
                                });
                            }
                        });
                        jQuery(".progress .progress-bar").css('width', '75%');
                        jQuery('.btn-breadcrumb').find('.active').removeClass('active');
                        jQuery(".btn-breadcrumb .btn-passo-4").removeAttr("disabled");
                        jQuery(".btn-breadcrumb .btn-passo-4").addClass("active");
                        //jQuery(".btn-breadcrumb .btn-passo-1").attr("disabled", "disabled");
                        //jQuery(".btn-breadcrumb .btn-passo-2").attr("disabled", "disabled");
                        //jQuery(".btn-breadcrumb .btn-passo-3").attr("disabled", "disabled");
                        jQuery(".loading").hide();
                        jQuery("#passo-3 .btn-avancar").removeAttr('disabled');
                        passo = "passo-4";
                    } else {
                        alert(response['error_message']);
                        jQuery(".loading").hide();
                        jQuery("#passo-3 .btn-avancar").removeAttr('disabled');
                    }
                }, error: function () {
                    alert("Não foi possível avançar para o próximo passo!");
                    jQuery(".loading").hide();
                    jQuery("#passo-3 .btn-avancar").removeAttr('disabled');
                }
            });
        }
    });
    /**
     * 4º Passo ########################################################################################
     */

    jQuery("#passo-4 #form-login").validate({
        submitHandler: function (form) {
            jQuery("#usuario .btn-logar").attr("disabled", "true");
            var dados = jQuery(form).serialize();
            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function (response) {
                    if (response['result']) {
                        alert(response['message']);
                        if (response['permissao']) {
                            window.location.href = 'checkout/';
                        }
                        jQuery("#usuario .btn-logar").removeAttr('disabled');
                    }
                }, error: function () {
                    alert("Erro");
                }
            });
        },
        // Define as regras
        rules: {
            email: {
                required: true
            },
            senha: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Digite seu E-mail"
            },
            senha: {
                required: "Digite sua senha"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'label',
        highlight: function (label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function (label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');
        }
    });
    jQuery("#form-esqueci-minha-senha").validate({
        submitHandler: function (form) {
            var dados = jQuery(form).serialize();
            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function (response) {
                    if (response['result']) {
                        alert("Solicitação de alteração de senha enviado com sucesso!");
//                        jQuery("#passo-4 .resumo").stop().animate({
//                            'opacity': '0'
//                        }, 200, function() {
//                            jQuery("#passo-4 .resumo").hide();
//                            jQuery("#passo-4 .identificacao").show();
//                            jQuery("#passo-4 .identificacao").stop().animate({
//                                'opacity': '1'
//                            }, 200);
//                        });
                    }
                }, error: function () {
                    alert("Erro");
                }
            });
        },
        // Define as regras
        rules: {
            email: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Digite seu E-mail"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'label',
        highlight: function (label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function (label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');
        }
    });
    jQuery("#passo-4 #form-cadastro").validate({
        submitHandler: function (form) {



            jQuery("#cadastro .btn-logar").attr("disabled", "true");
            var dados = jQuery(form).serialize();
            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function (response) {
                    if (response['result']) {
                        alert(response['message']);
                        window.location.href = 'checkout/';
                        jQuery("#cadastro .btn-logar").removeAttr('disabled');
                    } else {
                        alert(response['message']);
                    }
                }, error: function () {
                    alert("Erro");
                }
            });
        },
        // Define as regras
        rules: {
            nome: {
                required: true,
                minlength: 10
            },
            cpf: {
                required: true
            },
            rg: {
                required: true
            },
            email: {
                required: true
            },
            senha: {
                required: true,
                minlength: 6
            },
            senha2: {
                required: true,
                equalTo: "#cadastro #senha"
            },
            telefone: {
                required: true
            },
            cep: {
                required: true
            },
            endereco: {
                required: true
            },
            bairro: {
                required: true
            },
            id_cidade: {
                required: true
            }
        },
        messages: {
            nome: {
                required: "Digite seu nome",
                minlength: "Digite seu Nome e Sobrenome"
            },
            cpf: {
                required: "Digite seu CPF"
            },
            rg: {
                required: "Digite seu RG"
            },
            email: {
                required: "Digite seu E-mail"
            },
            senha: {
                required: "Digite Sua Senha",
                minlength: "A senha deve conter no mínimo 6 caracteres"
            },
            senha2: {
                required: "Repita sua senha",
                equalTo: "As Senhas devem ser idênticas"
            },
            telefone: {
                required: "Digite seu telefone"
            },
            cep: {
                required: "Digite seu CEP"
            },
            endereco: {
                required: "Digite seu endereço"
            },
            bairro: {
                required: "Digite seu bairro"
            },
            id_cidade: {
                required: "Selecione sua cidade"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'label',
        highlight: function (label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function (label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');
        }
    });
    jQuery('#cadastro #estado').change(function (e) {
        e.preventDefault();
        var estado = jQuery(this).val();
        jQuery.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                estado: estado,
                action: 'ler_cidades'
            },
            success: function (response) {
                if (response['result']) {
                    if (response['cidades']) {
                        var content = '';
                        jQuery('#cadastro #cidades_id').empty();
                        jQuery('#select2-chosen-2').empty();
                        content += '<option value=""></option>';
                        for (var i = 0; i < response['cidades'].length; i++) {
                            content += '<option value="' + response['cidades'][i]['id'] + '">' + response['cidades'][i]['cidade'] + '</option>';
                        }

                        jQuery('#cadastro #cidades_id').html(content);
                        jQuery('.form-group.cidades').show();
                    } else {
                        jQuery('.form-group.cidades').hide();
                        if (response['cidades'] != "") {
                            alert('Não existem cidades cadastradas para este estado');
                        }
                    }
                } else {
                    alert('Nenhuma cidade para este estado');
                }
            }, error: function () {
                alert("Erro");
            }
        });
    });
    /* Voltar para o 1º Passo */
    jQuery('.btn-breadcrumb .btn-passo-1').click(function (e) {
        jQuery("#passo-1").show();
        jQuery("#passo-2").hide();
        jQuery("#passo-3").hide();
        jQuery(".progress .progress-bar").css('width', '4%');
        jQuery('.btn-breadcrumb').find('.active').removeClass('active');
        jQuery(".btn-breadcrumb .btn-passo-2").attr("disabled", "disabled");
        jQuery(".btn-breadcrumb .btn-passo-1").addClass("active");
        passo = "passo-1";
    });
    /* Voltar para o 2º Passo */
    jQuery('.btn-breadcrumb .btn-passo-2').click(function (e) {
        jQuery("#passo-1").hide();
        jQuery("#passo-2").show();
        jQuery("#passo-3").hide();
        jQuery(".progress .progress-bar").css('width', '25%');
        jQuery('.btn-breadcrumb').find('.active').removeClass('active');
        jQuery(".btn-breadcrumb .btn-passo-3").attr("disabled", "disabled");
        jQuery(".btn-breadcrumb .btn-passo-2").addClass("active");
        passo = "passo-2";
    });
     /* Voltar para o 3º Passo */
    jQuery('.btn-breadcrumb .btn-passo-3').click(function (e) {
        jQuery("#passo-1").hide();
        jQuery("#passo-2").hide();
        jQuery("#passo-3").show();
        jQuery(".progress .progress-bar").css('width', '50%');
        jQuery('.btn-breadcrumb').find('.active').removeClass('active');
        jQuery(".btn-breadcrumb .btn-passo-4").attr("disabled", "disabled");
        jQuery(".btn-breadcrumb .btn-passo-3").addClass("active");
        passo = "passo-3";
    });
});
