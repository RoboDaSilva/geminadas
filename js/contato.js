jQuery.noConflict();

jQuery(document).ready(function(){
	


    jQuery("#form-contato").validate({
        submitHandler: function(form) {

        if (grecaptcha.getResponse()) {
            jQuery(".f-loading").show();
            jQuery(".f-button").attr("disabled", "true");
            var dados = jQuery(form).serialize();


            jQuery.ajax({
                type: "POST",
                url: "contato-enviar.php",
                data: dados,
                success: function(response) {
                    //console.log(dados);
                    response = response.replace(/^\s+|\s+$/g, "");
                    if (response == "sucess") {
                        alert("Formulário enviado com sucesso!");
                        jQuery(".f-loading").hide();
                        jQuery(form)[0].reset();
                        jQuery(".f-button").removeAttr('disabled');
                    } else if (response == "error") {
                        alert("Erro ao enviar formulário.");
                        jQuery(".f-loading").hide();
                        jQuery(".f-button").removeAttr('disabled');
                    } else {
                        alert(response);
                        jQuery(".f-loading").hide();
                        jQuery(".f-button").removeAttr('disabled');
                    }
                }
            });


        } else {
            alert('Por favor realize o procedimento do captcha')
        }

        

        },
        rules: {
            nome: {
                required: true, 
                minlength: 2
            },
            email: {
                required: true, 
                email: true
            },
            assunto: {
                required: true
            },
            mensagem: {
                required: true,
                minlength: 2
            }


        },

        messages: {
            nome: {
                required: "Digite seu nome completo.",
                minLength: "O nome deve conter, no mínimo, 2 caracteres."
            },
            email: {
                required: "Digite seu e-mail.", 
                email: "Digite um e-mail válido."
            },
            assunto: {
                required: "Digite um assunto."
            },
            mensagem: {
                required: "Digite uma mensagem.",
                minLength: "A mensagem deve conter, no mínimo, 2 caracteres."
            }
        }
    });
    
});