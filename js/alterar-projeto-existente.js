jQuery.noConflict();

jQuery(document).ready(function() {

    jQuery("#form-alterar-projeto-existente").validate({
        rules: {
            cod_planta: {
                required: true
            },
            cod_fachada: {
                required: true
            },
            arquivo: {
                required: true
            },
            nome: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            telefone: {
                required: true
            },
            cidade: {
                required: true,
                minlength: 2
            },
            estado: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            cod_planta: {
                required: "Digite o código da planta."
            },
            cod_fachada: {
                required: "Digite o código da fachada."
            },
            arquivo: {
                required: "Selecione um arquivo."
            },
            nome: {
                required: "Digite seu nome completo.",
                minLength: "O nome deve conter, no mínimo, 2 caracteres."
            },
            email: {
                required: "Digite seu e-mail.",
                email: "Digite um e-mail válido."
            },
            telefone: {
                required: "Digite o telefone."
            },
            cidade: {
                required: "Digite o nome da sua cidade.",
                minLength: "A cidade deve conter, no mínimo, 2 caracteres."
            },
            estado: {
                required: "Digite o nome do seu estado.",
                minLength: "O estado deve conter, no mínimo, 2 caracteres."
            }
        }
    });

    jQuery("#form-alterar-projeto-existente").on('submit', function(e) {

          if(jQuery("#nome2").val() =="" || jQuery("#telefone2").val() =="" || jQuery("#email2").val() =="" || jQuery("#cidade2").val() =="" || jQuery("#estado2").val() ==""){
            alert('Preencha os campos corretamente');      
            return false;
        } else {

        //if (grecaptcha.getResponse()) {

        jQuery(".f-loading").show();
        jQuery(".f-button").attr("disabled", "true");

        e.preventDefault();

        var dados = new FormData(jQuery(this)[0]);

        jQuery.ajax({
            url: 'alterar-projeto-existente-enviar.php',
            type: 'POST',
            data: dados,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                response = response.replace(/^\s+|\s+$/g, "");
                if (response == "success") {
                    alert("Formulário enviado com sucesso!");
                    jQuery(".f-loading").hide();
                    jQuery(".f-button").removeAttr('disabled');
                } else if (response == "error") {
                    alert("Erro ao enviar formulário.");
                    jQuery(".f-loading").hide();
                    jQuery(".f-button").removeAttr('disabled');
                } else {
                    alert('Preencha os campos obrigatórios!');
                    jQuery(".f-loading").hide();
                    jQuery(".f-button").removeAttr('disabled');
                }
            }
        });

        return false;

        //} else {
        //alert('Por favor realize o procedimento do captcha')
        //}

    }

    });
});
