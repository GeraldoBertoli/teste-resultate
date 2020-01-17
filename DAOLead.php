<?php
include "ConfigDB.php";

class DAOLead {
    public function salvar($lead) {
        $config = new ConfigDB();
        $con = $config->getConexao();

        $nome = $lead->getNome();
        $email = $lead->getEmail();
        $telefone =$lead->getTelefone();
        $mensagem = $lead->getMensagem();

        $sql = "INSERT INTO leads (nome, telefone, email, mensagem) VALUES ('" . $nome ."', '" . $telefone ."', '" . $email ."', '" . $mensagem ."')";
         
        if ($con->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }

        $con->close();
    }
}