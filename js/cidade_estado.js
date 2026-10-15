jQuery.noConflict();

jQuery(document).ready(function() {
    // Selecionar estado
    var estado;
    jQuery('#estado').change(function(e) {
        e.preventDefault();

        estado = jQuery(this).val();

        jQuery.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                estado: estado,
                action: 'ler_cidades'
            },
            success: function(response) {
                if (response['result']) {
                    if (response['cidades']) {
                        var content = '';
                        jQuery('#cidade').empty();
                        jQuery('#select2-chosen-2').empty();

                        content += '<option value=""></option>';
                        for (var i = 0; i < response['cidades'].length; i++) {
                            content += '<option value="' + response['cidades'][i]['id'] + '">' + response['cidades'][i]['cidade'] + '</option>';
                        }

                        jQuery('#cidade').html(content);
                        jQuery('.form-group.cidades').show();
                    } else {
                        jQuery('.form-group.cidades').hide();
                        if (response['cidades'] != "") {
                            alert('Não existem cidades cadastradas para este estado');
                        }
                    }
                } else {
                    alert('Nenhuma cidade para este estado');
                }
            }, error: function() {
                alert("Erro");
            }
        });
    });

    jQuery("#form-cidade-estado-modal").validate({
        submitHandler: function(form) {
            var dados = jQuery(form).serialize();
            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function(response) {
                    if (response['result']) {
                        jQuery('#cidadeModal').modal('hide');
                        
                        var content = '<i class="glyphicon glyphicon-refresh"></i> ' + response['cidade_estado'];

                        jQuery('.topo-box-linhacima .cidade-estado button').empty();
                        jQuery('.topo-box-linhacima .cidade-estado button').append(content);
                        jQuery('.topo-box-linhacima .cidade-estado').find('.collapse').removeClass('collapse');
                    }
                }, error: function() {
                    alert("Erro");
                }
            });
        },
        // Define as regras
        rules: {
            estado: {
                required: true
            },
            cidade: {
                required: true
            }
        },
        messages: {
            estado: {
                required: "Selecione um estado"
            },
            cidade: {
                required: "Selecione uma cidade"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'span',
        highlight: function(label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function(label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');

        }
    });
});