<?php
include 'DAOLead.php';

class LandingForm {
    public function salvar($lead) {
        $dao = new DAOLead();
        return $dao->salvar($lead);
    }
}