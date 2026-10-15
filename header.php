<?php
@session_start('cidade_estado');

if (empty($_SESSION['id_cidade'])) {
    $_SESSION['id_cidade'] = '6190';
    $_SESSION['cidade_estado'] = "Maringá - PR";
}

include_once 'admin/model/Empresa.php';
$model_empresa = new Model_Empresa();
$empresa = $model_empresa->find(1);

$whatsapp_number = "5544988440055";
$whatsapp_default_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Gostaria de mais informações sobre os projetos de casas geminadas.");
?>

<!-- Modern Top Utility Bar -->
<div class="topbar-modern">
    <div class="container">
        <div class="topbar-contacts">
            <a href="tel:<?= preg_replace('/[^0-9]/', '', $empresa['telefone'] ?? '44988440055') ?>">
                <i class="fa fa-phone"></i>
                <span><?= htmlspecialchars($empresa['telefone'] ?? '(44) 98844-0055') ?></span>
            </a>
            <a href="<?= $whatsapp_default_url ?>" target="_blank" rel="noopener">
                <i class="fa fa-whatsapp" style="color: #25D366;"></i>
                <span>WhatsApp: <?= htmlspecialchars($empresa['telefone'] ?? '(44) 98844-0055') ?></span>
            </a>
            <?php if (!empty($empresa['email'])) { ?>
                <a href="mailto:<?= htmlspecialchars($empresa['email']) ?>" class="hidden-xs">
                    <i class="fa fa-envelope-o"></i>
                    <span><?= htmlspecialchars($empresa['email']) ?></span>
                </a>
            <?php } ?>
            <span class="hidden-xs hidden-sm" style="color: #64748B;">
                <i class="fa fa-map-marker" style="color: #FF7A00;"></i>
                <span>Maringá - PR &bull; Atendimento em todo o Brasil</span>
            </span>
        </div>

        <div class="topbar-social">
            <span>Redes:</span>
            <?php if (!empty($empresa['facebook'])) { ?>
                <a href="<?= htmlspecialchars($empresa['facebook']) ?>" target="_blank" rel="noopener" title="Facebook"><i class="fa fa-facebook"></i></a>
            <?php } ?>
            <?php if (!empty($empresa['instagram'])) { ?>
                <a href="<?= htmlspecialchars($empresa['instagram']) ?>" target="_blank" rel="noopener" title="Instagram"><i class="fa fa-instagram"></i></a>
            <?php } ?>
            <?php if (!empty($empresa['youtube'])) { ?>
                <a href="<?= htmlspecialchars($empresa['youtube']) ?>" target="_blank" rel="noopener" title="YouTube"><i class="fa fa-youtube-play"></i></a>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modern Sticky Navbar -->
<header class="navbar-modern">
    <div class="container">
        <div class="navbar-brand-modern">
            <a href="/" title="Geminadas.com - Projetos de Casas Geminadas">
                <img src="img/logo-geminadas.png" alt="Geminadas.com" />
            </a>
        </div>

        <button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Abrir Menu">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="nav-menu-modern" id="navMenuModern">
            <li class="<?= ($page == 'index' || empty($page) || $is_index) ? 'active' : '' ?>">
                <a href="/"><i class="fa fa-home"></i> Início</a>
            </li>
            <li>
                <a href="/#idPassos" class="scroll-to-builder"><i class="fa fa-cubes"></i> Monte seu Projeto</a>
            </li>
            <li class="<?= ($page == 'prontos') ? 'active' : '' ?>">
                <a href="prontos.php"><i class="fa fa-camera"></i> Casas Prontas</a>
            </li>
            <li class="<?= ($page == 'servicos') ? 'active' : '' ?>">
                <a href="servicos.php"><i class="fa fa-briefcase"></i> Serviços</a>
            </li>
            <li class="<?= ($page == 'nossodiferencial') ? 'active' : '' ?>">
                <a href="nossodiferencial.php"><i class="fa fa-star"></i> Diferenciais</a>
            </li>
            <li class="<?= ($page == 'quemsomos') ? 'active' : '' ?>">
                <a href="quemsomos.php"><i class="fa fa-users"></i> Quem Somos</a>
            </li>
            <li class="<?= ($page == 'contato') ? 'active' : '' ?>">
                <a href="contato.php"><i class="fa fa-envelope"></i> Contato</a>
            </li>
            <li>
                <a href="<?= $whatsapp_default_url ?>" target="_blank" rel="noopener" class="btn-nav-whatsapp">
                    <i class="fa fa-whatsapp"></i> Falar com Arquiteto
                </a>
            </li>
        </ul>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.getElementById('mobileNavToggle');
    var menu = document.getElementById('navMenuModern');
    if (toggle && menu) {
        toggle.addEventListener('click', function() {
            menu.classList.toggle('show');
            var icon = toggle.querySelector('i');
            if (menu.classList.contains('show')) {
                icon.className = 'fa fa-times';
            } else {
                icon.className = 'fa fa-bars';
            }
        });
    }

    // Scroll to builder smooth
    var builderLinks = document.querySelectorAll('.scroll-to-builder');
    builderLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            var target = document.getElementById('idPassos');
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                if (menu && menu.classList.contains('show')) {
                    menu.classList.remove('show');
                }
            }
        });
    });
});
</script>
