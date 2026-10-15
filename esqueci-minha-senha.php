<?php
require 'init.php';
include_once 'admin/model/Cliente.php';
$model_cliente = new Model_Cliente();


        if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'):

            $email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));
            $cliente = $model_cliente->search(null, array('email = ?' => $email));           
           

            if($cliente){
                $codigo = base64_encode($email);
                $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));

                $mensagem = '<p>Recebemos uma tentativa de recuperação de senha para este e-mail, caso não tenha sido você,
                    desconsidere este e-mail, caso contrário clique no link abaixo<br /> 
                    <a href="http://www.geminadas.com/recuperar/recuperar.php?codigo='.$codigo.'">Recuperar Senha</a></p>';
                $email_remetente = 'contato@geminadas.com';

                $headers = "MIME-Version: 1.1\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                $headers .= "From: $email_remetente\n";
                $headers .= "Return-Path: $email_remetente\n"; 
                $headers .= "Reply-To: $email\n"; 

               // $inserir = mysql_query("INSERT INTO 'codigos' SET codigo = '$codigo', data = '$data_expirar'");

                //if($inserir){

                    //if(mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")){

                        // echo "<script>alert('Enviamos um e-mail com um link para recuperação de senha, para o endereço de e-mail informado!');</script>";
                    //}
                //}
            }

            echo "<script>alert('Enviamos um e-mail com um link para recuperação de senha, para o endereço de e-mail informado!');</script>";
        endif;
        

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <base href="/">
        <meta charset="utf-8">
        <title>Geminadas.com - Esqueci minha senha</title>
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                <div class="col-md-12 column internas-box">
                    <h1>Esqueci minha senha</h1>

                    <hr>
                    <p>
						<br>
                        Caso tenha esquecido sua senha, por favor utilize o formulário abaixo para recuperar sua senha.<br>
                    </p>

                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="well-sm">
                                <form id="form-esqueci" method="POST" action="esqueci-minha-senha/">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                    </span>
                                                    <input type="hidden" name="acao" value="recuperar" />
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required="required" />
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-12">

                                            <button type="submit" class="btn btn-labeled btn-warning pull-right">
                                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Enviar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>	
        <script type="text/javascript" src="js/holder.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/contato.js"></script>
        <script type="text/javascript" src="js/contato_footer.js"></script>
        <script type="text/javascript" src="js/cidade_estado.js"></script>
    </body>
</html>
