jQuery(document).ready(function() {

    jQuery("#form-login").validate({
        submitHandler: function(form) {
            jQuery("#usuario .btn-logar").attr("disabled", "true");
            var dados = jQuery(form).serialize();

            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function(response) {
                    if (response['result']) {
                        alert(response['message']);

                        if (response['permissao']) {
                            window.location.href = 'pedidos/';
                        }
                        jQuery("#usuario .btn-logar").removeAttr('disabled');
                    }
                }, error: function() {
                    alert("Erro");
                }
            });
        },
        // Define as regras
        rules: {
            email: {
                required: true
            },
            senha: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Digite seu E-mail"
            },
            senha: {
                required: "Digite sua senha"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'label',
        highlight: function(label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function(label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');
        }
    });

    jQuery('#logout').click(function(e) {
        e.preventDefault();

        jQuery.ajax({
            url: "projeto-actions.php",
            type: "POST",
            dataType: "json",
            data: {
                action: 'logout'
            },
            success: function(response) {
                if (response['result']) {
                    window.location.href = 'index.php';
                }
            }, error: function() {
                alert("Erro");
            }
        });
    });

    jQuery("#form-pre-cadastro").validate({
        rules: {
            email: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Digite seu E-mail"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'label',
        highlight: function(label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function(label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');
        }
    });

    jQuery("#form-cadastro").validate({
        submitHandler: function(form) {
            jQuery("#cadastro .btn-logar").attr("disabled", "true");
            var dados = jQuery(form).serialize();

            jQuery.ajax({
                url: "projeto-actions.php",
                type: "POST",
                dataType: "json",
                data: dados,
                success: function(response) {
                    if (response['result']) {
                        alert(response['message']);

                        window.location.href = 'pedidos/';

                        jQuery("#cadastro .btn-logar").removeAttr('disabled');

                    } else {
                        alert(response['message']);
                    }
                }, error: function() {
                    alert("Erro");
                }
            });
        },
        // Define as regras
        rules: {
            nome: {
                required: true
            },
            cpf: {
                required: true
            },
            rg: {
                required: true
            },
            email: {
                required: true
            },
            senha: {
                required: true,
                minlength: 6
            },
            senha2: {
                required: true,
                equalTo: "#cadastro #senha"
            },
            telefone: {
                required: true
            },
            cep: {
                required: true
            },
            endereco: {
                required: true
            },
            bairro: {
                required: true
            },
            id_cidade: {
                required: true
            }
        },
        messages: {
            nome: {
                required: "Digite seu nome"
            },
            cpf: {
                required: "Digite seu CPF"
            },
            rg: {
                required: "Digite seu RG"
            },
            email: {
                required: "Digite seu E-mail"
            },
            senha: {
                required: "Digite Sua Senha",
                minlength: "A senha deve conter no mínimo 6 caracteres"
            },
            senha2: {
                required: "Repita sua senha",
                equalTo: "As Senhas devem ser idênticas"
            },
            telefone: {
                required: "Digite seu telefone"
            },
            cep: {
                required: "Digite seu CEP"
            },
            endereco: {
                required: "Digite seu endereço"
            },
            bairro: {
                required: "Digite seu bairro"
            },
            id_cidade: {
                required: "Selecione sua cidade"
            }
        },
        errorClass: 'error',
        validClass: 'success',
        errorElement: 'label',
        highlight: function(label) {
            jQuery(label).closest('.form-control').removeClass('success').addClass('error');
        },
        success: function(label) {
            label.addClass('valid').closest('.form-control').removeClass('error').addClass('success');
        }
    });

});
