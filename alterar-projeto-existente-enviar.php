<?php
include_once './init.php';
include_once CAMINHO_ROOT . 'inc/classes/F_EnviaEmail.php';

if (isset($_POST)) {

    $cod_planta = trim($_POST['cod_planta']);
    $cod_fachada = trim($_POST['cod_fachada']);
    $observacoes = trim($_POST['observacoes']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);

    if ($cod_planta == "") {
        echo "<script>alert('Preencha o campo Código da Planta');history.back();</script>";
        exit;
    } else if ($cod_fachada == "") {
        echo "<script>alert('Preencha o campo Código da Fachada');history.back();</script>";
        exit;
    } else if ($nome == "") {
        echo "<script>alert('Preencha o campo Nome');history.back();</script>";
        exit;
    } else if ($email == "") {
        echo "<script>alert('Preencha o campo E-mail');history.back();</script>";
        exit;
    } else if ($telefone == "") {
        echo "<script>alert('Preencha o campo Telefone');history.back();</script>";
        exit;
    } else if ($cidade == "") {
        echo "<script>alert('Preencha o campo Cidade');history.back();</script>";
        exit;
    } else if ($estado == "") {
        echo "<script>alert('Preencha o campo Estado');history.back();</script>";
        exit;
    } else {

// GERANDO O ENVIO DE EMAIL 
        $EnviaEmail = new F_EnviaEmail();
        $_config = new stdClass();

        $From = new stdClass();
        $From->nome = $_POST['nome'];
        $From->email = $_POST['email'];
        $_config->From = $From;

        $Conteudo = new stdClass();
        $Conteudo->Assunto = 'Pedido de Alteração em Projeto Existente - Geminadas.com';
        $Conteudo->conteudo = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
<head>

<title>Geminadas.com</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />


    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #292929;
            margin: 20px 0;
        }

        td[class=\"wrapper\"] {
            width: 600px;
        }

        td[class=\"master_table\"]{
            width: 700px;
        }

        td[class=\"padds\"]{
            width: 50px;
        }

        td[class=\"social\"]{
            width: 25px;
            height: 24px;
        }

        td[class=\"social_space\"]{
            width: 10px;
        }

        td[class=\"social_holder\"]{
            width: 130px;
            height: 24px;
        }

        td[class=\"footer_social_holder\"]{
            width: 130px;
            height: 24px;
        }

        td[class=\"footer_social_vertical_spacer\"]{
            width: 130px;
        }

        td[class=\"social\"] img{
            width: 25px;
            height: 24px;
            display: block;
        }

        a[class=\"nodecoration\"]{
            text-decoration: none;
        }

        td[class=\"preheader_padding\"]{
            width: 130px;
        }

        td[class=\"viewonline\"]{
            width: 340px;
            text-align: center;
            color: #8e8e8e;
            font-size: 10px;
        }

        td[class=\"logo\"]{
            width: 215px;
            border-collapse: collapse;
        }

        td[class=\"navigation\"]{
            width: 375px;
            text-align:right;
            border-collapse: collapse;
        }

        td[class=\"navigation_space\"]{
            width: 10px;
        }

        td[class=\"mail_headline\"]{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 36px;
            line-height: 50px;
            text-align: center;
            width: 600px;
        }

        td[class=\"main_image\"] {
            width: 600px;
        }

        td[class=\"main_image\"] img {
            display: block;
        }

        td[class=\"call_to_action\"] {
            font-size: 30px;
            text-align: center;
            width: 600px;
        }

        td[class=\"content\"]{
            width: 600px;
        }

        td[class=\"call_to_action_download\"] {
            width: 600px;
        }

        td[class=\"service_image\"] {
            width: 75px;
        }

        td[class=\"service_padding\"] {
            width: 15px;
        }

        td[class=\"service_description\"] {
            width: 510px;
        }

        a[class=\"service_title\"] {
            text-decoration: none;
            font-size: 18px;
            font-family:Arial, Helvetica, sans-serif;
            color: #292929;
            font-weight: bold;
            line-height: 14px;
        }

        td[class=\"section_title\"] {
            width: 600px;
            font-family:Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        td[class=\"one_half\"]{
            width: 280px;
        }

        td[class=\"one_half_padding\"]{
            width: 40px;
        }

        a[class=\"social_title\"] {
            color: #ffffff;
            font-size: 12px;
            font-weight: normal;
        }

        td[class=\"footer\"] {
            font-size: 12px;
            color: #ffffff;
            font-weight: normal;
            width: 420px;
        }

        td[class=\"footer_padding\"] {
            width: 50px;
        }

        td[class=\"location\"]{
            text-align:center;
            font-size: 12px;
            color: #ffffff;
            width: 600px;
            line-height: 20px;
        }

        td[class=\"footer_nav\"]{
            line-height: 25px;
            font-size: 12px;
            color: #838383;
            text-align: center;
        }

        table[class=\"main_table\"]{
            width: 700px;
            box-shadow: 0 0 5px #CCCCCC, 0 0 0 #000000 inset;
        }


        @media screen and (max-width: 480px) and (min-width: 321px) {
            td[class=\"padds\"]{
                width: 10px !important;
            }

            td[class=\"wrapper\"]{
                width: 440px !important;
            }

            td[class=\"viewonline\"]{
                width: 310px !important;
                text-align: left !important;
            }

            td[class=\"preheader_padding\"] {
                width: 10px !important;
            }

            table[class=\"main_table\"]{
                width: 460px !important;
            }

            table[class=\"master_table\"]{
                width: 460px !important;
            }

            td[class=\"logo\"] img {
                display: none !important;
            }

            td[class=\"logo\"] {
                background: url('images/logo_mb.png') no-repeat;
                width: 137px !important;
                display: block;
                height: 82px !important;
            }

            td[class=\"mail_headline\"] {
                width: 440px !important;
            }

            td[class=\"call_to_action\"] {
                width: 440px !important;
            }

            td[class=\"main_image\"] img {
                display: none !important;
            }

           

            td[class=\"call_to_action_download\"] {
                width: 440px !important;
            }

            td[class=\"section_title\"]{
                width: 440px !important;
            }

            td[class=\"one_half\"]{
                width: 210px !important;
            }

            td[class=\"one_half_padding\"]{
                width: 20px !important;
            }

            td[class=\"one_half_image\"] img{
                width: 210px !important;
                height: 82px !important;
            }

            body {
                margin: 10px 0 !important;
            }

            td[class=\"navigation\"]{
                width: 290px !important;
            }

            td[class=\"navigation_space\"]{
                width: 10px !important;
            }
        }

        @media screen and (max-width: 320px) {
            td[class=\"padds\"]{
                width: 10px !important;
            }

            td[class=\"wrapper\"]{
                width: 280px !important;
            }

            td[class=\"viewonline\"]{
                width: 140px !important;
                text-align: left !important;
            }

            td[class=\"preheader_padding\"] {
                width: 10px !important;
            }

            table[class=\"main_table\"]{
                width: 300px !important;
            }

            table[class=\"master_table\"]{
                width: 300px !important;
            }

            td[class=\"logo\"] img {
                display: none !important;
            }

            td[class=\"logo\"] {
                background: url('images/logo_mb.png') no-repeat;
                width: 137px !important;
                display: block;
                height: 82px !important;
                clear: both;
                margin: 0 auto;
            }

            td[class=\"main_image\"] img {
                display: none !important;
            }

            td[class=\"main_image\"] {
                width: 280px !important;
                height: 228px !important;
                background: url('images/wd-email1_21.png') no-repeat;
                background-size: cover;
                display: block;
            }

            td[class=\"mail_headline\"] {
                width: 280px !important;
                font-size: 26px !important;
            }

            td[class=\"call_to_action\"] {
                width: 280px !important;
                font-size: 26px !important;
            }

            td[class=\"main_image\"] img {
                width: 280px !important;
                height: 163px !important;
            }

            td[class=\"call_to_action_download\"] {
                width: 280px !important;
            }

            td[class=\"section_title\"]{
                width: 280px !important;
            }

            td[class=\"one_half\"]{
                width: 280px !important;
                display: block;
                clear: both;
            }

            table[class=\"one_half_mobile\"]{
                margin-bottom: 50px !important;
            }

            td[class=\"one_half_padding\"]{
                display: none;
            }

            td[class=\"one_half_image\"] img{
                width: 280px  !important;
            }

            body {
                margin: 10px 0 !important;
            }

            td[class=\"navigation\"]{
                width: 280px !important;
                display: block;
                text-align: center !important;
                margin-top: 10px !important;
            }

            td[class=\"navigation_space\"]{
                display: none;
            }

            td[class=\"footer_social_holder\"]{
                width: 130px !important;
                display: block;
                text-align: left;
                margin: 0 auto !important;
                text-align: center;
            }

            td[class=\"footer_social_vertical_spacer\"]{
                width: 280px !important;
                height: 0px !important;
            }

            td[class=\"footer\"]{
                width: 280px !important;
                display: block;
                margin: 0 auto 10px !important;
                text-align: center;
            }

            td[class=\"footer_padding\"]{
                display: none;
            }

            td[class=\"footer_nav\"] {
                font-size: 10px;
            }
        }

    </style>

</head>
<body style=\"background-color: #f5fbff; font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #292929; margin: 20px 0;\">

    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"main_table\" style=\"width: 700px; box-shadow: 0 0 5px #CCCCCC, 0 0 0 #000000 inset;\">
        <tr>
            <td class=\"master_table\" style=\"width: 700px;\" bgcolor=\"#ffffff\">
                <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                    <tr>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                        <td class=\"wrapper\" style=\"width: 600px;\">
                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"10\">
                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\">
                                        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                            <tr>
                                                <td class=\"preheader_padding\" style=\"width: 130px;\" align=\"left\">
                                                </td>
                                                <td class=\"viewonline\" style=\"width: 340px; text-align: center; color: #8e8e8e; font-size: 10px;\" align=\"left\">
                                                    <a href=\"http://www.geminadas.com\" style=\" color: #8e8e8e;\">www.geminadas.com</a>
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"10\">
                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\">
                                        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                            <tr>
                                                <td class=\"logo\" align=\"left\" style=\"width: 215px;\">
                                                    <a href=\"#\" class=\"nodecoration\" style=\"text-decoration: none;\">
                                                        <img src=\"http://geminadas.com/img/logo-geminadas.png\" style=\"display: block;\" border=\"0\" alt=\"Geminadas.com\"  />
                                                    </a>
                                                </td>
                                                <td class=\"navigation\" align=\"right\" valign=\"middle\" style=\"width: 375px; text-align:right;\">
                                                    <a href=\"http://www.geminadas.com/quemsomos.php\" class=\"nodecoration\" style=\"color: #000000; text-decoration: none;\">
                                                        Quem Somos
                                                    </a>
                                                    &nbsp; &nbsp; &nbsp;
                                                    <a href=\"http://www.geminadas.com/nossodiferencial.php\" class=\"nodecoration\" style=\"color: #000000; text-decoration: none;\">
                                                        Nosso Diferencial
                                                    </a>
                                                    &nbsp; &nbsp; &nbsp;
                                                    <a href=\"http://www.geminadas.com/contato.php\" class=\"nodecoration\" style=\"color: #000000; text-decoration: none;\">
                                                        Contato
                                                    </a>
                                                </td>
                                                <td class=\"navigation_space\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"20\">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class=\"master_table\" style=\"width: 700px;\" bgcolor=\"#ffffff\">
                <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                    <tr>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                        <td class=\"wrapper\" style=\"width: 600px;\">
                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\">
                                        <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                            <tr>
                                                <td class=\"mail_headline\" style=\"font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 50px; text-align: left; width: 600px;\">

                                                    <strong>Informações sobre o Projeto</strong>:<br />
                                                    <br />
                                                    <strong>Código da Planta:</strong> $cod_planta<br />
                                                    <strong>Código da Fachada:</strong> $cod_fachada<br />
                                                    <strong>Observações:</strong> $observacoes<br />
                                                    <br />
                                                    <br />
                                                    <strong>Informações Pessoais</strong>:<br />
                                                    <br />
                                                    <strong>Nome Completo:</strong> $nome<br />
                                                    <strong>E-mail:</strong> $email<br />
                                                    <strong>Telefone:</strong> $telefone<br />
                                                    <strong>Cidade-UF:</strong> $cidade - $estado<br />

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                                                                
                            </table>
                        </td>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                    </tr>
                </table>
            </td>
        </tr>      
        <tr>
            <td bgcolor=\"#e7e7e7\" height=\"1\" class=\"master_table\" style=\"width: 700px;\">
            </td>
        </tr>
        <tr>
            <td class=\"master_table\" style=\"width: 700px;\" bgcolor=\"#ffffff\" >
                <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                    <tr>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                        <td class=\"wrapper\">
                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"30\">
                                    </td>
                                </tr> 
                                 
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"30\">
                                    </td>
                                </tr> 
                            </table>
                        </td>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                    </tr>
                </table>
            </td>
        </tr>     
        <tr>
            <td bgcolor=\"#575757\" height=\"1\" class=\"master_table\" style=\"width: 700px;\">
            </td>
        </tr>
        <tr>
            <td class=\"master_table\" style=\"width: 700px;\" bgcolor=\"#444444\">
                <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                    <tr>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                        <td class=\"wrapper\">
                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"30\">
                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"location\" style=\"text-align:center; font-size: 12px; color: #ffffff; width: 600px; line-height: 20px;\">

                                        www.geminadas.com - Geminadas.com 

                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"footer_nav\" style=\"line-height: 25px; font-size: 12px; color: #838383; text-align: center;\">
                                        <a href=\"http://www.geminadas.com/contato.php\" style=\"color: #838383; text-decoration: none;\">
                                            Contato
                                        </a>
                                        &nbsp; | &nbsp;
                                        <a href=\"http://www.geminadas.com\" style=\"color: #838383; text-decoration: none;\">
                                            Site Geminadas
                                        </a>
                                        

                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"content\" style=\"width: 600px;\" height=\"30\">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class=\"padds\" style=\"width: 50px;\" >
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";
        $_config->Conteudo = $Conteudo;

// CLASSE PARA ENVIO DE ARQUIVOS EM ANEXO 
        $Arquivo = new stdClass();
        $diretorio = $_FILES['arquivo']['tmp_name'];
        $arquivo = $_FILES['arquivo']['name'];
        $Arquivo->diretorio = "$diretorio";
        $Arquivo->nome = "$arquivo";
        $_config->Arquivo = $Arquivo;

        try {
            $EnviaEmail->enviaEmail($_config);
            @unlink($arquivo);

            exit('success');
        } catch (Exception $e) {
            exit('error');
        }
    }
} else {
    echo "Dados Inválidos.";
    exit;
}
?>
