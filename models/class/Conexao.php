<?php

class Conexao
{
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'ibav';
    private $conexao;

    // private $servidor = 'localhost';
    // private $usuario = 'id4649026_root';
    // private $senha = 'root1';
    // private $banco = 'id4649026_ibav';
    // private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new PDO("mysql:host=$this->servidor;dbname=$this->banco", $this->usuario, $this->senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('<h1>500 Internal Server Error</h1><hr />'.$e->getMessage());
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}
