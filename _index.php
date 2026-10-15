<?php
require_once 'init.php';

include_once 'admin/model/TamanhoTerreno.php';
include_once 'admin/model/PlantaTipo.php';
include_once 'admin/model/Slide.php';
include_once 'admin/model/Video.php';

$model_tamanho_terreno = new Model_TamanhoTerreno();
$tamanhos_terrenos = $model_tamanho_terreno->fetchAll();

$model_slide = new Model_Slide();
//$slide = $model_slide->fetchAll();
$slide = $model_slide->search(null, null, null, 'RAND()');


$model_video = new Model_Video();
$video = $model_video->fetchAll();

$model_planta_tipo = new Model_PlantaTipo();
$plantas_tipos = $model_planta_tipo->fetchAll();

$isiPhone = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone');
$isAndroid = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'android');


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <base href="/">
        <meta charset="utf-8">
        <title>Geminadas.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="skype_toolbar" content="skype_toolbar_parser_compatible" /> 
        <link rel="shortcut icon" href="img/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="fonts/stylesheet.css" rel="stylesheet" type="text/css" charset="utf-8" />
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
        <meta name="p:domain_verify" content="7240d8cc29f3496793a34a6166f61485"/>
        <script type="text/javascript">
            function reEnable() {
                return true;
            }

            //if IE4+
            document.onselectstart = new Function("return false");
            document.oncontextmenu = new Function("return false");
            //if NS6
            if (window.sidebar) {
                document.onmousedown = disableselect;
                document.onclick = reEnable;
            }


        </script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KQXP7XG');</script>
<!-- End Google Tag Manager -->
    </head>

    <body ondragstart='return false'>
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <script type="text/javascript">
  /* <![CDATA[ */
  goog_snippet_vars = function() {
    var w = window;
    w.google_conversion_id = 949080691;
    w.google_conversion_label = "cH38CNqplnUQ86THxAM";
    w.google_remarketing_only = false;
  }
  // DO NOT CHANGE THE CODE BELOW.
  goog_report_conversion = function(url) {
    goog_snippet_vars();
    window.google_conversion_format = "3";
    var opt = new Object();
    opt.onload_callback = function() {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  }
  var conv_handler = window['google_trackConversion'];
  if (typeof(conv_handler) == 'function') {
    conv_handler(opt);
  }
}
/* ]]> */

</script>
<script type="text/javascript"
  src="//www.googleadservices.com/pagead/conversion_async.js">
</script>
        <!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/', 'ventanacompartir', "toolbar=0, status=0, width=650, height=450");">Compartilhar no Facebook</a>-->

        <!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/' + id + '','ventanacompartir', 'toolbar=0, status=0, width=650, height=300');">Compartilhar</a>-->
        <!--        <a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/'+ id,'ventanacompartir', 'toolbar=0, status=0, width=650, height=300');">Compartilhar</a>-->


        <div class="f-loading">
            <img class="f-loading-image" src="img/ajax-loader.gif" alt="Loading..." />
        </div>
        <?php include 'header.php'; ?>

        <div class="modal fade" id="galeriaModal" tabindex="-1" role="dialog" aria-labelledby="galeriaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="galeriaModalLabel"><!-- Título da galeria --></h4>
                    </div>

                    <div class="modal-body">
                        <div class="conteudo row clearfix">
                            <div class="col-sm-8">
                                <div id="galleria">
                                    <!-- Imagens da galeria -->
                                </div>
                            </div>
                            <div class="descricao col-sm-4">
                                <h2><span><i class="fa fa-arrow-circle-down"></i></span> Descrição</h2>
                                <!-- Descrição da galeria -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column">

                    <?php if (is_array($slide)) { ?>

                        <?
                            if($isiPad || $isiPhone || $isAndroid){
                        ?>
                        <div class="row clearfix">
                            <div class="carousel-inner" role="listbox">
                                <?php for ($i = 0; $i < count($slide); $i++) { ?>
                                    <div class="item <? if ($i == 0) { ?> active <? } ?> text-center" >
                                        <img src="uploads/slide/<?= $slide[$i]['imagem_mobile'] ?>" class="center-block img-responsive">
                                        <? if (isset($slide[$i]['titulo'])) { ?>
                                        <div class="carousel-caption">
                                            <h1 style="color:<?= $slide[$i]['cor'] ?>"><?= $slide[$i]['titulo'] ?></h1>
                                        </div>
                                        <? } ?>
                                    </div>
                                <?php } ?>                        
                            </div>
                        </div>

                        <?
                            } else {
                        ?>

                        <div class="row clearfix">
                            <div class="carousel-inner" role="listbox">
                                <?php for ($i = 0; $i < count($slide); $i++) { ?>
                                    <div class="item <? if ($i == 0) { ?> active <? } ?>">
                                        <img src="uploads/slide/<?= $slide[$i]['imagem'] ?>">
                                        <? if (isset($slide[$i]['titulo'])) { ?>
                                        <div class="carousel-caption">
                                            <h1 style="color:<?= $slide[$i]['cor'] ?>"><?= $slide[$i]['titulo'] ?></h1>
                                        </div>
                                        <? } ?>
                                    </div>
                                <?php } ?>                        
                            </div>
                        </div>
                        <!--
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->

                        <? } ?>


                    <?php } else { ?>
                        <div class="row clearfix">
                            <div class="col-md-12 column text-center topo-box-frase">
                                <h1>Monte seu projeto de casa geminada em minutos!</h1>
                            </div>
                            <div class="ornament-topo-listrado">
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>

            <!-- Projeto Exclusivo -->
            <div class="projeto-exclusivo col-md-12 column collapse fade" onload="loadMask()">
                <div class="row clearfix">
                    <div id="projeto-exclusivo" class="row clearfix itens-box">
                        <div class="col-md-12 column">
                            <h2><span><i class="fa fa-arrow-right"></i></span> Monte seu projeto exclusivo</h2>
                            <h3>Preencha os campos abaixo que enviaremos um orçamento com base nas informações</h3>
                        </div>

                        <div class="col-xs-12">
                            <div class="content row clearfix">
                                <form id="form-projeto-exclusivo" method="POST" enctype="multipart/form-data">
                                    <legend class="col-xs-12">
                                        <span><i class="fa fa-arrow-circle-down"></i></span> 
                                        Informações sobre o Projeto
                                    </legend>

                                    <div class="form-group col-md-6">
                                        <label for="terreno">Quais são as medidas do seu terreno?</label>
                                        <input type="text" name="terreno" id="terreno" class="form-control" placeholder="Ex: 5 metros" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="pavimentos">Quantos pavimentos você deseja?</label>
                                        <input type="text" name="pavimentos" id="pavimentos" class="form-control" placeholder="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="obs_planta">Observações da Planta</label>
                                        <textarea name="obs_planta" id="obs_planta" class="form-control" rows="6" cols="15"></textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="obs_fachada">Observações da Fachada</label>
                                        <textarea name="obs_fachada" id="obs_fachada" class="form-control" rows="6" cols="15"></textarea>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-12">
                                        <label for="arquivo">Envie fotos ou referências de como gostaria que fosse seu projeto</label>
                                        <input type="file" name="arquivo" id="arquivo" />
                                        <p class="help-block"><small class="f-description">Arquivo para envio (Extensões: .pdf, .doc, .xdoc, .xlsx).</small></p>
                                    </div>

                                    <div class="clearfix"></div>
                                    <br />
                                    <div class="form-group col-xs-12">
                                        <legend>
                                            <span><i class="fa fa-arrow-circle-down"></i></span> 
                                            Informações Pessoais
                                        </legend>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nome">Nome Completo</label>
                                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Completo" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" name="telefone" id="telefone" class="form-control telefone" placeholder="Telefone" />
                                    </div>

                                    <div class="form-group col-xs-9 col-md-4">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" name="cidade" id="cidade_ex" class="form-control" placeholder="Sua cidade" />
                                    </div>

                                    <div class="form-group col-xs-3 col-md-2">
                                        <label for="estado">Estado</label>
                                        <input type="text" name="estado" id="estado_ex" class="form-control" maxlength="2" placeholder="UF" />
                                    </div>
                                   
                                    
                                    <div class="col-xs-12">
                                    <br><br>
                                        
                                       

                                        <button type="submit" class="btn btn-labeled btn-warning pull-right f-button">
                                            <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Enviar
                                        </button>
                                        <button type="button" class="btn btn-labeled btn-primary pull-left btn-voltar">
                                            <span class="btn-label"><i class="glyphicon glyphicon-backward"></i></span>Voltar
                                        </button>

                                         
                                    </div>
                                   <div class="g-recaptcha pull-right" data-sitekey="6LfcWigUAAAAALmuRvwhkZqsvETTVYY0x81poJZf"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desejo alterar um projeto existente -->
            <div class="alterar-projeto-existente col-md-12 column collapse fade" onload="loadMask()">
                <div class="row clearfix">
                    <div id="alterar-projeto-existente" class="row clearfix itens-box">
                        <div class="col-md-12 column">
                            <h2><span><i class="fa fa-arrow-right"></i></span> Desejo alterar um projeto existente</h2>
                            <h3>Preencha os campos abaixo que enviaremos um orçamento com base nas informações</h3>
                        </div>

                        <div class="col-xs-12">
                            <div class="content row clearfix">
                                <form id="form-alterar-projeto-existente" method="POST" enctype="multipart/form-data">
                                    <legend class="col-xs-12">
                                        <span><i class="fa fa-arrow-circle-down"></i></span> 
                                        Informações sobre o Projeto
                                    </legend>

                                    <div class="form-group col-md-6">
                                        <label for="cod_planta">Código da Planta</label>
                                        <input type="hidden" name="cod_planta" id="cod_planta" />
                                        <input type="text" name="cod_planta2" id="cod_planta2" class="form-control" disabled="" placeholder="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="cod_fachada">Código da Fachada</label>
                                        <input type="hidden" name="cod_fachada" id="cod_fachada" />
                                        <input type="text" name="cod_fachada2" id="cod_fachada2" class="form-control" disabled="" placeholder="" />
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-12">
                                        <label for="arquivo">Enviar arquivo de referência</label>
                                        <input type="file" name="arquivo" id="arquivo" />
                                        <p class="help-block"><small class="f-description">Arquivo para envio (Extensões: .pdf, .doc, .xdoc, .xlsx).</small></p>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="observacoes">Observações</label>
                                        <textarea name="observacoes" id="observacoes" class="form-control" rows="6" cols="15"></textarea>
                                    </div>

                                    <div class="clearfix"></div>
                                    <br />
                                    <div class="form-group col-xs-12">
                                        <legend>
                                            <span><i class="fa fa-arrow-circle-down"></i></span> 
                                            Informações Pessoais
                                        </legend>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nome">Nome Completo</label>
                                        <input type="text" name="nome" id="nome2" class="form-control" placeholder="Nome Completo" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" name="email" id="email2" class="form-control" placeholder="E-mail" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" name="telefone" id="telefone2" class="form-control telefone" placeholder="Telefone" />
                                    </div>

                                    <div class="form-group col-xs-9 col-md-4">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" name="cidade" id="cidade2" class="form-control" placeholder="Sua cidade" />
                                    </div>

                                    <div class="form-group col-xs-3 col-md-2">
                                        <label for="estado">Estado</label>
                                        <input type="text" name="estado" id="estado2" class="form-control" maxlength="2" placeholder="UF" />
                                    </div>

                                   
                                   
                                    
                                    <div class="col-xs-12">
                                        
                                        <button type="submit" class="btn btn-labeled btn-warning pull-right">
                                            <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Enviar
                                        </button>
                                        <button type="button" class="btn btn-labeled btn-primary pull-left btn-voltar">
                                            <span class="btn-label"><i class="glyphicon glyphicon-backward"></i></span>Voltar
                                        </button>


                                    </div>

                                    <!--<div class="g-recaptcha pull-right" data-sitekey="6LfcWigUAAAAALmuRvwhkZqsvETTVYY0x81poJZf"></div>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monte seu Projeto -->
            <div class="monte-seu-projeto" id="idPassos">
                <div class="row clearfix">
                    <div id="bc2" class="btn-group btn-breadcrumb">
                        <div class="btn btn-default"><img src="img/icon-geminadas.png"></div>
                        <div class="btn btn-default btn-passo-1 active"><div>1º Passo</div></div>
                        <div class="btn btn-default btn-passo-2" disabled="disabled"><div>2º Passo</div></div>
                        <div class="btn btn-default btn-passo-3" disabled="disabled"><div>3º Passo</div></div>			
                        <div class="btn btn-default btn-passo-4" disabled="disabled"><div>4º Passo</div></div>			
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" style="width: 4%;">

                        </div>
                    </div>
                </div>

                <div id="passo-1" class="row clearfix itens-box">
                    <div class="col-md-12 column">
                        <h2><span><i class="fa fa-arrow-right"></i></span> Terrenos e Pavimentos</h2>
                        <h3>Qual a medida de frente do seu terreno?</h3>
                    </div>

                    <form id="form-terrenos-pavimentos" name="terrenosPavimentos" method="POST">
                        <div class="loading col-xs-12 collapse"><img class="center-block" src="img/ajax-loader.gif" alt="" /></div>

                        <div class="clearfix">
                            <?php if (is_array($tamanhos_terrenos)) { ?>
                                <?php for ($i = 0; $i < count($tamanhos_terrenos); $i++) { ?>
                                    <div class="col-sm-6 col-md-3 column item-box-opcao">
                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                                <img src="img/marcadagua-geminadas2.png">
                                                <h1><?php echo number_format($tamanhos_terrenos[$i]['tamanho']); ?>m</h1>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input class="terreno" name="terreno" id="tam-terreno-<?php echo $tamanhos_terrenos[$i]['id']; ?>" type="radio" value="<?php echo $tamanhos_terrenos[$i]['id']; ?>">
                                                    </span>
                                                    <label for="tam-terreno-<?php echo $tamanhos_terrenos[$i]['id']; ?>" class="form-control"><?php echo $tamanhos_terrenos[$i]['descricao']; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 column">
                            <h3>Quantos pavimentos você deseja?</h3>
                        </div>

                        <?php if (is_array($plantas_tipos)) { ?>
                            <?php for ($i = 0; $i < count($plantas_tipos); $i++) { ?>
                                <div class="form-group col-sm-6 col-md-4 column">					
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input class="pavimentos" name="pavimentos" id="pavimento-<?php echo $plantas_tipos[$i]['id']; ?>" type="radio" value="<?php echo $plantas_tipos[$i]['id']; ?>">
                                        </span>
                                        <label for="pavimento-<?php echo $plantas_tipos[$i]['id']; ?>" class="form-control"><?php echo $plantas_tipos[$i]['nome']; ?></label>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <hr>

                        <div class="clearfix"></div>
                        <div class="col-xs-12 column">
                            <button class="btn btn-labeled btn-warning btn-avancar pull-right" type="submit">
                                <span class="btn-label">
                                    <i class="glyphicon glyphicon-forward"></i>
                                </span>
                                Avançar
                            </button>
                            <div class="pull-left">
                                <button class="btn btn-labeled btn-default btn-projeto-exclusivo show" type="button">
                                    <span class="btn-label">
                                        <i class="glyphicon glyphicon-plus-sign"></i>
                                    </span>
                                    Desejo um projeto exclusivo
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- End passo-1 -->

                <div id="passo-2" class="row clearfix itens-box collapse">
                    <div class="col-md-12 column">
                        <h2><span><i class="fa fa-arrow-right"></i></span> Escolha sua Planta</h2>
                    </div>

                    <div class="col-xs-12">
                        <div class="clearfix">
                            <form class="form-filtro-passo-2" action="">
                                <div class="control-group col-xs-12">
                                    <div class="controls">
                                        <label>Filtre sua busca:</label>
                                        <select id="quartos" name="quartos">
                                            <option value="">---</option>
                                            <option value="2">2 Quartos</option>
                                            <option value="3">3 Quartos</option>
                                            <option value="4">4 Quartos</option>
                                        </select>

                                        <select id="suites" name="suites">
                                            <option value="">---</option>
                                            <option value="1">1 Suíte</option>
                                            <option value="2">2 Suítes</option>
                                            <option value="3">3 Suítes</option>
                                            <option value="0">Sem Suíte</option>
                                        </select>

                                        <select id="banheiros" name="banheiros">
                                            <option value="">---</option>
                                            <option value="1">1 Banheiro</option>
                                            <option value="2">2 Banheiros</option>
                                            <option value="3">3 Banheiros</option>
                                        </select>

                                        <!--<button class="esp btn btn-default btn-xs" type="button">-->
                                        <button class="btn btn-labeled btn-warning btn-sm btn-filtro" type="button">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End div do filtro -->

                    <form class="form" action="">
                        <div class="clearfix">
                            <div class="loading col-xs-12"><img class="center-block" src="img/ajax-loader.gif" alt="" /></div>
                            <div class="content fade">
                                <!-- Todo o conteudo será exibido aqui! -->
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="col-md-12 column">
                                    <button class="btn btn-labeled btn-warning btn-avancar pull-right" type="submit">
                                        <span class="btn-label">
                                            <i class="glyphicon glyphicon-forward"></i>
                                        </span>
                                        Avançar
                                    </button>

                                    <div class="pull-left">
                                        <button class="btn btn-labeled btn-default btn-projeto-exclusivo show" type="button">
                                            <span class="btn-label">
                                                <i class="glyphicon glyphicon-plus-sign"></i>
                                            </span>
                                            Desejo um projeto exclusivo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- End passo-2 -->

                <div id="passo-3" class="row clearfix itens-box collapse">
                    <div class="col-md-12 column">
                        <h2><span><i class="fa fa-arrow-right"></i></span> Escolha sua Fachada</h2>
                    </div>

                    <form class="form" action="">
                        <div class="clearfix">
                            <div class="loading col-xs-12"><img class="center-block" src="img/ajax-loader.gif" alt="" /></div>
                            <div class="content fade">
                                <!-- Todo o conteudo será exibido aqui! -->
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="col-md-12 column">
                                    <button id="btnavancar" class="btn btn-labeled btn-warning btn-avancar pull-right" name="btnavancar" type="button">
                                        <span class="btn-label">
                                            <i class="glyphicon glyphicon-forward"></i>
                                        </span>
                                        Gerar Projeto
                                    </button>

                                    <div class="pull-left">
                                        <button class="btn btn-labeled btn-default btn-projeto-exclusivo show" type="button">
                                            <span class="btn-label">
                                                <i class="glyphicon glyphicon-plus-sign"></i>
                                            </span>
                                            Desejo um projeto exclusivo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- End passo-3 -->

                <div id="passo-4" class="row clearfix itens-box collapse" onload="loadMask()"><!-- collapse -->
                    <div class="col-md-12 column">
                        <h2><span><i class="fa fa-arrow-right"></i></span> Conclusão do seu projeto</h2>
                    </div>

                    <!--                            <form id="form-conclusao" method="POST">-->
                    <div class="clearfix">
                        <div class="loading col-xs-12"><img class="center-block" src="img/ajax-loader.gif" alt="" /></div>
                        <div class="resumo">
                            <div class="content"><!-- fade -->
                                <!-- Todo o conteudo será exibido aqui! -->
                            </div>

                            <hr>
                            <div class="clearfix">
                                <div class="col-md-12 column">
                                    <button id="btnavancar" class="btn btn-labeled btn-warning btn-avancar pull-right" name="btnavancar" type="button">
                                        <span class="btn-label">
                                            <i class="glyphicon glyphicon-forward"></i>
                                        </span>
                                        Comprar
                                    </button>

                                    <div class="pull-left">
                                        <button class="btn btn-labeled btn-default btn-projeto-exclusivo show" type="button">
                                            <span class="btn-label">
                                                <i class="glyphicon glyphicon-plus-sign"></i>
                                            </span>
                                            Desejo um projeto exclusivo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</form>-->

                    <div class="identificacao collapse fade"><!--collapse fade-->
                        <div class="col-md-12 column">
                            <h3>Efetue seu login ou faça um novo cadastro para concluir sua compra</h3>
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a data-toggle="tab" role="tab" href="#usuario">
                                    <i class="glyphicon glyphicon-user"></i> Usuário
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" role="tab" href="#cadastro">
                                    <i class="glyphicon glyphicon-plus"></i> Cadastre-se
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="usuario" class="tab-pane fade in active">
                                <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-md-12 column">
                                            <form id="form-login" method="POST">
                                                <input type="hidden" name="action" value="efetuar-login" />
                                                <input type="hidden" name="gerar_venda" value="ok" />

                                                <div class="form-group col-xs-12">
                                                    <label for="email">E-mail</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                        <input type="email" name="email" id="email" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group col-xs-12">
                                                    <label for="senha">Senha</label>
                                                    <input type="password" name="senha" id="senha" class="form-control">
                                                </div>

                                                <div class="form-group col-xs-12">
                                                    <button class="btn btn-labeled btn-success btn-logar pull-right" type="submit">
                                                        <span class="btn-label">
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        </span> Logar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="esqueci-minha-senha" class="tab-pane fade">
                                <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-md-12 column">
                                            <form id="form-esqueci-minha-senha" method="POST">
                                                <input type="hidden" name="action" value="esqueci-minha-senha" />

                                                <div class="form-group col-xs-12 ">
                                                    <label for="email">E-mail</label>
                                                    <input type="email" name="email" id="email" class="form-control">
                                                </div>

                                                <div class="form-group col-xs-12 ">
                                                    <button class="btn btn-labeled btn-success pull-right" type="submit">
                                                        <span class="btn-label">
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        </span> Enviar E-mail
                                                    </button>
                                                    <button class="btn btn-labeled btn-primary pull-left btn-voltar" type="button" data-toggle="tab" role="tab" href="#usuario">
                                                        <span class="btn-label">
                                                            <i class="glyphicon glyphicon-backward"></i>
                                                        </span>
                                                        Voltar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="cadastro" class="tab-pane fade" onload="loadMask()">
                                <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-md-12 column">
                                            <form id="form-cadastro" method="POST">
                                                <input type="hidden" name="action" value="cadastrar" />
                                                <input type="hidden" name="gerar_venda" value="ok" />

                                                <div class="form-group col-xs-12">
                                                    <label for="nome">Nome Completo</label>
                                                    <input type="text" name="nome" id="nome" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="cpf">CPF</label>
                                                    <input type="text" name="cpf" id="cpf" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="rg">RG</label>
                                                    <input type="text" name="rg" id="rg" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="email">E-mail</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                        <input type="email" name="email" id="email" class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="form-group senha col-sm-3">
                                                    <label for="senha">Senha</label>
                                                    <input type="password" name="senha" id="senha" class="form-control" />
                                                </div>

                                                <div class="form-group senha-2 col-sm-3">
                                                    <label for="senha2">Repita sua Senha</label>
                                                    <input type="password" name="senha2" id="senha2" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-4 col-md-3">
                                                    <label for="telefone">Telefone</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                                        <input type="text" name="telefone" id="telefone" class="form-control telefone" />
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-md-3">
                                                    <label for="cep">CEP</label>
                                                    <input type="text" name="cep" id="cep" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="endereco">Endereço</label>
                                                    <input type="text" name="endereco" id="endereco" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="complemento">Complemento</label>
                                                    <input type="text" name="complemento" id="complemento" class="form-control" />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="bairro">Bairro</label>
                                                    <input type="text" name="bairro" id="bairro" class="form-control" />
                                                </div>

                                                <div class="clearfix"></div>

                                                <div class="form-group col-sm-6">
                                                    <label for="estados">Estado</label>
                                                    <select required="" id="estado" name="estado" class="form-control">
                                                        <option value="">Escolha o estado</option>
                                                        <option value="AC" >Acre</option>
                                                        <option value="AL" >Alagoas</option>
                                                        <option value="AP" >Amap&aacute;</option>
                                                        <option value="AM" >Amazonas</option>
                                                        <option value="BA" >Bahia</option>
                                                        <option value="CE" >Cear&aacute;</option>
                                                        <option value="DF" >Distrito Federal</option>
                                                        <option value="ES" >Esp&iacute;rito Santo</option>
                                                        <option value="GO" >Goi&aacute;s</option>
                                                        <option value="MA" >Maranh&atilde;o</option>
                                                        <option value="MT" >Mato Grosso</option>
                                                        <option value="MS" >Mato Grosso do Sul</option>
                                                        <option value="MG" >Minas Gerais</option>
                                                        <option value="PR" >Paran&aacute;</option>
                                                        <option value="PB" >Para&iacute;ba</option>
                                                        <option value="PA" >Par&aacute;</option>
                                                        <option value="PE" >Pernambuco</option>
                                                        <option value="PI" >Piau&iacute;</option>
                                                        <option value="RJ" >Rio de Janeiro</option>
                                                        <option value="RN" >Rio Grande do Norte</option>
                                                        <option value="RS" >Rio Grande do Sul</option>
                                                        <option value="RO" >Rondonia</option>
                                                        <option value="RR" >Roraima</option>
                                                        <option value="SC" >Santa Catarina</option>
                                                        <option value="SE" >Sergipe</option>
                                                        <option value="SP" >S&atilde;o Paulo</option>
                                                        <option value="TO" >Tocantins</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="cidades_id">Cidade</label>
                                                    <select required="" id="cidades_id" name="cidades_id" class="form-control">
                                                        <option value=""></option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-xs-12">
                                                    <button type="submit" class="btn btn-labeled btn-success pull-right">
                                                        <span class="btn-label">
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        </span> Cadastrar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Identificação -->

                </div><!-- End passo-4 -->
            </div>
        </div>
    </div>
</div><!-- end container -->

<div class="container">
    <div class="row">
        <div class="col-md12">
            <h1>Fachadas em Destaque</h1>
        </div>

        <?php
            include_once 'admin/model/Fachada.php';
            $model_fachada = new Model_Fachada();
            $fachadas = $model_fachada->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
        ?>
         <?php for ($i = 0; $i < count($fachadas); $i++) { ?>
                <?php if (!empty($fachadas[$i]['foto'])) { ?>
                <div class="col-md-3 well img-thumbnail">            
           
                    <div class="item <?php echo ($i == 0) ? "active" : "" ?>">
                        <a href="fachada/<?php echo $fachadas[$i]['id']; ?>">
                            <figure>
                                <img src="uploads/fachadas/<?php echo $fachadas[$i]['foto']; ?>" class="img-responsive" style="width: 100%;">
                            </figure>
                        </a>
                    </div>
                
                </div>
            <?php } ?>
        <?php } ?>

    </div>
</div>

<br><br>

<div class="container">
    <div class="row">
        <div class="col-md12">
            <h1>Plantas em Destaque</h1>
        </div>

        <?php
            include_once 'admin/model/Planta.php';
            $model_planta = new Model_Planta();
            $plantas = $model_planta->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
        ?>
         <?php for ($i = 0; $i < count($plantas); $i++) { ?>
                <?php if (!empty($plantas[$i]['foto'])) { ?>
                <div class="col-md-3 well img-thumbnail">            
           
                    <div class="item <?php echo ($i == 0) ? "active" : "" ?>">
                        <a href="planta/<?php echo $plantas[$i]['id']; ?>">
                            <figure>
                                <img src="uploads/plantas/<?php echo $plantas[$i]['foto']; ?>" class="img-responsive" style="width: 100%;">
                            </figure>
                        </a>
                    </div>
                
                </div>
            <?php } ?>
        <?php } ?>

    </div>
</div>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-md12">
            <h1>Vídeos em Destaque</h1>
        </div>

        
         <?php for ($i = 0; $i < count($video); $i++) { ?>
                <?php if (!empty($video[$i]['url'])) { 


                    $str = $video[$i]['url'];
                    $regex = "#youtu(be.com|.b)(/v/|/watch\\?v=|e/|/watch(.+)v=)(.{11})#";   
                    preg_match_all($regex , $str, $matches);

                    if(!empty($matches[4])){
                        $codigos_unicos = array();
                        foreach($matches[4] as $code)
                        {
                            if(!in_array($code,$codigos_unicos))
                                array_push($codigos_unicos,$code);

                        }

                        $imgVideo = "http://i1.ytimg.com/vi/".$codigos_unicos[0]."/hqdefault.jpg"; 

                    }



                    ?>
                <div class="col-md-3 well img-thumbnail">            
           
                    <div class="item <?php echo ($i == 0) ? "active" : "" ?>">
                        <a href="<?php echo $video[$i]['url']; ?>" target="_blank">
                            <figure>
                                <img src="<?=$imgVideo?>" class="img-responsive" style="width: 100%;">
                            </figure>
                        </a>
                    </div>
                
                </div>
            <?php } ?>
        <?php } ?>

    </div>
</div>
<br><br>


<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
<script type="text/javascript" src="js/holder.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/projeto-exclusivo.js"></script>
<script type="text/javascript" src="js/alterar-projeto-existente.js"></script>
<script type="text/javascript" src="js/contato_footer.js"></script>
<script type="text/javascript" src="js/cidade_estado.js"></script>
<script type="text/javascript" src="js/galleria-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.zoom.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"/></script>

<script type="text/javascript">
                                function loadMask() {
                                    alert('ok');
                                    document.getElementsByClassName('telefone').mask('(99)99999-9999?');
                                    document.getElementbyId('cep').mask('99999-999');
                                }

                                jQuery(document).ready(function () {
                                    jQuery('.telefone').mask('(99)99999-9999?');
                                    jQuery('#cep').mask('99999-999');
                                    // Initialize Galleria
                                    Galleria.loadTheme('js/galleria.classic.js');
                                    Galleria.configure({
                                        imageCrop: false,
                                        transition: 'fade'
                                    });
// Efeito Zoom
                                    Galleria.on('image', function (e) {
                                        jQuery(e.imageTarget).parent().zoom();
                                    });
                                });
</script>

</body>
</html>
