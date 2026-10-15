<?php
require 'init.php';

require 'checkAuth.php';

include_once 'admin/model/Cliente.php';
include_once 'admin/model/TamanhoTerreno.php';
include_once 'admin/model/Venda.php';
require_once 'admin/model/Venda_Item_Fachada.php';
include_once 'admin/model/Fachada.php';
include_once 'admin/model/Planta.php';
include_once 'admin/model/CidadeValor.php';
require_once 'admin/model/Opcionais.php';
require_once 'admin/model/Venda_Item_Opcional.php';

session_start();

if ($_SESSION['clientes_id']) {
    $id_cliente = $_SESSION['clientes_id'];

    $model_cliente = new Model_Cliente();
    $cliente = $model_cliente->find($id_cliente);

    $model_venda = new Model_Venda();
    $vendas = $model_venda->search(null, array("clientes_id = ?" => $id_cliente), null, null, "id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <base href="/">
        <meta charset="utf-8">
        <title>Geminadas.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css" >
        <link href="css/style.css" rel="stylesheet">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="img/favicon.png">
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
        <?php include 'header.php'; ?>

        <div class="container">
            <div class="row clearfix">
                <div class="pedidos row column internas-box">

                    <?php require 'col-left.php'; ?>

                    <div class="col-sm-8 col-md-9">
                        <h1>Meus Pedidos</h1>

                        <hr>

                        <?php if (is_array($vendas)) { ?>
                            <table class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Nº do pedido</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                        <th class="col-xs-1"></th>
                                    </tr>
                                </thead>
                                <?php for ($i = 0; $i < count($vendas); $i++) { ?>
                                    <?php
                                    $model_venda_item_fachada = new Model_Venda_Item_Fachada();
                                    $venda_item_fachada = $model_venda_item_fachada->search(null, array('vendas_id = ?' => $vendas[$i]['id']));

                                    $model_fachada = new Model_Fachada();
                                    $fachada = $model_fachada->search(null, array('id = ?' => $venda_item_fachada[0]['fachadas_id']));

                                    $model_planta = new Model_Planta();
                                    $planta = $model_planta->search(null, array('id = ?' => $fachada[0]['plantas_id']));

                                    $model_venda_item_opcional = new Model_Venda_Item_Opcional();
                                    $venda_item_opcional = $model_venda_item_opcional->search(null, array('vendas_id = ?' => $vendas[$i]['id']));
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $vendas[$i]['id']; ?></td>
                                            <td><?php echo $format->decodeDate($vendas[$i]['data']); ?></td>
                                            <td><?php echo $format->currency($vendas[$i]['valor_final'], 'floatToBr'); ?></td>
                                            <td><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $vendas[$i]['id']; ?>" class="btn btn-info btn-sm" aria-expanded="false" aria-controls="collapse<?php echo $vendas[$i]['id']; ?>">Ver detalhes <span class="caret"></span></a></td>
                                        </tr>

                                        <tr id="collapse<?php echo $vendas[$i]['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $vendas[$i]['id']; ?>">
                                            <td colspan="4">
                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Itens do pedido</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <? if(!empty($vendas[$i]['arquivo'])) { ?>
                                                        <tr>
                                                            <td>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a class="pull-left" href="uploads/projetos/<?php echo $vendas[$i]['arquivo'] ?>" target="_blank" style="max-height: 80px;">Download do Projeto (PDF)</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <? } ?>
                                                        <tr>
                                                            <td>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <img class="pull-left" src="uploads/fachadas/<?php echo $fachada[0]['foto']; ?>" style="max-height: 80px;">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading col-xs-12"><?php echo $fachada[0]['nome']; ?></h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <img class="pull-left" src="uploads/plantas/<?php echo $planta[0]['foto']; ?>" style="max-height: 80px;">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading col-xs-12"><?php echo $planta[0]['nome']; ?></h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <?php if (is_array($venda_item_opcional)) { ?>
                                                            <tr>
                                                                <td>
                                                                    <strong>SELECIONAR OPÇÃO: </strong>
                                                                    <?php for ($j = 0; $j < count($venda_item_opcional); $j++) { ?>
                                                                        <?php echo $venda_item_opcional[$j]['nome']; ?>
                                                                        <?php echo ($j + 1 == count($venda_item_opcional)) ? "" : "/"; ?>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>	
        <script type="text/javascript" src="js/holder.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/contato_footer.js"></script>
        <script type="text/javascript" src="js/cidade_estado.js"></script>
        <script type="text/javascript" src="js/auth.js"></script>
    </body>
</html>
