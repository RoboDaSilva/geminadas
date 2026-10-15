<?php
require 'init.php';

include_once 'admin/model/Parceiro.php';

$model_parceiro = new Model_Parceiro();
$parceiros = $model_parceiro->fetchAll();
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
                <div class="col-md-12 column internas-box">
                    <h1>Parceiros</h1>

                    <hr>
                    
                    <?php if (is_array($parceiros)) { ?>
                        <?php for ($i = 0; $i < count($parceiros); $i++) { ?>
                            <div class="blockquote-box clearfix">
                                
								<? if(isset($parceiros[$i]['foto'])){?>
								<div class="square pull-left">
                                    <img class="img-responsive" src="uploads/parceiros/<?php echo $parceiros[$i]['foto']; ?>" alt="" />
                                </div>
                                <? } ?>
								
                                <h4><?php echo $parceiros[$i]['titulo']; ?></h4>
                                
                                <?php echo $parceiros[$i]['texto']; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
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
    </body>
</html>
