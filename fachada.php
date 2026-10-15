<?php
require 'init.php';

require_once 'admin/model/Fachada.php';
require_once 'admin/model/FachadaImagem.php';
require_once 'admin/model/Planta.php';

$id = isset($_GET['id']) ? (int) trim($_GET["id"]) : 0;

$model_fachada = new Model_Fachada();
$fachada = $model_fachada->find($id);

$fachada_imagem = new Model_FachadaImagem();
$fachadas_imagens = $fachada_imagem->search(null, array("fachadas_id = ?" => $id));

$title = !empty($fachada['nome']) ? $fachada['nome'] : "Fachada Geminadas";

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Gostei da fachada '" . $title . "' (ID: " . $id . ") no site Geminadas.com e gostaria de solicitar mais informações e orçamento.");

$fachadas_destaque = $model_fachada->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
$model_planta = new Model_Planta();
$plantas_destaque = $model_planta->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> | Geminadas.com</title>
    <meta name="description" content="Projeto de fachada <?= htmlspecialchars($title) ?> para casas geminadas e sobrados. Confira fotos 3D e solicite seu orçamento no WhatsApp.">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= htmlspecialchars($title) ?> | Geminadas.com">
    <?php if (!empty($fachada['foto'])) { ?>
        <meta property="og:image" content="http://www.geminadas.com/uploads/fachadas/<?= $fachada['foto'] ?>">
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
            <div class="hero-badge"><i class="fa fa-paint-brush"></i> Fachada 3D</div>
            <h1 class="hero-title" style="font-size: 32px; margin-bottom: 8px;">
                <?= htmlspecialchars($title) ?>
            </h1>
            <p class="hero-subtitle" style="font-size: 15px; margin-bottom: 0;">
                Projeto de fachada moderno com excelente valorização estética e fácil execução.
            </p>
        </div>
    </section>

    <!-- Main Project Content -->
    <div class="container" style="margin-top: 35px; margin-bottom: 60px;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="internas-box" style="margin-top: 0; padding: 30px;">
                    <!-- Image / Gallery Box -->
                    <div style="background: #000; border-radius: 14px; overflow: hidden; margin-bottom: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); text-align: center;">
                        <?php if (!empty($fachada['foto'])) { ?>
                            <img src="uploads/fachadas/<?= htmlspecialchars($fachada['foto']) ?>" alt="<?= htmlspecialchars($title) ?>" class="img-responsive center-block" style="max-height: 540px; width: auto;" />
                        <?php } ?>
                    </div>

                    <!-- Additional Gallery Photos -->
                    <?php if (is_array($fachadas_imagens) && count($fachadas_imagens) > 0) { ?>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 14px; margin-bottom: 28px;">
                            <?php for ($i = 0; $i < count($fachadas_imagens); $i++) { ?>
                                <a href="uploads/fachadas/galeria/<?= $fachadas_imagens[$i]['foto'] ?>" target="_blank" style="border-radius: 8px; overflow: hidden; height: 130px; display: block; border: 1px solid #E2E8F0;">
                                    <img src="uploads/fachadas/galeria/<?= $fachadas_imagens[$i]['foto'] ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="Foto adicional <?= $i ?>" />
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Description -->
                    <?php if (!empty($fachada['descricao'])) { ?>
                        <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 20px 24px; margin-bottom: 28px;">
                            <h3 style="font-size: 18px; font-weight: 700; color: #0F172A; margin-bottom: 8px;">
                                <i class="fa fa-info-circle" style="color: #FF7A00;"></i> Detalhes da Fachada
                            </h3>
                            <p style="color: #475569; margin: 0; line-height: 1.6;">
                                <?= $fachada['descricao'] ?>
                            </p>
                        </div>
                    <?php } ?>

                    <!-- WhatsApp CTA Card -->
                    <div class="whatsapp-conversion-box">
                        <div class="whatsapp-box-badge"><i class="fa fa-whatsapp"></i> Atendimento Personalizado</div>
                        <h2>Gostou da Fachada <?= htmlspecialchars($title) ?>?</h2>
                        <p>Fale diretamente com nossa equipe de arquitetos no WhatsApp para receber plantas técnicas, cortes e verificar compatibilidade com seu lote.</p>
                        <div>
                            <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish">
                                <i class="fa fa-whatsapp"></i> SOLICITAR ESTA FACHADA NO WHATSAPP
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fachadas em Destaque -->
    <?php if (is_array($fachadas_destaque) && count($fachadas_destaque) > 0) { ?>
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-eye"></i> Veja Também</span>
                <h2 class="section-title">Outras Fachadas Recomendadas</h2>
            </div>

            <div class="showcase-grid-modern">
                <?php for ($i = 0; $i < min(count($fachadas_destaque), 4); $i++) { ?>
                    <?php if (!empty($fachadas_destaque[$i]['foto'])) { ?>
                        <div class="showcase-card">
                            <div class="showcase-card-img">
                                <img src="uploads/fachadas/<?= htmlspecialchars($fachadas_destaque[$i]['foto']) ?>" alt="<?= htmlspecialchars($fachadas_destaque[$i]['nome']) ?>" loading="lazy">
                            </div>
                            <div class="showcase-card-body">
                                <h3 class="showcase-card-title"><?= htmlspecialchars($fachadas_destaque[$i]['nome']) ?></h3>
                                <a href="fachada.php?id=<?= $fachadas_destaque[$i]['id'] ?>" class="showcase-card-btn">
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
