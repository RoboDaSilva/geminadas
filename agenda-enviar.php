<?php
require 'init.php';

include_once 'admin/model/Empresa.php';

$model_empresa = new Model_Empresa();
$empresa = $model_empresa->find(1);

function envia_email($remetente, $email_remetente, $destinatario, $assunto, $mensagem) {
    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers .= "Return-Path: " . $email_remetente . " \n";
    $headers .= "Date: " . date('r') . " \n";
    $headers .= "From: " . $email_remetente . " \n";
    $headers .= "Sender: " . $email_remetente . " \n";
    $headers .= "Reply-To: " . $email_remetente . " \n";
    $headers .= "Organization: " . $remetente . " \n";
    $headers .= "X-Sender: " . $email_remetente . " \n";
    $headers .= "X-Priority: 3 \n";
    $headers .= "X-Mailer: PHP" . phpversion() . " \n";

    mail($destinatario, $assunto, $mensagem, $headers);
    
    return true;
}
$data_atual = date('d/m/Y') . " às " . date("H:i:s");

if (isset($_POST)) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    $mensagem = trim($_POST['mensagem']);

    if ($nome == "") {
        echo "<script>alert('Preencha o campo Nome');history.back();</script>";
        exit;
    } else if ($email == "") {
        echo "<script>alert('Preencha o campo E-mail');history.back();</script>";
        exit;
    } else if ($date == "") {
        echo "<script>alert('Preencha o campo Assunto');history.back();</script>";
        exit;
    } else if ($mensagem == "") {
        echo "<script>alert('Preencha o campo Mensagem');history.back();</script>";
        exit;
    } else {
        $body = utf8_decode("<font face='Tahoma'>
                Solicitação de agendamento enviado em: {$data_atual}
                <br /><br />
                <strong>Nome Completo:</strong> $nome<br />
                <strong>E-mail:</strong> $email<br />
                <strong>Data e horário:</strong> $date às $time<br />
                <strong>Mensagem:</strong> $mensagem<br />
            </font>
        ");
        if (envia_email($nome, $email, $empresa['email'], utf8_decode("Agendamento enviado pelo site"), $body)) {
            echo "sucess";
            exit;
        } else {
            echo "error";
            exit;
        }
    }
} else {    
    echo "Dados Inválidos.";
    exit;
}
?>
