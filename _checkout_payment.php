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
    </head>

    <body>
        <?php include 'header.php'; ?>

        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column internas-box">
                    <div class="checkout">
                        <h1>Confirmar Projeto</h1>

                        <div class="clearfix itens-box">
                            <div class="cliente col-md-12">
                                <div class="col-md-6">
                                    <h2>Endereço de cobrança</h2>
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
                                                        Opcionais
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
                                            <h4>Valor do Orçamento: <strong>R$ <?php echo $format->currency($venda[0]['valor_final'], 'floatToBr'); ?></strong></h4>
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
