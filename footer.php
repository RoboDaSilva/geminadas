<?php
include_once 'admin/model/Empresa.php';
include_once 'admin/model/Servico.php';

if (!isset($empresa) || empty($empresa)) {
    $model_empresa = new Model_Empresa();
    $empresa = $model_empresa->find(1);
}

$model_servico = new Model_Servico();
$servicos = $model_servico->fetchAll();

$whatsapp_number = "5544988440055";
$whatsapp_footer_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Vim através do site Geminadas.com e gostaria de tirar dúvidas sobre os projetos.");
?>

<!-- Modern Footer -->
<footer class="footer-modern">
    <div class="container">
        <div class="footer-grid-modern">
            <!-- Coluna 1: Sobre -->
            <div class="footer-col">
                <div style="margin-bottom: 16px;">
                    <img src="img/logo-geminadas.png" alt="Geminadas.com" style="height: 42px; width: auto; max-width: 100%; filter: brightness(0) invert(1);" />
                </div>
                <p>
                    <?php if (is_array($empresa) && !empty($empresa['institucional'])) { ?>
                        <?= htmlspecialchars(substr(strip_tags($empresa['institucional']), 0, 220)) ?>...
                    <?php } else { ?>
                        Especialistas no desenvolvimento de projetos de casas geminadas funcionais, modernas e com aprovação garantida para construtores e famílias em todo o Brasil.
                    <?php } ?>
                </p>
                <div style="display: flex; gap: 10px; margin-top: 18px;">
                    <?php if (!empty($empresa['facebook'])) { ?>
                        <a href="<?= htmlspecialchars($empresa['facebook']) ?>" target="_blank" rel="noopener" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); color: #fff; font-size: 16px;" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($empresa['instagram'])) { ?>
                        <a href="<?= htmlspecialchars($empresa['instagram']) ?>" target="_blank" rel="noopener" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); color: #fff; font-size: 16px;" title="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($empresa['youtube'])) { ?>
                        <a href="<?= htmlspecialchars($empresa['youtube']) ?>" target="_blank" rel="noopener" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); color: #fff; font-size: 16px;" title="YouTube">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>

            <!-- Coluna 2: Navegação Rápida -->
            <div class="footer-col">
                <h3>Navegação</h3>
                <ul class="footer-links">
                    <li><a href="/"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Início</a></li>
                    <li><a href="/#idPassos" class="scroll-to-builder"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Monte seu Projeto</a></li>
                    <li><a href="prontos.php"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Casas Prontas (Obras)</a></li>
                    <li><a href="servicos.php"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Nossos Serviços</a></li>
                    <li><a href="nossodiferencial.php"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Nossos Diferenciais</a></li>
                    <li><a href="quemsomos.php"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Quem Somos</a></li>
                    <li><a href="contato.php"><i class="fa fa-angle-right" style="color: #FF7A00; margin-right: 6px;"></i> Fale Conosco</a></li>
                </ul>
            </div>

            <!-- Coluna 3: Atendimento Direto -->
            <div class="footer-col">
                <h3>Atendimento & WhatsApp</h3>
                <div class="footer-contact-item">
                    <i class="fa fa-phone"></i>
                    <div>
                        <strong>Telefone:</strong><br />
                        <a href="tel:<?= preg_replace('/[^0-9]/', '', $empresa['telefone'] ?? '44988440055') ?>">
                            <?= htmlspecialchars($empresa['telefone'] ?? '(44) 98844-0055') ?>
                        </a>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fa fa-whatsapp" style="color: #25D366;"></i>
                    <div>
                        <strong>WhatsApp Direto:</strong><br />
                        <a href="<?= $whatsapp_footer_url ?>" target="_blank" rel="noopener" style="color: #25D366; font-weight: 700;">
                            (44) 98844-0055
                        </a>
                    </div>
                </div>
                <?php if (!empty($empresa['email'])) { ?>
                    <div class="footer-contact-item">
                        <i class="fa fa-envelope-o"></i>
                        <div>
                            <strong>E-mail:</strong><br />
                            <a href="mailto:<?= htmlspecialchars($empresa['email']) ?>">
                                <?= htmlspecialchars($empresa['email']) ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <div class="footer-contact-item">
                    <i class="fa fa-map-marker"></i>
                    <div>
                        <strong>Localização:</strong><br />
                        Maringá - PR &bull; Atendemos todo o Brasil
                    </div>
                </div>
            </div>

            <!-- Coluna 4: Confiança & Selos -->
            <div class="footer-col">
                <h3>Garantia & Segurança</h3>
                <p style="font-size: 13px; line-height: 1.5; margin-bottom: 14px;">
                    Todos os projetos acompanham documentação completa assinada por profissionais habilitados (CAU) prontos para aprovação municipal.
                </p>
                <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; padding: 12px; margin-bottom: 16px;">
                    <div style="display: flex; align-items: center; gap: 8px; color: #4ADE80; font-size: 13px; font-weight: 700; margin-bottom: 6px;">
                        <i class="fa fa-check-circle"></i> Aprovação Garantida
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #E2E8F0; font-size: 13px; font-weight: 600;">
                        <i class="fa fa-shield" style="color: #FF7A00;"></i> Arquiteto Registrado no CAU
                    </div>
                </div>
                <img src="img/pagamento.png" alt="Formas de Pagamento" class="img-responsive" style="max-height: 38px; filter: grayscale(20%); opacity: 0.9;" />
            </div>
        </div>

        <div class="footer-bottom">
            <div>
                &copy; <?= date('Y') ?> <strong>Geminadas.com</strong>. Todos os direitos reservados.
            </div>
            <div>
                Projetos Arquitetônicos &bull; Casas Geminadas & Sobrados
            </div>
        </div>
    </div>
</footer>

<!-- Modern Floating WhatsApp Button -->
<div class="floating-whatsapp">
    <div class="floating-whatsapp-tooltip hidden-xs">
        <i class="fa fa-commenting-o" style="color: #25D366; font-size: 18px;"></i>
        <span>Olá! Fale com nosso Arquiteto no WhatsApp</span>
    </div>
    <a href="<?= $whatsapp_footer_url ?>" target="_blank" rel="noopener" class="floating-whatsapp-btn" title="Conversar no WhatsApp">
        <i class="fa fa-whatsapp"></i>
    </a>
</div>
