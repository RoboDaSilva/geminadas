<?php
require_once 'init.php';

include_once 'admin/model/TamanhoTerreno.php';
include_once 'admin/model/PlantaTipo.php';
include_once 'admin/model/Slide.php';
include_once 'admin/model/Video.php';
include_once 'admin/model/Fachada.php';
include_once 'admin/model/Planta.php';

$model_tamanho_terreno = new Model_TamanhoTerreno();
$tamanhos_terrenos = $model_tamanho_terreno->fetchAll();

$model_slide = new Model_Slide();
$slide = $model_slide->search(null, null, null, 'RAND()');

$model_video = new Model_Video();
$video = $model_video->fetchAll();

$model_planta_tipo = new Model_PlantaTipo();
$plantas_tipos = $model_planta_tipo->fetchAll();

$model_fachada = new Model_Fachada();
$fachadas_destaque = $model_fachada->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
$countFachadas = is_countable($fachadas_destaque) ? count($fachadas_destaque) : 0;

$model_planta = new Model_Planta();
$plantas_destaque = $model_planta->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
$countPlantas = is_countable($plantas_destaque) ? count($plantas_destaque) : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geminadas.com | Projetos de Casas Geminadas e Sobrados</title>
    <meta name="description" content="Monte seu projeto de casa geminada online em 4 passos. Escolha o terreno, a planta ideal e a fachada 3D. Projetos com aprovação garantida e suporte direto no WhatsApp.">
    <meta name="keywords" content="casas geminadas, projetos de casas, planta baixa, fachadas modernas, sobrados, projetos arquitetônicos">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Geminadas.com - Projetos de Casas Geminadas e Sobrados">
    <meta property="og:description" content="Escolha seu terreno, planta e fachada e receba o orçamento detalhado direto no WhatsApp com aprovação garantida.">
    <meta property="og:image" content="http://www.geminadas.com/img/logo-geminadas.png">
    <meta property="og:url" content="http://www.geminadas.com/">

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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <!-- Header Global -->
    <?php include 'header.php'; ?>

    <!-- Modal de Galeria / Zoom -->
    <div class="modal fade" id="galeriaModal" tabindex="-1" role="dialog" aria-labelledby="galeriaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 16px; overflow: hidden; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.25);">
                <div class="modal-header" style="background: #0F172A; color: #fff; padding: 16px 24px; border: none;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #fff; opacity: 0.8; font-size: 28px;">&times;</button>
                    <h4 class="modal-title" id="galeriaModalLabel" style="color: #fff; font-weight: 700; margin: 0;">Visualização do Projeto</h4>
                </div>
                <div class="modal-body" style="padding: 24px; background: #fff;">
                    <div class="conteudo"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Vídeo -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 16px; overflow: hidden; border: none; background: #000;">
                <div class="modal-body" style="padding: 0; position: relative;">
                    <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 14px; top: 10px; color: #fff; z-index: 10; font-size: 32px; opacity: 0.9;">&times;</button>
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" src="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-modern">
        <div class="container">
            <div class="hero-modern-content">
                <div class="hero-badge">
                    <i class="fa fa-star"></i> Projetos de Arquitetura Especializados
                </div>
                <h1 class="hero-title">
                    Monte seu Projeto de Casa Geminada <span>em Minutos</span>
                </h1>
                <p class="hero-subtitle">
                    Escolha a medida do seu terreno, combine a planta ideal e uma fachada moderna. Receba o orçamento detalhado e tire todas as dúvidas direto no WhatsApp com o arquiteto.
                </p>
                <div class="hero-actions">
                    <a href="/#idPassos" class="hero-btn-primary scroll-to-builder">
                        <i class="fa fa-cubes"></i> Começar a Montar Agora
                    </a>
                    <a href="prontos.php" class="hero-btn-secondary">
                        <i class="fa fa-camera"></i> Ver Obras Prontas
                    </a>
                </div>
                <div class="hero-trust-pills">
                    <div class="hero-trust-item"><i class="fa fa-check-circle"></i> +1.000 Projetos Entregues</div>
                    <div class="hero-trust-item"><i class="fa fa-shield"></i> Arquitetos Registrados no CAU</div>
                    <div class="hero-trust-item"><i class="fa fa-building-o"></i> Aprovação em Prefeitura Garantida</div>
                    <div class="hero-trust-item"><i class="fa fa-whatsapp" style="color: #25D366;"></i> Fechamento Rápido no WhatsApp</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Configurator Section -->
    <section class="monte-seu-projeto-section" id="idPassos">
        <div class="container">
            
            <!-- Modo de Construção (Abas) -->
            <div class="builder-modes-bar">
                <button type="button" class="builder-mode-btn active" data-mode="builder">
                    <i class="fa fa-cubes"></i> 1. Monte seu Projeto (Passo a Passo)
                </button>
                <button type="button" class="builder-mode-btn" data-mode="exclusivo">
                    <i class="fa fa-pencil-square-o"></i> 2. Projeto Personalizado do Zero
                </button>
                <button type="button" class="builder-mode-btn" data-mode="alterar">
                    <i class="fa fa-sliders"></i> 3. Alterar Projeto Existente
                </button>
            </div>

            <!-- Stepper Progress Bar -->
            <div class="monte-seu-projeto">
                <div class="modern-stepper-wrapper">
                    <div style="position: relative;">
                        <div class="stepper-progress-fill"></div>
                        <ul class="modern-stepper">
                            <li class="stepper-item active" data-step="1">
                                <div class="stepper-circle">1</div>
                                <span class="stepper-label">Medida do Terreno</span>
                            </li>
                            <li class="stepper-item" data-step="2">
                                <div class="stepper-circle">2</div>
                                <span class="stepper-label">Planta Baixa</span>
                            </li>
                            <li class="stepper-item" data-step="3">
                                <div class="stepper-circle">3</div>
                                <span class="stepper-label">Fachada 3D</span>
                            </li>
                            <li class="stepper-item" data-step="4">
                                <div class="stepper-circle">4</div>
                                <span class="stepper-label">Resumo & WhatsApp</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Card Container do Configurador -->
                <div class="builder-box">

                    <!-- Loading Spinner -->
                    <div class="loading text-center" style="display: none; padding: 40px 0;">
                        <i class="fa fa-spinner fa-spin fa-3x" style="color: #FF7A00;"></i>
                        <p style="margin-top: 14px; font-weight: 600; color: #64748B;">Carregando opções com as medidas selecionadas...</p>
                    </div>

                    <!-- PASSO 1: TERRENO E TIPO DE CONSTRUÇÃO -->
                    <div id="passo-1">
                        <div class="builder-header">
                            <span class="builder-header-badge">Passo 1 de 4</span>
                            <h2>Quanto mede a frente do seu terreno?</h2>
                            <p>Selecione a metragem frontal do seu lote e o modelo da edificação para ver as plantas compatíveis.</p>
                        </div>

                        <form id="form-terrenos-pavimentos" name="terrenosPavimentos" method="POST">
                            <!-- Metragens do Terreno -->
                            <div class="terrain-grid">
                                <?php if (is_array($tamanhos_terrenos)) { ?>
                                    <?php for ($i = 0; $i < count($tamanhos_terrenos); $i++) { ?>
                                        <div class="terrain-card">
                                            <input class="terreno" name="terreno" id="tam-terreno-<?= $tamanhos_terrenos[$i]['id'] ?>" type="radio" value="<?= $tamanhos_terrenos[$i]['id'] ?>">
                                            <div class="terrain-card-check"><i class="fa fa-check"></i></div>
                                            <i class="fa fa-arrows-h terrain-card-icon"></i>
                                            <div class="terrain-card-value"><?= number_format($tamanhos_terrenos[$i]['tamanho'], 0) ?>m</div>
                                            <div class="terrain-card-label"><?= htmlspecialchars($tamanhos_terrenos[$i]['descricao']) ?></div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <!-- Tipo de Construção (Casa ou Sobrado) -->
                            <div style="margin-top: 25px; margin-bottom: 12px; text-align: center;">
                                <h3 style="font-size: 20px; font-weight: 800; color: #0F172A;">Casa Térrea ou Sobrado?</h3>
                            </div>
                            
                            <div class="house-type-grid">
                                <?php if (is_array($plantas_tipos)) { ?>
                                    <?php for ($i = 0; $i < count($plantas_tipos); $i++) { ?>
                                        <div class="house-type-card">
                                            <input class="pavimentos" name="pavimentos" id="pavimento-<?= $plantas_tipos[$i]['id'] ?>" type="radio" value="<?= $plantas_tipos[$i]['id'] ?>">
                                            <div class="house-type-card-icon">
                                                <i class="fa fa-building-o"></i>
                                            </div>
                                            <div class="house-type-card-info">
                                                <h4><?= htmlspecialchars($plantas_tipos[$i]['nome']) ?></h4>
                                                <p>Ideal para seu terreno</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <div class="builder-actions">
                                <div></div>
                                <button type="button" class="btn-builder-next" id="btnAvancarPasso1">
                                    <span>Avançar para Escolha da Planta</span>
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div><!-- End Passo 1 -->

                    <!-- PASSO 2: ESCOLHA DA PLANTA -->
                    <div id="passo-2" style="display: none;">
                        <div class="builder-header">
                            <span class="builder-header-badge">Passo 2 de 4</span>
                            <h2>Escolha a Planta Baixa Ideal</h2>
                            <p>Utilize os filtros abaixo para encontrar o número de quartos e banheiros que melhor atendem você.</p>
                        </div>

                        <!-- Filtros de Busca -->
                        <div class="filter-bar-modern">
                            <div class="filter-bar-title">
                                <i class="fa fa-filter" style="color: #FF7A00;"></i> Filtrar:
                            </div>
                            <div class="filter-bar-controls">
                                <select id="quartos" name="quartos" class="filter-select">
                                    <option value="">Todos os Quartos</option>
                                    <option value="2">2 Quartos</option>
                                    <option value="3">3 Quartos</option>
                                    <option value="4">4 Quartos</option>
                                </select>

                                <select id="suites" name="suites" class="filter-select">
                                    <option value="">Todas as Suítes</option>
                                    <option value="1">1 Suíte</option>
                                    <option value="2">2 Suítes</option>
                                    <option value="3">3 Suítes</option>
                                    <option value="0">Sem Suíte</option>
                                </select>

                                <select id="banheiros" name="banheiros" class="filter-select">
                                    <option value="">Todos os Banheiros</option>
                                    <option value="1">1 Banheiro</option>
                                    <option value="2">2 Banheiros</option>
                                    <option value="3">3 Banheiros</option>
                                </select>

                                <button class="btn-filter-apply btn-filtro" type="button">
                                    <i class="fa fa-search"></i> Filtrar Plantas
                                </button>
                            </div>
                        </div>

                        <!-- Container dinâmico das plantas -->
                        <div class="content"></div>

                        <div class="builder-actions">
                            <button type="button" class="btn-builder-back stepper-item" data-step="1">
                                <i class="fa fa-arrow-left"></i> Voltar ao Terreno
                            </button>
                            <button type="button" class="btn-builder-next" id="btnAvancarPasso2">
                                <span>Avançar para a Fachada</span>
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div><!-- End Passo 2 -->

                    <!-- PASSO 3: ESCOLHA DA FACHADA -->
                    <div id="passo-3" style="display: none;">
                        <div class="builder-header">
                            <span class="builder-header-badge">Passo 3 de 4</span>
                            <h2>Escolha a Fachada 3D do seu Projeto</h2>
                            <p>Selecione o estilo visual que mais agrada. Você também pode solicitar alterações personalizadas na fachada.</p>
                        </div>

                        <!-- Container dinâmico das fachadas -->
                        <div class="content"></div>

                        <div class="builder-actions">
                            <button type="button" class="btn-builder-back stepper-item" data-step="2">
                                <i class="fa fa-arrow-left"></i> Voltar à Planta
                            </button>
                            <button type="button" class="btn-builder-next" id="btnavancarPasso3">
                                <span>Gerar Resumo do Projeto</span>
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </div><!-- End Passo 3 -->

                    <!-- PASSO 4: RESUMO & CONVERSÃO WHATSAPP -->
                    <div id="passo-4" style="display: none;">
                        <div class="builder-header">
                            <span class="builder-header-badge" style="background: rgba(37, 211, 102, 0.15); color: #16A34A; border-color: rgba(37, 211, 102, 0.3);">
                                <i class="fa fa-check-circle"></i> Conclusão do Projeto
                            </span>
                            <h2>Resumo Completo do seu Projeto</h2>
                            <p>Revise a planta e a fachada escolhidas e fale diretamente com o arquiteto pelo WhatsApp para fechar seu pedido.</p>
                        </div>

                        <div class="resumo">
                            <div class="content"></div>
                        </div>

                        <!-- Formulário Secundário / Opcional de Cadastro (Colapsado por padrão) -->
                        <div class="identificacao" style="display: none; margin-top: 35px; padding-top: 25px; border-top: 1px solid #E2E8F0;">
                            <h3 style="font-size: 18px; font-weight: 700; color: #0F172A; text-align: center; margin-bottom: 20px;">
                                Acesso de Usuário / Cadastro Alternativo
                            </h3>
                            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 20px;">
                                <li class="active"><a data-toggle="tab" href="#usuario"><i class="fa fa-user"></i> Já Tenho Cadastro</a></li>
                                <li><a data-toggle="tab" href="#cadastro"><i class="fa fa-user-plus"></i> Novo Cadastro</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="usuario" class="tab-pane fade in active">
                                    <form id="form-login" method="POST">
                                        <input type="hidden" name="action" value="efetuar-login" />
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label-modern">E-mail</label>
                                                <input type="email" name="email" class="form-control-modern" required />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label-modern">Senha</label>
                                                <input type="password" name="senha" class="form-control-modern" required />
                                            </div>
                                            <div class="col-xs-12 text-right">
                                                <button type="submit" class="btn btn-primary btn-logar" style="background: #FF7A00; border-color: #FF7A00; padding: 10px 24px; border-radius: 8px;">Entrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="cadastro" class="tab-pane fade">
                                    <form id="form-cadastro" method="POST">
                                        <input type="hidden" name="action" value="cadastrar" />
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label-modern">Nome Completo</label>
                                                <input type="text" name="nome" class="form-control-modern" required />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label-modern">E-mail</label>
                                                <input type="email" name="email" class="form-control-modern" required />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label-modern">Telefone / WhatsApp</label>
                                                <input type="text" name="telefone" class="form-control-modern telefone" required />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label-modern">Senha</label>
                                                <input type="password" name="senha" id="senha" class="form-control-modern" required />
                                            </div>
                                            <div class="col-xs-12 text-right">
                                                <button type="submit" class="btn btn-success" style="padding: 10px 24px; border-radius: 8px;">Cadastrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Passo 4 -->

                </div><!-- End builder-box -->
            </div><!-- End monte-seu-projeto -->

            <!-- Form: Pedido de Projeto Personalizado -->
            <div class="projeto-exclusivo" style="display: none;">
                <div class="builder-box">
                    <div class="builder-header">
                        <span class="builder-header-badge">Sob Medida</span>
                        <h2>Pedido de Projeto Personalizado</h2>
                        <p>Desenvolvemos seu projeto arquitetônico exclusivo de acordo com as dimensões exatas do seu terreno e suas preferências.</p>
                    </div>

                    <form id="form-projeto-exclusivo" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12" style="margin-bottom: 16px;">
                                <h4 style="font-weight: 700; color: #0F172A; border-bottom: 2px solid #FFEDD5; padding-bottom: 8px;">
                                    <i class="fa fa-info-circle" style="color: #FF7A00;"></i> Detalhes do Projeto
                                </h4>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Quanto mede seu terreno?</label>
                                <input type="text" name="terreno" id="terreno" class="form-control-modern" placeholder="Ex: 6m de frente x 25m de comprimento" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Casa ou Sobrado?</label>
                                <input type="text" name="pavimentos" id="pavimentos" class="form-control-modern" placeholder="Ex: Casa Térrea ou Sobrado" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Observações da Planta Baixa</label>
                                <textarea name="obs_planta" id="obs_planta" class="form-control-modern" rows="4" placeholder="Quantidade de quartos, suítes, vagas de garagem, cozinha integrada, etc."></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Observações da Fachada 3D</label>
                                <textarea name="obs_fachada" id="obs_fachada" class="form-control-modern" rows="4" placeholder="Estilo desejado: moderno, platibanda, telhado embutido, vidro, ripado, etc."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label-modern">(Opcional) Envie fotos ou referências do projeto</label>
                                <input type="file" name="arquivo" id="arquivo" class="form-control-modern" />
                                <small style="color: #64748B;">Formatos aceitos: PDF, DOC, Imagens (.jpg, .png)</small>
                            </div>

                            <div class="col-xs-12" style="margin-top: 20px; margin-bottom: 16px;">
                                <h4 style="font-weight: 700; color: #0F172A; border-bottom: 2px solid #FFEDD5; padding-bottom: 8px;">
                                    <i class="fa fa-user" style="color: #FF7A00;"></i> Seus Dados de Contato
                                </h4>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control-modern" placeholder="Seu nome completo" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control-modern" placeholder="seuemail@exemplo.com" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Telefone / WhatsApp</label>
                                <input type="text" name="telefone" id="telefone" class="form-control-modern telefone" placeholder="(99) 99999-9999" required />
                            </div>
                            <div class="form-group col-xs-8 col-md-4">
                                <label class="form-label-modern">Cidade</label>
                                <input type="text" name="cidade" id="cidade_ex" class="form-control-modern" placeholder="Sua cidade" required />
                            </div>
                            <div class="form-group col-xs-4 col-md-2">
                                <label class="form-label-modern">Estado (UF)</label>
                                <input type="text" name="estado" id="estado_ex" class="form-control-modern" maxlength="2" placeholder="PR" required />
                            </div>
                        </div>

                        <div class="builder-actions" style="margin-top: 20px;">
                            <button type="button" class="btn-builder-back btn-voltar">
                                <i class="fa fa-arrow-left"></i> Voltar ao Configurador
                            </button>
                            <button type="submit" class="btn-builder-next f-button">
                                <i class="fa fa-paper-plane"></i> Enviar Solicitação de Projeto
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Form: Desejo Alterar Projeto Existente -->
            <div class="alterar-projeto-existente" style="display: none;">
                <div class="builder-box">
                    <div class="builder-header">
                        <span class="builder-header-badge">Customização</span>
                        <h2>Desejo Alterar um Projeto Existente</h2>
                        <p>Gostou de uma das plantas ou fachadas mas quer fazer ajustes específicos? Nós adaptamos para você!</p>
                    </div>

                    <form id="form-alterar-projeto-existente" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Código da Planta</label>
                                <input type="hidden" name="cod_planta" id="cod_planta" />
                                <input type="text" name="cod_planta2" id="cod_planta2" class="form-control-modern" readonly placeholder="Selecione na galeria ou digite" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Código da Fachada</label>
                                <input type="hidden" name="cod_fachada" id="cod_fachada" />
                                <input type="text" name="cod_fachada2" id="cod_fachada2" class="form-control-modern" readonly placeholder="Selecione na galeria ou digite" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label-modern">Quais alterações você gostaria de fazer?</label>
                                <textarea name="observacoes" id="observacoes" class="form-control-modern" rows="4" placeholder="Descreva o que deseja mudar na planta ou fachada..." required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label-modern">Enviar arquivo ou foto de referência</label>
                                <input type="file" name="arquivo" id="arquivo" class="form-control-modern" />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Seu Nome</label>
                                <input type="text" name="nome" id="nome2" class="form-control-modern" placeholder="Nome Completo" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Seu E-mail</label>
                                <input type="email" name="email" id="email2" class="form-control-modern" placeholder="E-mail" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label-modern">Telefone / WhatsApp</label>
                                <input type="text" name="telefone" id="telefone2" class="form-control-modern telefone" placeholder="(99) 99999-9999" required />
                            </div>
                            <div class="form-group col-xs-8 col-md-4">
                                <label class="form-label-modern">Cidade</label>
                                <input type="text" name="cidade" id="cidade2" class="form-control-modern" placeholder="Sua cidade" required />
                            </div>
                            <div class="form-group col-xs-4 col-md-2">
                                <label class="form-label-modern">UF</label>
                                <input type="text" name="estado" id="estado2" class="form-control-modern" maxlength="2" placeholder="UF" required />
                            </div>
                        </div>

                        <div class="builder-actions" style="margin-top: 20px;">
                            <button type="button" class="btn-builder-back btn-voltar">
                                <i class="fa fa-arrow-left"></i> Voltar ao Configurador
                            </button>
                            <button type="submit" class="btn-builder-next">
                                <i class="fa fa-paper-plane"></i> Solicitar Orçamento de Alteração
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: FACHADAS EM DESTAQUE -->
    <?php if ($countFachadas > 0) { ?>
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-paint-brush"></i> Arquitetura Moderna</span>
                <h2 class="section-title">Fachadas em Destaque</h2>
                <p class="section-subtitle">Modelos 3D desenvolvidos para valorizar seu loteamento e atrair compradores exigentes.</p>
            </div>

            <div class="showcase-grid-modern">
                <?php for ($i = 0; $i < min($countFachadas, 8); $i++) { ?>
                    <?php if (!empty($fachadas_destaque[$i]['foto'])) { ?>
                        <div class="showcase-card">
                            <div class="showcase-card-img">
                                <img src="uploads/fachadas/<?= htmlspecialchars($fachadas_destaque[$i]['foto']) ?>" alt="<?= htmlspecialchars($fachadas_destaque[$i]['nome']) ?>" loading="lazy">
                            </div>
                            <div class="showcase-card-body">
                                <h3 class="showcase-card-title"><?= htmlspecialchars($fachadas_destaque[$i]['nome']) ?></h3>
                                <a href="fachada.php?id=<?= $fachadas_destaque[$i]['id'] ?>" class="showcase-card-btn">
                                    <i class="fa fa-eye"></i> Ver Detalhes da Fachada
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="prontos.php" class="hero-btn-primary" style="display: inline-flex;">
                    <i class="fa fa-camera"></i> Ver Nossas Obras Construídas
                </a>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- SECTION: PLANTAS EM DESTAQUE -->
    <?php if ($countPlantas > 0) { ?>
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-map-o"></i> Otimização de Espaço</span>
                <h2 class="section-title">Plantas Baixas em Destaque</h2>
                <p class="section-subtitle">Plantas funcionais com aproveitamento inteligente de área, ventilação e iluminação natural.</p>
            </div>

            <div class="showcase-grid-modern">
                <?php for ($i = 0; $i < min($countPlantas, 8); $i++) { ?>
                    <?php if (!empty($plantas_destaque[$i]['foto'])) { ?>
                        <div class="showcase-card">
                            <div class="showcase-card-img">
                                <img src="uploads/plantas/<?= htmlspecialchars($plantas_destaque[$i]['foto']) ?>" alt="<?= htmlspecialchars($plantas_destaque[$i]['nome']) ?>" loading="lazy">
                            </div>
                            <div class="showcase-card-body">
                                <h3 class="showcase-card-title"><?= htmlspecialchars($plantas_destaque[$i]['nome']) ?></h3>
                                <a href="planta.php?id=<?= $plantas_destaque[$i]['id'] ?>" class="showcase-card-btn">
                                    <i class="fa fa-search-plus"></i> Ver Planta Baixa
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- SECTION: VÍDEOS EM DESTAQUE -->
    <?php if (is_array($video) && count($video) > 0) { ?>
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-play-circle"></i> Tour Virtual</span>
                <h2 class="section-title">Vídeos dos Projetos</h2>
                <p class="section-subtitle">Veja detalhes das fachadas e plantas em passeios 3D em vídeo de alta resolução.</p>
            </div>

            <div class="showcase-grid-modern">
                <?php 
                $videoCount = 0;
                for ($i = 0; $i < count($video); $i++) { 
                    if (!empty($video[$i]['url'])) {
                        $str = $video[$i]['url'];
                        $regex = "#youtu(be.com|.b)(/v/|/watch\\?v=|e/|/watch(.+)v=)(.{11})#";   
                        preg_match_all($regex , $str, $matches);
                        if (!empty($matches[4][0])) {
                            $code = $matches[4][0];
                            $imgVideo = "https://i1.ytimg.com/vi/" . $code . "/hqdefault.jpg";
                            $videoCount++;
                            if ($videoCount > 4) break;
                            ?>
                            <div class="showcase-card">
                                <div class="showcase-card-img" style="cursor: pointer;" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/<?= $code ?>?autoplay=1">
                                    <img src="<?= $imgVideo ?>" alt="Vídeo do Projeto" loading="lazy">
                                    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;">
                                        <div style="width: 54px; height: 54px; border-radius: 50%; background: #FF7A00; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 20px; box-shadow: 0 4px 12px rgba(255,122,0,0.5);">
                                            <i class="fa fa-play" style="margin-left: 3px;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="showcase-card-body">
                                    <h3 class="showcase-card-title"><?= htmlspecialchars($video[$i]['titulo'] ?? 'Vídeo do Projeto') ?></h3>
                                    <button type="button" class="showcase-card-btn" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/<?= $code ?>?autoplay=1">
                                        <i class="fa fa-play"></i> Assistir Vídeo 3D
                                    </button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- SECTION: DEPOIMENTOS E PROVA SOCIAL -->
    <section class="section-modern-container">
        <div class="container">
            <div class="section-header-modern">
                <span class="section-badge"><i class="fa fa-heart"></i> Satisfação Garantida</span>
                <h2 class="section-title">O que Nossos Clientes Dizem</h2>
                <p class="section-subtitle">Centenas de clientes já construíram o sonho da casa própria ou investiram com sucesso usando nossos projetos.</p>
            </div>

            <div class="testimonials-grid-modern">
                <!-- Depoimento 1 -->
                <div class="testimonial-card-modern">
                    <div class="testimonial-stars">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Equipe nota 10! Fizeram o meu projeto exatamente como eu sonhava. Super indico, parabéns equipe Geminadas.com!"
                    </p>
                    <div class="testimonial-author-box">
                        <img src="img/edjanebola.jpg" alt="Edjane Tavares" class="testimonial-avatar" onerror="this.src='img/icon-geminadas.png'" />
                        <div>
                            <h4 class="testimonial-author-name">Edjane Tavares</h4>
                            <p class="testimonial-author-city">Arapiraca - AL</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento 2 -->
                <div class="testimonial-card-modern">
                    <div class="testimonial-stars">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Excelente atendimento! Trabalho profissional, plantas técnicas muito bem cotadas e facilidade total de aprovação. Estou muito satisfeito."
                    </p>
                    <div class="testimonial-author-box">
                        <img src="img/joseniltonbola.jpg" alt="Josenilton Gomes" class="testimonial-avatar" onerror="this.src='img/icon-geminadas.png'" />
                        <div>
                            <h4 class="testimonial-author-name">Josenilton Gomes</h4>
                            <p class="testimonial-author-city">Goiânia - GO</p>
                        </div>
                    </div>
                </div>

                <!-- Depoimento 3 -->
                <div class="testimonial-card-modern">
                    <div class="testimonial-stars">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Super indico! O atendimento é ótimo, a equipe é extremamente atenciosa e competente. Me tiraram todas as dúvidas no WhatsApp."
                    </p>
                    <div class="testimonial-author-box">
                        <img src="img/marcelobola.jpg" alt="Marcelo Silva" class="testimonial-avatar" onerror="this.src='img/icon-geminadas.png'" />
                        <div>
                            <h4 class="testimonial-author-name">Marcelo Silva</h4>
                            <p class="testimonial-author-city">Maringá - PR</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <a href="depoimentos.php" class="hero-btn-secondary" style="background: #0F172A; color: #fff; border: none; display: inline-flex;">
                    <i class="fa fa-comments-o"></i> Ver Mais Depoimentos de Clientes
                </a>
            </div>
        </div>
    </section>

    <!-- Footer Global -->
    <?php include 'footer.php'; ?>

    <!-- JavaScripts -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/general.js"></script>
    <script type="text/javascript" src="js/projeto-exclusivo.js"></script>
    <script type="text/javascript" src="js/alterar-projeto-existente.js"></script>

    <script type="text/javascript">
    jQuery(document).ready(function ($) {
        // Phone masks
        if ($.fn.mask) {
            $('.telefone').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
        }

        // Video modal handling
        $('[data-video]').click(function () {
            var videoSrc = $(this).data('video');
            $('#videoModal iframe').attr('src', videoSrc);
        });

        $('#videoModal').on('hidden.bs.modal', function () {
            $('#videoModal iframe').attr('src', '');
        });
    });
    </script>
</body>
</html>
