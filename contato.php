<?php
require 'init.php';
$page = 'contato';

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Vim através da página de contato do Geminadas.com e gostaria de conversar com o arquiteto.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco | Geminadas.com</title>
    <meta name="description" content="Entre em contato com nossa equipe de arquitetura. Atendimento direto pelo WhatsApp, telefone ou e-mail. Maringá - PR para todo o Brasil.">
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
                    <i class="fa fa-envelope"></i> Atendimento & Suporte
                </div>
                <h1 class="hero-title" style="font-size: 34px;">
                    Fale com <span>Nossos Arquitetos</span>
                </h1>
                <p class="hero-subtitle">
                    Tire dúvidas sobre projetos, solicite adaptações sob medida ou solicite seu orçamento de forma rápida e sem burocracia.
                </p>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 30px; margin-bottom: 60px;">
        <div class="row">
            <!-- Formulário de Contato -->
            <div class="col-md-7">
                <div class="internas-box" style="margin-top: 0;">
                    <h2 style="font-size: 22px; font-weight: 800; color: #0F172A; margin-bottom: 8px;">
                        Envie uma Mensagem
                    </h2>
                    <p style="color: #64748B; font-size: 14px; margin-bottom: 24px;">
                        Preencha os campos abaixo que nossa equipe responderá o mais breve possível.
                    </p>

                    <form id="form-contato" method="POST">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label-modern">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control-modern" placeholder="Seu nome" required />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label-modern">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control-modern" placeholder="seu@email.com" required />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Telefone / WhatsApp</label>
                                <input type="text" name="telefone" id="telefone" class="form-control-modern telefone" placeholder="(99) 99999-9999" required />
                            </div>

                            <div class="form-group col-md-12">
                                <label class="form-label-modern">Assunto</label>
                                <select id="assunto" name="assunto" class="form-control-modern">
                                    <option value="Dúvidas sobre Projetos">Dúvidas sobre Projetos</option>
                                    <option value="Orçamento Personalizado">Orçamento Personalizado</option>
                                    <option value="Alteração de Projeto">Alteração de Projeto</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="form-label-modern">Mensagem</label>
                                <textarea name="mensagem" id="mensagem" class="form-control-modern" rows="5" placeholder="Como podemos ajudar no seu projeto?" required></textarea>
                            </div>

                            <div class="col-md-12 text-right" style="margin-top: 10px;">
                                <button type="submit" class="btn-builder-next" style="display: inline-flex;">
                                    <i class="fa fa-paper-plane"></i> Enviar Mensagem
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informações de Contato & WhatsApp Direto -->
            <div class="col-md-5">
                <!-- Card WhatsApp Destaque -->
                <div style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); color: #fff; border-radius: 18px; padding: 30px; box-shadow: 0 10px 25px rgba(15,23,42,0.15); margin-bottom: 24px; border: 2px solid rgba(37,211,102,0.4);">
                    <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(37,211,102,0.2); border: 1px solid rgba(37,211,102,0.5); color: #4ADE80; padding: 4px 12px; border-radius: 999px; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 12px;">
                        <i class="fa fa-bolt"></i> Atendimento Mais Rápido
                    </div>
                    <h3 style="color: #fff; font-size: 20px; font-weight: 800; margin-bottom: 8px;">
                        Prefere falar no WhatsApp?
                    </h3>
                    <p style="color: #CBD5E1; font-size: 14px; line-height: 1.5; margin-bottom: 20px;">
                        Fale diretamente com nosso arquiteto em tempo real para tirar dúvidas e fechar seu projeto na hora.
                    </p>
                    <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish" style="width: 100%; font-size: 15px; padding: 13px 20px;">
                        <i class="fa fa-whatsapp" style="font-size: 20px;"></i> CONVERSAR NO WHATSAPP
                    </a>
                </div>

                <!-- Detalhes do Escritório -->
                <div class="internas-box" style="margin-top: 0; padding: 28px;">
                    <h3 style="font-size: 18px; font-weight: 800; color: #0F172A; margin-bottom: 18px;">
                        <i class="fa fa-building-o" style="color: #FF7A00;"></i> Nosso Escritório
                    </h3>
                    
                    <div class="footer-contact-item" style="color: #334155; margin-bottom: 16px;">
                        <i class="fa fa-map-marker" style="color: #FF7A00; font-size: 18px;"></i>
                        <div>
                            <strong>Endereço:</strong><br />
                            <?= htmlspecialchars($empresa['endereco'] ?? '') ?> <?= htmlspecialchars($empresa['numero'] ?? '') ?><br />
                            <?= htmlspecialchars($empresa['cidade'] ?? 'Maringá') ?> - <?= htmlspecialchars($empresa['estado'] ?? 'PR') ?><br />
                            CEP: <?= htmlspecialchars($empresa['cep'] ?? '') ?>
                        </div>
                    </div>

                    <div class="footer-contact-item" style="color: #334155; margin-bottom: 16px;">
                        <i class="fa fa-phone" style="color: #FF7A00; font-size: 18px;"></i>
                        <div>
                            <strong>Telefone / WhatsApp:</strong><br />
                            <a href="tel:<?= preg_replace('/[^0-9]/', '', $empresa['telefone'] ?? '44988440055') ?>" style="color: #0F172A; font-weight: 600;">
                                <?= htmlspecialchars($empresa['telefone'] ?? '(44) 98844-0055') ?>
                            </a>
                        </div>
                    </div>

                    <?php if (!empty($empresa['email'])) { ?>
                    <div class="footer-contact-item" style="color: #334155;">
                        <i class="fa fa-envelope-o" style="color: #FF7A00; font-size: 18px;"></i>
                        <div>
                            <strong>E-mail:</strong><br />
                            <a href="mailto:<?= htmlspecialchars($empresa['email']) ?>" style="color: #FF7A00; font-weight: 600;">
                                <?= htmlspecialchars($empresa['email']) ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/contato.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        if ($.fn.mask) {
            $('.telefone').mask('(00) 00000-0000');
        }
    });
    </script>
</body>
</html>
