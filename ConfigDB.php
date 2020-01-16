<?php
class ConfigDB {
    private $servername = "localhost";
    private $username = "root";
    private $password = "123456";
    private $dbname = "landing";

    public function getConexao() {
        $con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($con->connect_error) {
            die("Falha ao conectar: " . $con->connect_error);
        }
        return $con;
    }
}