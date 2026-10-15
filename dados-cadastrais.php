<?php
require 'init.php';

require 'checkAuth.php';

require_once 'admin/model/Cliente.php';
include_once 'admin/model/Cidade.php';
//include_once 'admin/model/Estado.php';

session_start();

if ($_SESSION['clientes_id']) {
    $id_cliente = $_SESSION['clientes_id'];

    $model_cliente = new Model_Cliente();
    $cliente = $model_cliente->find($id_cliente);

//    $model_estado = new Model_Estado();
//    $estados = $model_estado->fetchAll(null, 'nome');

    $model_cidade = new Model_Cidade();
    $estados = $model_cidade->fetchAll("estado");
    $cidades = $model_cidade->search(null, array('estado = ?' => $cliente['nome_estado']), null, null, 'id');
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
                <div id="cadastro" class="cadastro row column internas-box">
                    <?php require 'col-left.php'; ?>

                    <div class="col-sm-8 col-md-9">
                        <h1>Dados Cadastrais</h1>
                        <p>Preencha os campos abaixo para efetuar o seu cadastro</p>

                        <hr>

                        <form id="form-cadastro" method="POST">
                            <input type="hidden" name="action" value="cadastrar" />
                            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>" />

                            <div class="form-group col-xs-12">
                                <label for="nome">Nome Completo</label>
                                <input type="text" name="nome" id="nome" value="<?php echo $cliente['nome']; ?>" class="form-control" />
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cpf']; ?>" readonly="" disabled="" class="form-control" />
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="rg">RG</label>
                                <input type="text" name="rg" id="rg" value="<?php echo $cliente['rg']; ?>" readonly="" disabled="" class="form-control" />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="email">E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $cliente['email']; ?>" />
                                </div>
                            </div>

                            <div class="form-group senha col-sm-12">

                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-sm-6 col-md-3">
                                <label for="telefone">Telefone</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                    <input type="text" name="telefone" id="telefone" value="<?php echo $cliente['telefone']; ?>" class="form-control" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" value="<?php echo $cliente['cep']; ?>" class="form-control" />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" id="endereco" value="<?php echo $cliente['endereco']; ?>" class="form-control" />
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="complemento">Complemento</label>
                                <input type="text" name="complemento" id="complemento" value="<?php echo $cliente['complemento']; ?>" class="form-control" />
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" value="<?php echo $cliente['bairro']; ?>" class="form-control" />
                            </div>

                            <div class="clearfix"></div>


                            <div class="form-group col-sm-6">
                                <label for="estado">Estado</label>
                                <select id="estado" name="estado" class="form-control">
                                    <option value=""></option>
                                    <?php for ($i = 0; $i < count($estados); $i++) { ?>
                                        <option <?php echo ($cliente['nome_estado'] == $estados[$i]['estado']) ? 'selected' : ''; ?> value="<?php echo $estados[$i]['estado']; ?>">
                                            <?php echo $estados[$i]['estado']; ?>
                                        </option>
                                    <?php }; ?>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="cidades_id">Cidade</label>
                                <select id="cidades_id" name="cidades_id" class="form-control">
                                    <option value=""></option>
                                    <?php for ($i = 0; $i < count($cidades); $i++) { ?>
                                        <option <?php echo ($cliente['nome_cidade'] == $cidades[$i]['cidade']) ? 'selected' : ''; ?> value="<?php echo $cidades[$i]['id']; ?>">
                                            <?php echo $cidades[$i]['cidade']; ?>
                                        </option>
                                    <?php }; ?>
                                </select>
                            </div>

                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-labeled btn-success pull-right">
                                    <span class="btn-label">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span> Atualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br /><br /><br />
            </div>
        </div>

        <?php include 'footer.php'; ?>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>	
        <script type="text/javascript" src="js/holder.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/contato_footer.js"></script>
        <script type="text/javascript" src="js/cidade_estado.js"></script>
        <script type="text/javascript" src="js/general.js"></script>
        <script type="text/javascript" src="js/auth.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"/></script>
 
    <script type="text/javascript">jQuery.noConflict();
    jQuery(function($){
       $("#telefone").mask("(00) 0000-00009");
    });</script>
    </body>
</html>
