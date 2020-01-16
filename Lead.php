<?php

class Lead {
    private $nome;
    private $email;
    private $telefone;
    private $mensagem;

    function __construct($nm, $mail, $tel, $msg) {
        $this->nome = $nm;
        $this->email = $mail;
        $this->telefone = $tel;
        $this->mensagem = $msg;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nm) {
        $this->nome=$nm;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($mail) {
        $this->email=$mail;
    }
    
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($tel) {
        $this->telefone=$tel;
    }
    
    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($msg) {
        $this->mensagem=$msg;
    }
}