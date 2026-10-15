<?php
require 'init.php';

session_start();
$id_venda = $_SESSION['venda_id'];

include_once 'admin/model/TamanhoTerreno.php';
include_once 'admin/model/Venda.php';
include_once 'admin/model/Cliente.php';
require_once 'admin/model/Venda_Item_Fachada.php';
include_once 'admin/model/Fachada.php';
include_once 'admin/model/Planta.php';
include_once 'admin/model/CidadeValor.php';
require_once 'admin/model/Opcionais.php';
require_once 'admin/model/Venda_Item_Opcional.php';

$model_venda = new Model_Venda();
$venda = $model_venda->search(null, array('id = ?' => $id_venda));

$model_cliente = new Model_Cliente();
$cliente = $model_cliente->search(null, array('id = ?' => $venda[0]['clientes_id']));

$model_venda_item_fachada = new Model_Venda_Item_Fachada();
$venda_item_fachada = $model_venda_item_fachada->search(null, array('vendas_id = ?' => $id_venda));

$model_fachada = new Model_Fachada();
$fachada = $model_fachada->search(null, array('id = ?' => $venda_item_fachada[0]['fachadas_id']));

$model_planta = new Model_Planta();
$planta = $model_planta->search(null, array('id = ?' => $fachada[0]['plantas_id']));

$model_venda_item_opcional = new Model_Venda_Item_Opcional();
$venda_item_opcional = $model_venda_item_opcional->search(null, array('vendas_id = ?' => $id_venda));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        


<!-- Event snippet for Checkout conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-949080691/LpyNCN7ZoJEBEPOkx8QD',
      'transaction_id': '',
      'event_callback': callback
  });
  return false;
}
</script>


    <base href="/">
        <meta charset="utf-8">
        <title>Geminadas.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="img/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="fonts/stylesheet.css" rel="stylesheet" type="text/css" charset="utf-8" />
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">

        <style type="text/css">
            .destaque-footer { display: none; }
        </style>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KQXP7XG');</script>
<!-- End Google Tag Manager -->
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <!-- Google Code for enviar Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 949080691;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "cH38CNqplnUQ86THxAM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/949080691/?label=cH38CNqplnUQ86THxAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
        <?php include 'header.php'; ?>

        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column internas-box">
                    <div class="checkout">
                        <h1>Confirmar Projeto</h1>

                        <div class="clearfix itens-box">
                            <div class="cliente col-md-12">
                                <div class="col-md-6">
                                    <h2>Dados Cadastrais</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p>
                                                <?php echo $cliente[0]['nome']; ?><br />
                                                <?php echo $cliente[0]['endereco']; ?><br />
                                                <?php echo $cliente[0]['bairro']; ?><br />
                                                <?php echo $cliente[0]['nome_cidade']; ?> - <?php echo $cliente[0]['nome_estado']; ?><br />
                                                <?php echo $cliente[0]['cep']; ?><br />
                                                <?php echo $cliente[0]['telefone']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                  
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <h2>Detalhes do projeto</h2>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row clearfix">
                                                    <div class="planta col-xs-12 col-md-6 column">
                                                        <h4>
                                                            <span>
                                                                <i class="fa fa-arrow-circle-down"></i>
                                                            </span>
                                                            Sua planta
                                                        </h4>

                                                        <div class="panel panel-default">
                                                            <div class="panel-body text-center">
                                                               
                                                                <img height="250" src="uploads/plantas/<?php echo $planta[0]['foto']; ?>">

                                                                <h2><?php echo $planta[0]['nome']; ?></h2>
                                                                <?php
                                                                /* Verifica se a Cidade-UF selecionado tem algum valor cadastrado */
                                                                $model_cidade_valor = new Model_CidadeValor();
                                                                $cidade_valor = $model_cidade_valor->search(null, array('cidades_id = ?' => $_SESSION['id_cidade']));

                                                                /* Busca o tamanho do terreno selecionado */
                                                                $model_tamanho_terreno = new Model_TamanhoTerreno();
                                                                $tamanho_terreno = $model_tamanho_terreno->find($planta[0]['tamanho_terrenos_id']);

                                                                if (is_array($cidade_valor)) {
//                                                                    $valor_total = $planta[0]['valor'] + $cidade_valor[0]['acrescimo'] - $cidade_valor[0]['desconto'];
                                                                    $valor_total = $planta[0]['tamanho'] * ($format->decodeInt($tamanho_terreno['valor']) + $cidade_valor[0]['acrescimo'] - $cidade_valor[0]['desconto']);
                                                                } else {
//                                                                    $valor_total = $planta[0]['valor'];
                                                                    $valor_total = $planta[0]['tamanho'] * ($format->decodeInt($tamanho_terreno['valor']));
                                                                }
                                                                ?>
                                                                <!-- <h3>R$ <?php echo $format->currency($valor_total, 'floatToBr'); ?></h3>-->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="fachada col-xs-12 col-md-6 column">
                                                        <h4>
                                                            <span>
                                                                <i class="fa fa-arrow-circle-down"></i>
                                                            </span>
                                                            Sua fachada
                                                        </h4>
                                                        <div class="panel panel-default">
                                                            <div class="panel-body text-center">
                                                                <img class="img-responsive center-block" src="uploads/fachadas/<?php echo $fachada[0]['foto']; ?>" style="min-height: 100px; max-height: 250px;">
                                                                <h2><?php echo $fachada[0]['nome']; ?></h2>
                                                                <!--<h3>R$ <?php echo $format->currency($fachada[0]['valor'], 'floatToBr'); ?></h3>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if (is_array($venda_item_opcional)) { ?>
                                                <div class="opcionais col-xs-12 col-md-12 column">
                                                    <h4>
                                                        <span>
                                                            <i class="fa fa-arrow-circle-down"></i>
                                                        </span>
                                                        ORÇAMENTO SEM COMPROMISSO
                                                    </h4>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body text-center">
                                                            <ul class="list-unstyled">
                                                                <?php for ($i = 0; $i < count($venda_item_opcional); $i++) { ?>
                                                                    <li><strong><?php echo $venda_item_opcional[$i]['nome']; ?></strong> R$ <?php echo $format->currency($venda_item_opcional[$i]['valor'], 'floatToBr'); ?></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>
                                            <?php } ?>

                                            <div class="descricao col-xs-12 <?php echo (is_array($venda_item_opcional)) ? "col-md-12" : "col-md-12"; ?> column">
                                                <h2>
                                                    <span>
                                                        <i class="fa fa-arrow-circle-down"></i>
                                                    </span>
                                                    Descrição do projeto
                                                </h2>
                                                <br><br>
                                                <p><?php echo $planta[0]['descricao']; ?></p>
                                            </div>
                                        </div>

                                        <div class="descricao col-xs-12 text-right">
                                            <? if(!empty($venda[0]['codigo_desconto'])) { ?>

                                            <h2 style="color:green;">Cupom de desconto aplicado com sucesso: <strong> <?php echo $venda[0]['codigo_desconto']; ?></strong></h2>
                                            <h2> <strong> <?php 
                                            if($venda[0]['desconto'] > 0){

                                                $valorAnterior = $venda[0]['valor_final'] + $venda[0]['desconto'];
                                                echo "De: <span style=\"text-decoration: line-through;\"> R$ ". $format->currency($valorAnterior, 'floatToBr') . "</span>";
                                            
                                            } else {

                                                $porcentagem = (100-$venda[0]['porcentagem']);
                                                
                                                $valorAnterior = ($venda[0]['valor_final']/$porcentagem)*100;
                                                echo "De: <span style=\"text-decoration: line-through;\"> R$ ". $format->currency($valorAnterior, 'floatToBr') . "</span>";


                                            }


                                             ?></strong></h2>


                                            <? } ?>

                                            <h1>ORÇAMENTO: <strong>R$ <?php echo $format->currency($venda[0]['valor_final'], 'floatToBr'); ?></strong></h1>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="cliente col-md-12">
                                <form method="post" action="pagseguro.php" target="_blank">  
                                    <!-- Campos obrigatórios -->  
                                    <input type="hidden" name="vendaId" value="<?= $venda[0]['id'] ?>">
                                    <!-- submit do form (obrigatório) -->
                                    <div class="form-group col-xs-12">
                                        <button class="btn btn-labeled btn-warning pull-right" type="submit">
                                            <span class="btn-label">
                                                <i class="glyphicon glyphicon-forward"></i>
                                            </span>
                                            Confirmar Pedido
                                             <!-- Event snippet for Checkout conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-949080691/LpyNCN7ZoJEBEPOkx8QD',
      'transaction_id': '',
      'event_callback': callback
  });
  return false;
}
</script>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->

        <?php include 'footer.php'; ?>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>	
        <script type="text/javascript" src="js/holder.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/general.js"></script>
        <script type="text/javascript" src="js/contato_footer.js"></script>
        <script type="text/javascript" src="js/cidade_estado.js"></script>
        <script type="text/javascript" src="js/galleria-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.zoom.min.js"></script>
    </body>
</html>
