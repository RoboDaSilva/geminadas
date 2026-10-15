<?php
require 'init.php';
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
            <div id="cadastro" class="col-md-12 column internas-box">
                <h1>Preencha os campos abaixo para efetuar o seu cadastro</h1>

                <hr>

                <form id="form-cadastro" method="POST">
                    <input type="hidden" name="action" value="cadastrar" />

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
                            <input type="email" name="email" id="email" class="form-control" value="<?= $_POST['email']; ?>" />
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
                        <label for="telefone">Telefone Celular</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" name="telefone" id="telefone" class="form-control" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
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
    <script type="text/javascript" src="js/jquery.maskedinput.js"/></script>

<script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#telefone').mask('(99)99999-9999?');
                jQuery('#cep').mask('99999-999');

            });
</script>
 
</body>
</html>
