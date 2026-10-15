<?php
require 'init.php';
$page = 'servicos';

include_once 'admin/model/Servico.php';
$model_servico = new Model_Servico();
$servicos = $model_servico->fetchAll();

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Estava visualizando os serviços no site Geminadas.com e gostaria de solicitar um orçamento.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos Serviços | Geminadas.com</title>
    <meta name="description" content="Conheça todos os serviços prestados pela Geminadas.com: projetos arquitetônicos, complementares, maquetes 3D e assessoria técnica.">
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
                    <i class="fa fa-briefcase"></i> O que Oferecemos
                </div>
                <h1 class="hero-title" style="font-size: 34px;">
                    Nossos <span>Serviços</span>
                </h1>
                <p class="hero-subtitle">
                    Soluções completas de arquitetura e engenharia para quem deseja construir, investir ou incorporar casas geminadas com alta lucratividade.
                </p>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 30px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-12">
                <div class="internas-box">
                    <h2 style="font-size: 26px; font-weight: 800; color: #0F172A; margin-bottom: 8px;">
                        Atividades & Especialidades
                    </h2>
                    <p style="color: #64748B; font-size: 15px; margin-bottom: 24px;">
                        Confira os serviços arquitetônicos disponíveis para o seu empreendimento:
                    </p>
                    <hr>

                    <?php if (is_array($servicos) && count($servicos) > 0) { ?>
                        <div style="display: flex; flex-direction: column; gap: 16px;">
                            <?php for ($i = 0; $i < count($servicos); $i++) { ?>
                                <div class="blockquote-box">
                                    <?php if (!empty($servicos[$i]['foto'])) { ?>
                                        <div class="square">
                                            <img src="uploads/servicos/<?= htmlspecialchars($servicos[$i]['foto']) ?>" alt="<?= htmlspecialchars($servicos[$i]['titulo']) ?>" />
                                        </div>
                                    <?php } ?>
                                    <div style="flex: 1;">
                                        <h4><?= htmlspecialchars($servicos[$i]['titulo']) ?></h4>
                                        <p><?= $servicos[$i]['texto'] ?></p>
                                    </div>
                                    <div>
                                        <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-builder-next" style="padding: 10px 18px; font-size: 13px;">
                                            <i class="fa fa-whatsapp"></i> Orçar
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <p>Nenhum serviço cadastrado no momento.</p>
                    <?php } ?>

                    <!-- WhatsApp CTA Card -->
                    <div class="whatsapp-conversion-box" style="margin-top: 40px;">
                        <div class="whatsapp-box-badge"><i class="fa fa-handshake-o"></i> Atendimento Sob Medida</div>
                        <h2>Precisa de um serviço específico para sua obra?</h2>
                        <p>Nossa equipe técnica atende projetos personalizados, compatibilização de projetos e adaptações para loteamentos.</p>
                        <div>
                            <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish">
                                <i class="fa fa-whatsapp"></i> CONVERSAR COM O ARQUITETO
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
