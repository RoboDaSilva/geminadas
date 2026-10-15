<?php
require_once 'init.php';
$page = 'prontos';

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Vi as obras prontas no site Geminadas.com e gostaria de um projeto similar para o meu terreno.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas Prontas & Obras Executadas | Geminadas.com</title>
    <meta name="description" content="Confira vídeos e fotos de casas geminadas construídas a partir dos nossos projetos arquitetônicos. Obras reais entregues com excelência em todo o Brasil.">
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

    <!-- Hero Header -->
    <section class="hero-modern" style="padding: 50px 0 60px 0;">
        <div class="container">
            <div class="hero-modern-content">
                <div class="hero-badge">
                    <i class="fa fa-camera"></i> Portfólio & Obras Reais
                </div>
                <h1 class="hero-title" style="font-size: 36px;">
                    Casas Prontas: <span>Projetos Executados</span>
                </h1>
                <p class="hero-subtitle">
                    Acompanhe em fotos e vídeos as obras reais que saíram da planta e viraram realidade com o padrão de qualidade da Geminadas.com.
                </p>
                <div class="hero-actions">
                    <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="hero-btn-primary">
                        <i class="fa fa-whatsapp"></i> Quero um Projeto Assim no WhatsApp
                    </a>
                    <a href="/#idPassos" class="hero-btn-secondary">
                        <i class="fa fa-cubes"></i> Monte seu Projeto Agora
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Obras Grid Container -->
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-instagram"></i> Direto do Nosso Instagram</span>
                <h2 class="section-title">Confira Nossas Construções Recentes</h2>
                <p class="section-subtitle">Casas geminadas, sobrados e obras concluídas por clientes e construtores parceiros em diversas regiões do Brasil.</p>
            </div>

            <div class="row">
                <?php
                $posts = array(
                    "https://www.instagram.com/p/CeqzmxGgjfR/",
                    "https://www.instagram.com/p/CbQ00KpgxB2/",
                    "https://www.instagram.com/reel/CfwMHu3AfTc/",
                    "https://www.instagram.com/reel/CfKzzH3I-0r/",
                    "https://www.instagram.com/reel/CexDFemgwb4/",
                    "https://www.instagram.com/p/Cdtr6wRPnid/",
                    "https://www.instagram.com/reel/Cae9W9Fq1qL/",
                    "https://www.instagram.com/p/CWgMwD2AqR0/",
                    "https://www.instagram.com/p/CUI9kflgNtb/",
                    "https://www.instagram.com/p/CTnizX7gFRA/"
                );

                foreach ($posts as $post) {
                ?>
                <div class="col-md-6 col-lg-4" style="margin-bottom: 30px;">
                    <div style="background: #fff; border: 1px solid #E2E8F0; border-radius: 16px; padding: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); min-height: 480px; display: flex; align-items: center; justify-content: center;">
                        <blockquote class="instagram-media" data-instgrm-permalink="<?= $post ?>" data-instgrm-version="14" style="background:#FFF; border:0; border-radius:12px; margin: 0 auto; max-width:540px; min-width:280px; padding:0; width:100%;">
                            <div style="padding:16px; text-align: center;">
                                <a href="<?= $post ?>" target="_blank" style="color: #FF7A00; font-weight: 600;">
                                    Carregando publicação do Instagram...
                                </a>
                            </div>
                        </blockquote>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- WhatsApp Conversion Card -->
            <div class="whatsapp-conversion-box" style="margin-top: 50px;">
                <div class="whatsapp-box-badge"><i class="fa fa-home"></i> Seu Sonho Começa Aqui</div>
                <h2>Gostou de algum dos modelos de casas prontas?</h2>
                <p>Nossa equipe de arquitetura pode enviar a planta baixa e a fachada técnica de qualquer uma dessas obras para você construir no seu lote.</p>
                <div>
                    <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish">
                        <i class="fa fa-whatsapp"></i> CONVERSAR COM O ARQUITETO NO WHATSAPP
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <!-- Instagram Embed Script -->
    <script async src="//www.instagram.com/embed.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
