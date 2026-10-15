<?php
require 'init.php';

require_once 'admin/model/Planta.php';
require_once 'admin/model/PlantaImagem.php';
require_once 'admin/model/Fachada.php';

$id = isset($_GET['id']) ? (int) trim($_GET["id"]) : 0;

$model_planta = new Model_Planta();
$planta = $model_planta->find($id);

$planta_imagem = new Model_PlantaImagem();
$plantas_imagens = $planta_imagem->search(null, array("plantas_id = ?" => $id));

$title = !empty($planta['nome']) ? $planta['nome'] : "Planta Baixa Geminadas";

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Gostei da planta baixa '" . $title . "' (ID: " . $id . ") no site Geminadas.com e gostaria de solicitar mais informações e orçamento.");

$plantas_destaque = $model_planta->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
$model_fachada = new Model_Fachada();
$fachadas_destaque = $model_fachada->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> | Geminadas.com</title>
    <meta name="description" content="Projeto de planta baixa <?= htmlspecialchars($title) ?> para casas geminadas e sobrados. Confira detalhes e solicite seu orçamento no WhatsApp.">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= htmlspecialchars($title) ?> | Geminadas.com">
    <?php if (!empty($planta['foto'])) { ?>
        <meta property="og:image" content="http://www.geminadas.com/uploads/plantas/<?= $planta['foto'] ?>">
    <?php } ?>

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

    <!-- Breadcrumb / Mini Hero -->
    <section class="hero-modern" style="padding: 40px 0 45px 0;">
        <div class="container text-center">
            <div class="hero-badge"><i class="fa fa-map-o"></i> Planta Baixa Otimizada</div>
            <h1 class="hero-title" style="font-size: 32px; margin-bottom: 8px;">
                <?= htmlspecialchars($title) ?>
            </h1>
            <p class="hero-subtitle" style="font-size: 15px; margin-bottom: 0;">
                Planta arquitetônica inteligente projetada para máximo conforto, iluminação e rentabilidade na construção.
            </p>
        </div>
    </section>

    <!-- Main Project Content -->
    <div class="container" style="margin-top: 35px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="internas-box" style="margin-top: 0; padding: 30px;">
                    <!-- Image / Gallery Box -->
                    <div style="background: #fff; border: 1px solid #E2E8F0; border-radius: 14px; overflow: hidden; margin-bottom: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); text-align: center; padding: 14px;">
                        <?php if (!empty($planta['foto'])) { ?>
                            <img src="uploads/plantas/<?= htmlspecialchars($planta['foto']) ?>" alt="<?= htmlspecialchars($title) ?>" class="img-responsive center-block" style="max-height: 580px; width: auto;" />
                        <?php } ?>
                    </div>

                    <!-- Additional Gallery Photos -->
                    <?php if (is_array($plantas_imagens) && count($plantas_imagens) > 0) { ?>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 14px; margin-bottom: 28px;">
                            <?php for ($i = 0; $i < count($plantas_imagens); $i++) { ?>
                                <a href="uploads/plantas/galeria/<?= $plantas_imagens[$i]['foto'] ?>" target="_blank" style="border-radius: 8px; overflow: hidden; height: 130px; display: block; border: 1px solid #E2E8F0;">
                                    <img src="uploads/plantas/galeria/<?= $plantas_imagens[$i]['foto'] ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="Foto adicional <?= $i ?>" />
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Description -->
                    <?php if (!empty($planta['descricao'])) { ?>
                        <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 20px 24px; margin-bottom: 28px;">
                            <h3 style="font-size: 18px; font-weight: 700; color: #0F172A; margin-bottom: 8px;">
                                <i class="fa fa-info-circle" style="color: #FF7A00;"></i> Detalhes da Planta Baixa
                            </h3>
                            <p style="color: #475569; margin: 0; line-height: 1.6;">
                                <?= $planta['descricao'] ?>
                            </p>
                        </div>
                    <?php } ?>

                    <!-- WhatsApp CTA Card -->
                    <div class="whatsapp-conversion-box">
                        <div class="whatsapp-box-badge"><i class="fa fa-whatsapp"></i> Atendimento Personalizado</div>
                        <h2>Gostou da Planta <?= htmlspecialchars($title) ?>?</h2>
                        <p>Fale diretamente com nossa equipe de arquitetos no WhatsApp para receber o projeto completo cotado, cortes técnicos e especificações.</p>
                        <div>
                            <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish">
                                <i class="fa fa-whatsapp"></i> SOLICITAR ESTA PLANTA NO WHATSAPP
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plantas em Destaque -->
    <?php if (is_array($plantas_destaque) && count($plantas_destaque) > 0) { ?>
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-eye"></i> Veja Também</span>
                <h2 class="section-title">Outras Plantas Baixas</h2>
            </div>

            <div class="showcase-grid-modern">
                <?php for ($i = 0; $i < min(count($plantas_destaque), 4); $i++) { ?>
                    <?php if (!empty($plantas_destaque[$i]['foto'])) { ?>
                        <div class="showcase-card">
                            <div class="showcase-card-img">
                                <img src="uploads/plantas/<?= htmlspecialchars($plantas_destaque[$i]['foto']) ?>" alt="<?= htmlspecialchars($plantas_destaque[$i]['nome']) ?>" loading="lazy">
                            </div>
                            <div class="showcase-card-body">
                                <h3 class="showcase-card-title"><?= htmlspecialchars($plantas_destaque[$i]['nome']) ?></h3>
                                <a href="planta.php?id=<?= $plantas_destaque[$i]['id'] ?>" class="showcase-card-btn">
                                    <i class="fa fa-eye"></i> Ver Detalhes
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
