<?php
require 'init.php';
$page = 'nossodiferencial';

include_once 'admin/model/NossoDiferencial.php';
$model_nosso_diferencial = new Model_NossoDiferencial();
$nosso_diferencial = $model_nosso_diferencial->find(1);

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Li sobre os diferenciais da Geminadas.com e gostaria de conversar sobre um projeto.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos Diferenciais | Geminadas.com</title>
    <meta name="description" content="Descubra por que a Geminadas.com é referência nacional no desenvolvimento de projetos de casas geminadas e sobrados.">
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
                    <i class="fa fa-star"></i> Qualidade Comprovada
                </div>
                <h1 class="hero-title" style="font-size: 34px;">
                    Nossos <span>Diferenciais</span>
                </h1>
                <p class="hero-subtitle">
                    Por que escolher nossos projetos para a construção da sua casa ou investimento imobiliário.
                </p>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 30px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="internas-box">
                    <h2 style="font-size: 26px; font-weight: 800; color: #0F172A; margin-bottom: 14px;">
                        Por que a Geminadas.com é a Sua Melhor Escolha?
                    </h2>
                    <hr>

                    <?php if (is_array($nosso_diferencial)) { ?>
                        <?php if (!empty($nosso_diferencial['video'])) { ?>
                            <div class="pull-right col-xs-12 col-md-5 video-box" style="margin-left: 30px; margin-bottom: 24px;">
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px;">
                                    <?php echo $nosso_diferencial['video']; ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div style="font-size: 16px; line-height: 1.8; color: #334155;">
                            <?php echo $nosso_diferencial['texto']; ?>
                        </div>
                    <?php } ?>

                    <!-- Trust Cards Grid -->
                    <div class="hero-trust-pills" style="margin-top: 40px; border-top: 1px solid #E2E8F0; padding-top: 30px;">
                        <div class="hero-trust-item" style="color: #334155;"><i class="fa fa-check-circle"></i> Aprovação Facilitada na Prefeitura</div>
                        <div class="hero-trust-item" style="color: #334155;"><i class="fa fa-pencil"></i> Projetos 100% Modificáveis</div>
                        <div class="hero-trust-item" style="color: #334155;"><i class="fa fa-bolt"></i> Envio Rápido em PDF e DWG</div>
                        <div class="hero-trust-item" style="color: #334155;"><i class="fa fa-whatsapp" style="color: #25D366;"></i> Suporte Direto com Arquitetos</div>
                    </div>

                    <div style="text-align: center; margin-top: 40px;">
                        <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish" style="display: inline-flex;">
                            <i class="fa fa-whatsapp"></i> CONVERSAR PELO WHATSAPP
                        </a>
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
