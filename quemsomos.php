<?php
require 'init.php';
$page = 'quemsomos';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos | Geminadas.com</title>
    <meta name="description" content="Conheça a história e a trajetória da Geminadas.com. Especialistas em projetos arquitetônicos de casas geminadas em todo o Brasil.">
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
                    <i class="fa fa-users"></i> Nossa História
                </div>
                <h1 class="hero-title" style="font-size: 34px;">
                    Quem <span>Somos</span>
                </h1>
                <p class="hero-subtitle">
                    Transformando ideias em projetos executáveis com inteligência de espaço e alto valor arquitetônico.
                </p>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 30px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="internas-box">
                    <h2 style="font-size: 26px; font-weight: 800; color: #0F172A; margin-bottom: 14px;">
                        Geminadas.com &bull; Especialistas em Projetos
                    </h2>
                    <hr>

                    <?php if (is_array($empresa)) { ?>
                        <?php if (!empty($empresa['video'])) { ?>
                            <div class="pull-right col-xs-12 col-md-5 video-box" style="margin-left: 30px; margin-bottom: 24px;">
                                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px;">
                                    <iframe style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" src="//www.youtube.com/embed/<?= youtube($empresa['video']) ?>?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php } ?>

                        <div style="font-size: 16px; line-height: 1.8; color: #334155;">
                            <?= $empresa['texto'] ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
