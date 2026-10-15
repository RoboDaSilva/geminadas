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
                <div class="col-md-6 column internas-box">
                    <h1>Ja sou cadastrado</h1>

                    <hr>

                    <form id="form-login" method="POST">
                        <input type="hidden" name="action" value="efetuar-login" />

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
                                
                                <a href="esqueci-minha-senha/">Esqueci minha senha</a>

                            <button class="btn btn-labeled btn-success btn-logar pull-right" type="submit">
                                <span class="btn-label">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span> Logar
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 column internas-box">
                    <h1>Sou um novo cliente</h1>

                    <hr>

                    <form id="form-pre-cadastro" method="POST" action="cadastro.php">
                        <div class="form-group col-sm-12">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input type="email" name="email" id="email" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-labeled btn-success pull-right">
                                <span class="btn-label">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span> Continuar
                            </button>
                        </div>
                    </form>
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
