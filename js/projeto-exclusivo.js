jQuery.noConflict();

jQuery(document).ready(function() {

    jQuery("#form-projeto-exclusivo").validate({




        rules: {
            terreno: {
                required: true
            },
            pavimentos: {
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
            cidade_ex: {
                required: true,
                minlength: 2
            },
            estado_ex: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            terreno: {
                required: "Digite a medida de frente do terreno.",
                minLength: "O nome deve conter, no mínimo, 2 caracteres."
            },
            pavimentos: {
                required: "Digite quantos pavimentos você deseja.",
                minLength: "O nome deve conter, no mínimo, 2 caracteres."
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
            }
        }
    });

    jQuery("#form-projeto-exclusivo").on('submit', function(e) {

        if(jQuery("#terreno").val()== null || jQuery("#pavimentos").val() =="" || jQuery("#nome").val() =="" || jQuery("#telefone").val() =="" || jQuery("#email").val() =="" || jQuery("#cidade_ex").val() =="" || jQuery("#estado_ex").val() ==""){
            alert('Preencha os campos corretamente');      
            return false;
        } else {

       if (grecaptcha.getResponse()) {

        jQuery(".f-loading").show();
        jQuery(".f-button").attr("disabled", "true");

        e.preventDefault();

        var dados = new FormData(jQuery(this)[0]);

        jQuery.ajax({
            url: 'projeto-exclusivo-enviar.php',
            type: 'POST',
            data: dados,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                response = response.replace(/^\s+|\s+$/g, "");
                if (response == "success") {
                    goog_report_conversion();
                    alert("Formulário enviado com sucesso!");
                    jQuery(".f-loading").hide();
                    //jQuery(form)[0].reset();
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
        
    } else {
        alert('Por favor realize o procedimento do captcha')
    }

    }

    
});

});
