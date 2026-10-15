<?php
require 'init.php';
$page = 'como-comprar-pagar';

include_once 'admin/model/ComoComprar.php';
include_once 'admin/model/ComoPagar.php';

$model_como_comprar = new Model_ComoComprar();
$como_comprar = $model_como_comprar->find(1);

$model_como_pagar = new Model_ComoPagar();
$como_pagar = $model_como_pagar->find(1);

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Li a página de Como Comprar e Pagar e gostaria de tirar dúvidas sobre a contratação do projeto.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como Comprar e Formas de Pagamento | Geminadas.com</title>
    <meta name="description" content="Saiba como adquirir seu projeto arquitetônico na Geminadas.com. Processo simples, seguro e com fechamento direto no WhatsApp.">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/modern.css" rel="stylesheet" type="text/css" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KQXP7XG');</script>
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <?php include 'header.php'; ?>

    <section class="hero-modern" style="padding: 45px 0 50px 0;">
        <div class="container">
            <div class="hero-modern-content">
                <div class="hero-badge">
                    <i class="fa fa-shopping-cart"></i> Passo a Passo
                </div>
                <h1 class="hero-title" style="font-size: 34px;">
                    Como <span>Comprar e Pagar</span>
                </h1>
                <p class="hero-subtitle">
                    Processo rápido, transparente e seguro. Escolha seu modelo, tire dúvidas com o arquiteto e receba os arquivos prontos para construir.
                </p>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 35px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="internas-box">
                    <h2 style="font-size: 26px; font-weight: 800; color: #0F172A; margin-bottom: 14px;">
                        <i class="fa fa-info-circle" style="color: #FF7A00;"></i> Como Funciona a Compra
                    </h2>
                    <hr>

                    <?php if (is_array($como_comprar)) { ?>
                        <?php if (!empty($como_comprar['video'])) { ?>
                            <div class="pull-right col-xs-12 col-md-5 video-box" style="margin-left: 30px; margin-bottom: 24px;">
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px;">
                                    <iframe style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" src="//www.youtube.com/embed/<?= youtube($como_comprar['video']) ?>?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php } ?>

                        <div style="font-size: 16px; line-height: 1.8; color: #334155; margin-bottom: 40px;">
                            <?= $como_comprar['texto'] ?>
                        </div>
                    <?php } ?>

                    <h2 style="font-size: 26px; font-weight: 800; color: #0F172A; margin-top: 40px; margin-bottom: 14px;">
                        <i class="fa fa-credit-card" style="color: #FF7A00;"></i> Formas de Pagamento
                    </h2>
                    <hr>

                    <?php if (is_array($como_pagar)) { ?>
                        <?php if (!empty($como_pagar['video'])) { ?>
                            <div class="pull-right col-xs-12 col-md-5 video-box" style="margin-left: 30px; margin-bottom: 24px;">
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px;">
                                    <?= $como_pagar['video'] ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div style="font-size: 16px; line-height: 1.8; color: #334155;">
                            <?= $como_pagar['texto'] ?>
                        </div>
                    <?php } ?>

                    <!-- WhatsApp CTA Card -->
                    <div class="whatsapp-conversion-box" style="margin-top: 40px;">
                        <div class="whatsapp-box-badge"><i class="fa fa-whatsapp"></i> Fechamento Rápido</div>
                        <h2>Dúvidas sobre o pagamento ou entrega?</h2>
                        <p>Nossa equipe envia as opções de pagamento (Pix, Cartão de Crédito parcelado ou Boleto) diretamente no seu WhatsApp com recibo e nota fiscal.</p>
                        <div>
                            <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish">
                                <i class="fa fa-whatsapp"></i> CONVERSAR NO WHATSAPP
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
