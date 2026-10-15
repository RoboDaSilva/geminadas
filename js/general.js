/* ==========================================================================
   GEMINADAS.COM - Modern Configurator & Interactive Flow
   Updated: 2026 - Modern UX / Dynamic Stepper / WhatsApp Conversion Priority
   ========================================================================== */

jQuery.noConflict();

jQuery(document).ready(function ($) {
    "use strict";

    $(".loading").hide();

    // Helper: Formatar Moeda (R$ 1.250,00)
    function formatReal(int) {
        var tmp = int + '';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if (tmp.length > 6)
            tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        return tmp;
    }

    var passo = "passo-1";
    var idTamanhoTerreno = "";
    var textoTamanhoTerreno = "";
    var idPavimentos = "";
    var textoPavimentos = "";
    var quartos = "";
    var suites = "";
    var banheiros = "";

    var valorPlanta = 0;
    var valorFachada = 0;
    var nomePlantaSelecionada = "";
    var nomeFachadaSelecionada = "";
    var fotoPlantaSelecionada = "";
    var fotoFachadaSelecionada = "";
    var descPlantaSelecionada = "";

    var currentResponsePasso2 = null;
    var currentResponsePasso3 = null;

    // Smooth Scroll Helper
    function scrollToBuilder() {
        var target = $("#idPassos");
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 500);
        }
    }

    // Update Modern Stepper State
    function updateStepper(stepNumber) {
        var steps = $('.stepper-item');
        var progressFill = $('.stepper-progress-fill');
        var progressBarLegacy = $(".progress .progress-bar");

        steps.removeClass('active completed');

        if (stepNumber === 1) {
            $('.stepper-item[data-step="1"]').addClass('active');
            if (progressFill.length) progressFill.css('width', '0%');
            if (progressBarLegacy.length) progressBarLegacy.css('width', '5%');
        } else if (stepNumber === 2) {
            $('.stepper-item[data-step="1"]').addClass('completed');
            $('.stepper-item[data-step="2"]').addClass('active');
            if (progressFill.length) progressFill.css('width', '33%');
            if (progressBarLegacy.length) progressBarLegacy.css('width', '35%');
        } else if (stepNumber === 3) {
            $('.stepper-item[data-step="1"], .stepper-item[data-step="2"]').addClass('completed');
            $('.stepper-item[data-step="3"]').addClass('active');
            if (progressFill.length) progressFill.css('width', '66%');
            if (progressBarLegacy.length) progressBarLegacy.css('width', '65%');
        } else if (stepNumber === 4) {
            $('.stepper-item[data-step="1"], .stepper-item[data-step="2"], .stepper-item[data-step="3"]').addClass('completed');
            $('.stepper-item[data-step="4"]').addClass('active');
            if (progressFill.length) progressFill.css('width', '100%');
            if (progressBarLegacy.length) progressBarLegacy.css('width', '100%');
        }

        // Support old breadcrumb buttons if present
        $('.btn-breadcrumb div').removeClass('active');
        $('.btn-breadcrumb .btn-passo-' + stepNumber).removeAttr('disabled').addClass('active');
    }

    // Toggle Modes (Monte seu Projeto vs Exclusivo vs Alterar)
    $('.btn-projeto-exclusivo, [data-mode="exclusivo"]').click(function (e) {
        e.preventDefault();
        $('.monte-seu-projeto, .alterar-projeto-existente').slideUp(200);
        $('.projeto-exclusivo').slideDown(300);
        $('.builder-mode-btn').removeClass('active');
        $('[data-mode="exclusivo"]').addClass('active');
        scrollToBuilder();
    });

    $('.btn-alterar-modo, [data-mode="alterar"]').click(function (e) {
        e.preventDefault();
        $('.monte-seu-projeto, .projeto-exclusivo').slideUp(200);
        $('.alterar-projeto-existente').slideDown(300);
        $('.builder-mode-btn').removeClass('active');
        $('[data-mode="alterar"]').addClass('active');
        scrollToBuilder();
    });

    $('.btn-voltar, [data-mode="builder"]').click(function (e) {
        e.preventDefault();
        $('.projeto-exclusivo, .alterar-projeto-existente').slideUp(200);
        $('.monte-seu-projeto').slideDown(300);
        $('.builder-mode-btn').removeClass('active');
        $('[data-mode="builder"]').addClass('active');
        scrollToBuilder();
    });

    // Step 1: Terrain Card Click
    $(document).on('click', '.terrain-card', function () {
        $('.terrain-card').removeClass('active');
        $(this).addClass('active');
        var radio = $(this).find('input[type="radio"]');
        radio.prop('checked', true);
        idTamanhoTerreno = radio.val();
        textoTamanhoTerreno = $(this).find('.terrain-card-label').text() || (radio.val() + ' metros de frente');
    });

    // Step 1: House Type Click
    $(document).on('click', '.house-type-card', function () {
        $('.house-type-card').removeClass('active');
        $(this).addClass('active');
        var radio = $(this).find('input[type="radio"]');
        radio.prop('checked', true);
        idPavimentos = radio.val();
        textoPavimentos = $(this).find('.house-type-card-info h4').text() || $(this).text();
    });

    // Generate Modern Card for Step 2 (Plantas)
    function generateItemPasso2(id, nome, foto, valor, valor_formatado, posicao) {
        var imgSrc = foto ? ('uploads/plantas/' + foto) : 'img/marcadagua-geminadas2.png';
        var item = '';
        item += '<div class="project-card-option" data-id="' + id + '" data-pos="' + posicao + '">';
        item += '  <div class="project-card-thumb">';
        item += '    <img src="' + imgSrc + '" alt="' + nome + '" loading="lazy" />';
        if (foto) {
            item += '    <a class="project-card-zoom-btn icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="Ampliar Planta" name="' + posicao + '" href="' + imgSrc + '">';
            item += '      <i class="fa fa-search-plus"></i>';
            item += '    </a>';
        }
        item += '  </div>';
        item += '  <div class="project-card-body">';
        item += '    <h3 class="project-card-title">' + nome + '</h3>';
        item += '    <div class="project-card-select-btn">';
        item += '      <input type="radio" class="planta" name="planta" id="planta-' + id + '" valor="' + valor + '" valor_formatado="' + valor_formatado + '" value="' + id + '" style="margin-right: 6px;">';
        item += '      <label for="planta-' + id + '" style="margin: 0; cursor: pointer;">Selecionar esta Planta</label>';
        item += '    </div>';
        item += '  </div>';
        item += '</div>';
        return item;
    }

    // Step 1 -> Step 2: Fetch floor plans
    function listarItensPasso2() {
        $(".loading").show();
        $("#passo-1 .btn-avancar, #btnAvancarPasso1").attr("disabled", "true");

        $.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                action: "passo-1",
                tamanho_terrenos_id: idTamanhoTerreno,
                plantas_tipos_id: idPavimentos,
                quartos: quartos,
                suites: suites,
                banheiros: banheiros
            },
            success: function (response) {
                $(".loading").hide();
                $("#passo-1 .btn-avancar, #btnAvancarPasso1").removeAttr("disabled");

                if (response['result'] && response['itens'] && response['itens'].length > 0) {
                    currentResponsePasso2 = response;
                    $("#passo-1").hide();
                    $("#passo-2").fadeIn(300);

                    var content = '<div class="project-selection-grid">';
                    for (var i = 0; i < response['itens'].length; i++) {
                        content += generateItemPasso2(
                            response['itens'][i]['id'],
                            response['itens'][i]['nome'],
                            response['itens'][i]['foto'],
                            response['itens'][i]['valor'],
                            response['itens'][i]['valor_formatado'],
                            i
                        );
                    }
                    content += '</div>';

                    $('#passo-2 .content').html(content);

                    // Gallery modal click event for plants
                    $('#passo-2 .icon-gallery').click(function (e) {
                        e.preventDefault();
                        var pos = $(this).attr('name');
                        var item = currentResponsePasso2['itens'][pos];
                        $('#galeriaModal .modal-title').text(item['nome']);
                        var html = '<div class="row">';
                        html += '  <div class="col-sm-12 text-center" style="margin-bottom: 20px;">';
                        html += '    <img src="uploads/plantas/' + item['foto'] + '" class="img-responsive center-block" style="max-height: 480px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" />';
                        html += '  </div>';
                        if (item['descricao']) {
                            html += '  <div class="col-sm-12" style="background: #F8FAFC; padding: 16px 20px; border-radius: 8px; border: 1px solid #E2E8F0;">';
                            html += '    <h4 style="font-weight: 700; color: #0F172A; margin-bottom: 6px;">Sobre esta Planta:</h4>';
                            html += '    <p style="color: #475569; margin: 0;">' + item['descricao'] + '</p>';
                            html += '  </div>';
                        }
                        html += '</div>';
                        $('#galeriaModal .modal-body .conteudo').html(html);
                        $('#galeriaModal').modal('show');
                    });

                    updateStepper(2);
                    passo = "passo-2";
                    scrollToBuilder();
                } else {
                    alert("Não foram encontradas plantas para esta combinação de terreno e pavimento. Tente outras medidas ou solicite um Projeto Personalizado!");
                }
            },
            error: function () {
                $(".loading").hide();
                $("#passo-1 .btn-avancar, #btnAvancarPasso1").removeAttr("disabled");
                alert("Ocorreu um erro ao carregar as plantas. Por favor, tente novamente.");
            }
        });
    }

    // Step 1 "Avançar" trigger
    $('#passo-1 .btn-avancar, #btnAvancarPasso1').click(function (e) {
        e.preventDefault();
        if (!idTamanhoTerreno) {
            $('.terreno:checked').each(function () {
                idTamanhoTerreno = $(this).val();
            });
        }
        if (!idPavimentos) {
            $('.pavimentos:checked').each(function () {
                idPavimentos = $(this).val();
            });
        }

        if (!idTamanhoTerreno) {
            alert("Por favor, selecione a medida do seu terreno.");
            return false;
        }
        if (!idPavimentos) {
            alert("Por favor, selecione se deseja Casa Térrea ou Sobrado.");
            return false;
        }

        listarItensPasso2();
    });

    // Step 2: Filters Search
    $('#passo-2 .btn-filtro, #passo-2 .form-filtro-passo-2 .btn-filtro').click(function (e) {
        e.preventDefault();
        quartos = $('#passo-2 #quartos').val() || '';
        suites = $('#passo-2 #suites').val() || '';
        banheiros = $('#passo-2 #banheiros').val() || '';
        listarItensPasso2();
    });

    // Step 2: Select Plant Card
    $(document).on('click', '#passo-2 .project-card-option', function (e) {
        if ($(e.target).closest('.project-card-zoom-btn').length) {
            return;
        }
        $('#passo-2 .project-card-option').removeClass('active');
        $(this).addClass('active');
        var radio = $(this).find('input[type="radio"]');
        radio.prop('checked', true);
        valorPlanta = parseFloat(radio.attr('valor')) || 0;
        var pos = $(this).data('pos');
        if (currentResponsePasso2 && currentResponsePasso2['itens'][pos]) {
            nomePlantaSelecionada = currentResponsePasso2['itens'][pos]['nome'];
            fotoPlantaSelecionada = currentResponsePasso2['itens'][pos]['foto'];
            descPlantaSelecionada = currentResponsePasso2['itens'][pos]['descricao'] || '';
        }
    });

    // Generate Modern Card for Step 3 (Fachadas)
    function generateItemPasso3(id, id_planta, nome, foto, valor, valor_formatado, posicao) {
        var imgSrc = foto ? ('uploads/fachadas/' + foto) : 'img/marcadagua-geminadas2.png';
        var item = '';
        item += '<div class="project-card-option" data-id="' + id + '" data-pos="' + posicao + '">';
        item += '  <div class="project-card-thumb">';
        item += '    <img src="' + imgSrc + '" alt="' + nome + '" loading="lazy" />';
        if (foto) {
            item += '    <a class="project-card-zoom-btn icon-gallery" data-toggle="modal" data-target="#galeriaModal" title="Ampliar Fachada" name="' + posicao + '" href="' + imgSrc + '">';
            item += '      <i class="fa fa-search-plus"></i>';
            item += '    </a>';
        }
        item += '  </div>';
        item += '  <div class="project-card-body">';
        item += '    <h3 class="project-card-title">' + nome + '</h3>';
        item += '    <div class="project-card-select-btn" style="margin-bottom: 8px;">';
        item += '      <input type="radio" class="fachada" name="fachada" id="fachada-' + id + '" valor="' + valor + '" value="' + id + '" style="margin-right: 6px;">';
        item += '      <label for="fachada-' + id + '" style="margin: 0; cursor: pointer;">Selecionar esta Fachada</label>';
        item += '    </div>';
        item += '    <button type="button" class="btn btn-default btn-xs btn-alterar-shortcut" data-planta="' + id_planta + '" data-fachada="' + id + '" style="color: #64748B; border-color: #E2E8F0; width: 100%; border-radius: 6px; padding: 5px;">';
        item += '      <i class="fa fa-pencil"></i> Desejo alterar esta fachada';
        item += '    </button>';
        item += '  </div>';
        item += '</div>';
        return item;
    }

    // Step 2 -> Step 3: Fetch Facades
    $('#passo-2 .btn-avancar, #btnAvancarPasso2').click(function (e) {
        e.preventDefault();
        var plantas_id = $('.planta:checked').val();

        if (!plantas_id) {
            alert("Por favor, selecione a planta desejada para avançar.");
            return false;
        }

        $(".loading").show();
        $("#passo-2 .btn-avancar, #btnAvancarPasso2").attr("disabled", "true");

        $.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                action: "passo-2",
                plantas_id: plantas_id
            },
            success: function (response) {
                $(".loading").hide();
                $("#passo-2 .btn-avancar, #btnAvancarPasso2").removeAttr("disabled");

                if (response['result'] && response['itens'] && response['itens'].length > 0) {
                    currentResponsePasso3 = response;
                    $("#passo-2").hide();
                    $("#passo-3").fadeIn(300);

                    var content = '<div class="project-selection-grid">';
                    for (var i = 0; i < response['itens'].length; i++) {
                        content += generateItemPasso3(
                            response['itens'][i]['id'],
                            response['itens'][i]['plantas_id'],
                            response['itens'][i]['nome'],
                            response['itens'][i]['foto'],
                            response['itens'][i]['valor'],
                            response['itens'][i]['valor_formatado'],
                            i
                        );
                    }
                    content += '</div>';

                    $('#passo-3 .content').html(content);

                    // Gallery modal click event for facades
                    $('#passo-3 .icon-gallery').click(function (e) {
                        e.preventDefault();
                        var pos = $(this).attr('name');
                        var item = currentResponsePasso3['itens'][pos];
                        $('#galeriaModal .modal-title').text(item['nome']);
                        var html = '<div class="row">';
                        html += '  <div class="col-sm-12 text-center" style="margin-bottom: 20px;">';
                        html += '    <img src="uploads/fachadas/' + item['foto'] + '" class="img-responsive center-block" style="max-height: 480px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" />';
                        html += '  </div>';
                        if (item['video']) {
                            html += '  <div class="col-sm-12 text-center" style="margin-top: 10px;">';
                            html += '    <a href="' + item['video'] + '" target="_blank" class="btn btn-warning"><i class="fa fa-play-circle"></i> Ver Vídeo 3D</a>';
                            html += '  </div>';
                        }
                        html += '</div>';
                        $('#galeriaModal .modal-body .conteudo').html(html);
                        $('#galeriaModal').modal('show');
                    });

                    // Shortcut to Alter Project
                    $('#passo-3 .btn-alterar-shortcut').click(function () {
                        var pId = $(this).data('planta');
                        var fId = $(this).data('fachada');
                        $('#cod_planta, #cod_planta2').val(pId);
                        $('#cod_fachada, #cod_fachada2').val(fId);
                        $('.monte-seu-projeto').slideUp(200);
                        $('.alterar-projeto-existente').slideDown(300);
                        scrollToBuilder();
                    });

                    updateStepper(3);
                    passo = "passo-3";
                    scrollToBuilder();
                } else {
                    alert("Não existem fachadas cadastradas para esta planta no momento.");
                }
            },
            error: function () {
                $(".loading").hide();
                $("#passo-2 .btn-avancar, #btnAvancarPasso2").removeAttr("disabled");
                alert("Não foi possível carregar as fachadas. Tente novamente.");
            }
        });
    });

    // Step 3: Select Facade Card
    $(document).on('click', '#passo-3 .project-card-option', function (e) {
        if ($(e.target).closest('.project-card-zoom-btn, .btn-alterar-shortcut').length) {
            return;
        }
        $('#passo-3 .project-card-option').removeClass('active');
        $(this).addClass('active');
        var radio = $(this).find('input[type="radio"]');
        radio.prop('checked', true);
        valorFachada = parseFloat(radio.attr('valor')) || 0;
        var pos = $(this).data('pos');
        if (currentResponsePasso3 && currentResponsePasso3['itens'][pos]) {
            nomeFachadaSelecionada = currentResponsePasso3['itens'][pos]['nome'];
            fotoFachadaSelecionada = currentResponsePasso3['itens'][pos]['foto'];
        }
    });

    // Helper: Build WhatsApp URL with full project summary
    function buildWhatsAppUrl(plantaNome, fachadaNome, terrenoTxt, pavimentoTxt, valorTotalStr, opcionaisList) {
        var phone = "5544988440055";
        var msg = "👋 Olá! Acabei de montar meu projeto no site Geminadas.com:\n\n";
        msg += "📐 Terreno: " + (terrenoTxt || "Medida selecionada") + "\n";
        msg += "🏠 Tipo: " + (pavimentoTxt || "Casa/Sobrado") + "\n";
        msg += "📋 Planta Baixa: " + (plantaNome || "Planta selecionada") + "\n";
        msg += "🎨 Fachada 3D: " + (fachadaNome || "Fachada selecionada") + "\n";

        if (opcionaisList && opcionaisList.length > 0) {
            msg += "📦 Opcionais: " + opcionaisList.join(", ") + "\n";
        } else {
            msg += "📦 Pacote: Projeto Arquitetônico Completo\n";
        }

        msg += "💰 Valor Estimado: " + valorTotalStr + "\n\n";
        msg += "Gostaria de tirar dúvidas com o arquiteto e finalizar a contratação!";

        return "https://wa.me/" + phone + "?text=" + encodeURIComponent(msg);
    }

    // Step 3 -> Step 4: Summary & WhatsApp Conversion
    $('#passo-3 .btn-avancar, #btnavancarPasso3').click(function (e) {
        e.preventDefault();
        var idFachada = $('.fachada:checked').val();

        if (!idFachada) {
            alert("Por favor, selecione uma fachada para concluir seu projeto.");
            return false;
        }

        $(".loading").show();
        $("#passo-3 .btn-avancar, #btnavancarPasso3").attr("disabled", "true");

        $.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                action: "passo-3",
                id_fachada: idFachada
            },
            success: function (response) {
                $(".loading").hide();
                $("#passo-3 .btn-avancar, #btnavancarPasso3").removeAttr("disabled");

                if (response['result']) {
                    $("#passo-3").hide();
                    $("#passo-4").fadeIn(300);

                    var pItem = (response['itens_planta'] && response['itens_planta'][0]) ? response['itens_planta'][0] : { nome: nomePlantaSelecionada, foto: fotoPlantaSelecionada, descricao: descPlantaSelecionada };
                    var fItem = (response['itens_fachada'] && response['itens_fachada'][0]) ? response['itens_fachada'][0] : { nome: nomeFachadaSelecionada, foto: fotoFachadaSelecionada };

                    var valorFinalStr = (response['itens_venda'] && response['itens_venda'][0] && response['itens_venda'][0]['valor_final']) ? ('R$ ' + response['itens_venda'][0]['valor_final']) : ('R$ ' + formatReal(valorPlanta + valorFachada));
                    var valorFloatBase = (response['itens_venda'] && response['itens_venda'][0] && response['itens_venda'][0]['valor_final_float']) ? parseFloat(response['itens_venda'][0]['valor_final_float']) : (valorPlanta + valorFachada);

                    // Build Passo 4 HTML
                    var summaryHtml = '<div class="summary-container">';

                    // Duo Cards (Planta & Fachada)
                    summaryHtml += '<div class="summary-duo-cards">';
                    
                    // Card Planta
                    summaryHtml += '  <div class="summary-card">';
                    summaryHtml += '    <div class="summary-card-header"><i class="fa fa-map-o" style="color: #FF7A00;"></i> Planta Selecionada</div>';
                    summaryHtml += '    <div class="summary-card-thumb"><img src="uploads/plantas/' + pItem['foto'] + '" alt="' + pItem['nome'] + '"></div>';
                    summaryHtml += '    <div class="summary-card-body">';
                    summaryHtml += '      <h3 class="summary-card-title">' + pItem['nome'] + '</h3>';
                    summaryHtml += '      <p class="summary-card-desc">' + (pItem['descricao'] ? pItem['descricao'] : 'Planta arquitetônica dimensionada com aproveitamento inteligente de espaço.') + '</p>';
                    summaryHtml += '    </div>';
                    summaryHtml += '  </div>';

                    // Card Fachada
                    summaryHtml += '  <div class="summary-card">';
                    summaryHtml += '    <div class="summary-card-header"><i class="fa fa-paint-brush" style="color: #FF7A00;"></i> Fachada Selecionada</div>';
                    summaryHtml += '    <div class="summary-card-thumb"><img src="uploads/fachadas/' + fItem['foto'] + '" alt="' + fItem['nome'] + '"></div>';
                    summaryHtml += '    <div class="summary-card-body">';
                    summaryHtml += '      <h3 class="summary-card-title">' + fItem['nome'] + '</h3>';
                    summaryHtml += '      <p class="summary-card-desc">Design contemporâneo de fachada que valoriza o imóvel e atrai compradores.</p>';
                    summaryHtml += '    </div>';
                    summaryHtml += '  </div>';

                    summaryHtml += '</div>'; // End duo cards

                    // Opcionais Block
                    if (response['opcionais'] && response['opcionais'].length > 0) {
                        summaryHtml += '<div class="summary-optionals-box">';
                        summaryHtml += '  <h3><i class="fa fa-plus-circle" style="color: #FF7A00;"></i> Projetos Complementares (Opcionais)</h3>';
                        summaryHtml += '  <p style="color: #64748B; font-size: 13px; margin-bottom: 14px;">Adicione projetos de engenharia para agilizar sua obra com desconto de pacote:</p>';
                        for (var i = 0; i < response['opcionais'].length; i++) {
                            var op = response['opcionais'][i];
                            summaryHtml += '<div class="optional-item-row">';
                            summaryHtml += '  <label for="modern-op-' + op['id'] + '">';
                            summaryHtml += '    <input type="checkbox" id="modern-op-' + op['id'] + '" class="checkbox_opcionais_modern" value="' + op['nome'] + '" data-valor="' + op['valor'] + '">';
                            summaryHtml += '    <span>' + op['nome'] + '</span>';
                            summaryHtml += '  </label>';
                            summaryHtml += '  <span class="optional-price-tag">+ R$ ' + op['valor'] + '</span>';
                            summaryHtml += '</div>';
                        }
                        summaryHtml += '</div>';
                    }

                    // High-Converting WhatsApp Box
                    var initialWaUrl = buildWhatsAppUrl(pItem['nome'], fItem['nome'], textoTamanhoTerreno, textoPavimentos, valorFinalStr, []);

                    summaryHtml += '<div class="whatsapp-conversion-box">';
                    summaryHtml += '  <div class="whatsapp-box-badge"><i class="fa fa-bolt"></i> Projeto Pronto para Finalizar</div>';
                    summaryHtml += '  <h2>Seu Projeto Está Concluído!</h2>';
                    summaryHtml += '  <p>Fale diretamente com nosso arquiteto no WhatsApp para receber o pacote completo com plantas técnicas, cortes e arquivo para prefeitura.</p>';
                    summaryHtml += '  <div class="whatsapp-price-display" id="displayValorFinalTotal">' + valorFinalStr + '</div>';
                    summaryHtml += '  <div>';
                    summaryHtml += '    <a href="' + initialWaUrl + '" target="_blank" rel="noopener" class="btn-whatsapp-finish" id="btnFinalizarWhatsAppAction">';
                    summaryHtml += '      <i class="fa fa-whatsapp" style="font-size: 24px;"></i> FINALIZAR PROJETO NO WHATSAPP';
                    summaryHtml += '    </a>';
                    summaryHtml += '  </div>';
                    summaryHtml += '  <div class="whatsapp-box-guarantees">';
                    summaryHtml += '    <span><i class="fa fa-check-circle"></i> Aprovação Garantida</span>';
                    summaryHtml += '    <span><i class="fa fa-shield"></i> Arquiteto Registrado CAU</span>';
                    summaryHtml += '    <span><i class="fa fa-clock-o"></i> Atendimento Imediato</span>';
                    summaryHtml += '  </div>';
                    summaryHtml += '</div>';

                    // Alternative Form Contact Link
                    summaryHtml += '<div style="text-align: center; margin-top: 20px;">';
                    summaryHtml += '  <button type="button" class="btn btn-link btn-toggle-form-id" style="color: #64748B; font-size: 13px;">';
                    summaryHtml += '    Prefere enviar uma mensagem por e-mail ou criar cadastro? Clique aqui';
                    summaryHtml += '  </button>';
                    summaryHtml += '</div>';

                    summaryHtml += '</div>'; // End summary-container

                    $('#passo-4 .resumo .content').html(summaryHtml);

                    // Recalculate price and update WhatsApp link when optionals change
                    var runningTotal = valorFloatBase;
                    $('.checkbox_opcionais_modern').change(function () {
                        var opValor = parseFloat($(this).data('valor')) || 0;
                        if ($(this).is(':checked')) {
                            runningTotal += opValor;
                        } else {
                            runningTotal -= opValor;
                        }

                        var formatted = 'R$ ' + formatReal(runningTotal.toFixed(2));
                        $('#displayValorFinalTotal').text(formatted);

                        // Collect selected optionals
                        var selectedOps = [];
                        $('.checkbox_opcionais_modern:checked').each(function () {
                            selectedOps.push($(this).val());
                        });

                        var updatedWaUrl = buildWhatsAppUrl(pItem['nome'], fItem['nome'], textoTamanhoTerreno, textoPavimentos, formatted, selectedOps);
                        $('#btnFinalizarWhatsAppAction').attr('href', updatedWaUrl);
                    });

                    // Toggle form contact
                    $('.btn-toggle-form-id').click(function () {
                        $('#passo-4 .identificacao').slideToggle(300);
                    });

                    updateStepper(4);
                    passo = "passo-4";
                    scrollToBuilder();
                } else {
                    alert("Não foi possível gerar o resumo do projeto. Tente novamente.");
                }
            },
            error: function () {
                $(".loading").hide();
                $("#passo-3 .btn-avancar, #btnavancarPasso3").removeAttr("disabled");
                alert("Erro ao avançar. Por favor, tente novamente.");
            }
        });
    });

    // Stepper Navigation Clicks (allowing going back easily)
    $('.stepper-item').click(function () {
        var targetStep = $(this).data('step');
        if (targetStep === 1 && (passo === 'passo-2' || passo === 'passo-3' || passo === 'passo-4')) {
            $('#passo-2, #passo-3, #passo-4').hide();
            $('#passo-1').fadeIn(300);
            updateStepper(1);
            passo = 'passo-1';
            scrollToBuilder();
        } else if (targetStep === 2 && (passo === 'passo-3' || passo === 'passo-4')) {
            $('#passo-1, #passo-3, #passo-4').hide();
            $('#passo-2').fadeIn(300);
            updateStepper(2);
            passo = 'passo-2';
            scrollToBuilder();
        } else if (targetStep === 3 && passo === 'passo-4') {
            $('#passo-1, #passo-2, #passo-4').hide();
            $('#passo-3').fadeIn(300);
            updateStepper(3);
            passo = 'passo-3';
            scrollToBuilder();
        }
    });

    // Initialize Stepper on page load
    updateStepper(1);
});
