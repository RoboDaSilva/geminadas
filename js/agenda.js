jQuery.noConflict();

jQuery(document).ready(function(){
	
    jQuery("#form-agenda").validate({
        submitHandler: function(form) {

         if (grecaptcha.getResponse()) {

            jQuery(".f-loading").show();
            jQuery(".f-button").attr("disabled", "true");
            var dados = jQuery(form).serialize();
            jQuery.ajax({
                type: "POST",
                url: "agenda-enviar.php",
                data: dados,
                success: function(response) {
                    response = response.replace(/^\s+|\s+$/g, "");
                    if (response == "sucess") {
                        alert("Solicitação efetuada com sucesso!");
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
            date: {
                required: true
            },
            time: {
                required: true
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
            date: {
                required: "Selecione uma data."
            },
            time: {
                required: "Selecione um horário."
            }
        }
    });
    
});