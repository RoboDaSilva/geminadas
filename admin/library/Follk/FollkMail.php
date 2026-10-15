<?php

class FollkMail {
    
    protected $php_version;
    protected $use_from;
    protected $template;
    protected $headers;
    protected $subject;
    protected $from;
    protected $to;
    protected $params;
    protected $contents;
    protected $line_break;

    public function __construct() {
        if (PHP_OS == "Linux") {
            $this->line_break = "\n";
        } else if (PHP_OS == "WINNT") {
            $this->line_break = "\r\n";
        } else {
            die("Este script não esta preparado para funcionar com o sistema operacional de seu servidor");
        }
        
        $this->use_from = true;
        $this->php_version = (float) phpversion();
        
        if ($this->php_version <= 5.2) {
            $this->use_from = false;
        }
    }

    public function setTemplate($value) {
        $this->template = $value;
    }

    public function setSubject($value) {
        $this->subject = utf8_decode($value);
    }

    public function setFrom($value) {
        $this->from = $value;
    }

    public function setTo($value) {
        $this->to = $value;
    }

    public function setReplyTo($value) {
        $this->replyTo = $value;
    }

    public function setParams($value) {
        $this->params = $value;
    }

    private function generateContent() {
        $contents = file_get_contents($this->template);

        foreach ($this->params as $key => $value) {
            $contents = str_replace("{{{$key}}}", $value, $contents);
        }

        $this->contents = utf8_decode($contents);
    }

    public function send() {
        // Gera o Conteúdo
        $this->generateContent();

        $this->headers = "MIME-Version: 1.1{$this->line_break}"
                . "Content-type: text/html; charset=iso-8859-1{$this->line_break}"
                . "From: {$this->from}{$this->line_break}"
                . "Return-Path: {$this->from}{$this->line_break}"
                . "Reply-To: {$this->replyTo}{$this->line_break}";

        if ($this->use_from) {
            if (mail($this->to, $this->subject, $this->contents, $this->headers, "-r" . $this->from)) {
                return true;
            } else {
                return false;
            }
        } else {
            if (mail($this->to, $this->subject, $this->contents, $this->headers)) {
                return true;
            } else {
                return false;
            }
        }
    }

}