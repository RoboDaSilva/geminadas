<?php

class FollkPHPMailer {

    protected $template;
    protected $subject;
    protected $from;
    protected $address_list;
    protected $replyTo_list = false;
    protected $cc_list = false;
    protected $bcc_list = false;
    protected $attachment_list = false;
    protected $params;
    protected $contents;
    protected $config_mail;

    public function __construct() {
        global $CONFIG;

        if ($CONFIG) {
            $this->config_mail = $CONFIG['mail'];

            $this->from = array($this->config_mail['defaultFrom_email'], $this->config_mail['defaultFrom_name']);

            $this->address_list = array(
                array($this->config_mail['defaultTo_email'], $this->config_mail['defaultTo_name'])
            );
            
            $this->replyTo_list = array(
                array($this->config_mail['defaultReplyTo_email'], $this->config_mail['defaultReplyTo_name'])
            );
        } else {
            $this->config_mail = false;
        }
    }

    public function setTemplate($value) {
        $this->template = $value;
    }

    public function setSubject($value) {
        $this->subject = $value;
    }

    public function setFrom($email, $name) {
        // O e-mail from deve estar no mesmo servidor smtp do host
        $this->from = array($email, $name);
    }

    public function setTo($to_list) {
        $this->address_list = $to_list;
    }

    public function setReplyTo($replyTo_list) {
        $this->replyTo_list = $replyTo_list;
    }

    public function setCC($cc_list) {
        $this->cc_list = $cc_list;
    }

    public function setBCC($bcc_list) {
        $this->bcc_list = $bcc_list;
    }

    public function setAttachment($attachment_list) {
        $this->attachment_list = $attachment_list;
    }

    public function setParams($params) {
        $this->params = $params;
    }

    private function generateContent() {
        $contents = file_get_contents($this->template);

        foreach ($this->params as $key => $value) {
            $contents = str_replace('{{' . $key . '}}', $value, $contents);
        }

        $this->contents = $contents;
    }

    public function send() {
        if (!$this->config_mail) {
            return false;
            exit;
        }

        if (!$this->address_list) {
            return false;
            exit;
        }

        // Gera o Conteúdo
        $this->generateContent();

        $mail = new PHPMailer;

        $mail->IsSMTP();
        $mail->Host = $this->config_mail['transport_host'];
        $mail->Port = $this->config_mail['transport_port'];
        $mail->SMTPAuth = true;
        $mail->Username = $this->config_mail['transport_username'];
        $mail->Password = $this->config_mail['transport_password'];

        // Define o remetente
        $mail->SetFrom($this->from[0], utf8_decode($this->from[1]));

        // Define os destinatários
        foreach ($this->address_list as $value) {
            $mail->AddAddress($value[0], utf8_decode($value[1]));
        }

        // Define as réplicas
        if ($this->replyTo_list) {
            foreach ($this->replyTo_list as $value) {
                $mail->AddReplyTo($value[0], utf8_decode($value[1]));
            }
        }

        // Defini as cópias
        if ($this->cc_list) {
            foreach ($this->cc_list as $value) {
                $mail->AddCC($value[0], utf8_decode($value[1]));
            }
        }

        // Defini as cópias ocultas
        if ($this->bcc_list) {
            foreach ($this->bcc_list as $value) {
                $mail->AddBCC($value[0], utf8_decode($value[1]));
            }
        }

        // Defini os anexos
        if ($this->attachment_list) {
            foreach ($this->attachment_list as $value) {
                $mail->AddAttachment($value[0], utf8_decode($value[1]));
            }
        }

        $mail->IsHTML(true);

        $mail->Subject = utf8_decode($this->subject);
        $mail->AltBody = 'Para visualizar a mensagem, por favor use um visualizador de e-mail HTML compatível!';
        $mail->Body = utf8_decode($this->contents);

        if ($mail->Send()) {
            return true;
        } else {
            echo "Mailer Error: {$mail->ErrorInfo} <br />";
            return false;
        }
    }

}

?>
