<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Encargo.php';

class EncargoDAO
{
    private $con;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function inserir($encargo)
    {
        $sql = 'INSERT INTO encargo(nome, sigla) VALUES(:nome, :sigla)';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':nome', $encargo->getIdLider());
        $prep->bindValue(':sigla', $encargo->getSigla());
        $prep->execute();
    }

    public function listar()
    {
        $sql = 'SELECT * FROM encargo';
        $prep = $this->con->prepare($sql);
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $exec;
    }

    public function alterar($encargo)
    {
        $sql = 'UPDATE encargo SET nome = :nome, sigla = :sigla WHERE id_encargo = :idEncargo';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idEncargo', $encargo->setIdencargo());
        $prep->bindValue(':nome', $encargo->setNome());
        $prep->bindValue(':sigla', $encargo->setSigla());
        $prep->execute();
    }

    public function consultar($codigo)
    {
        $sql = 'SELECT * FROM encargo WHERE id_encargo = :idEncargo';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idEncargo', $codigo);
        $prep->execute();
        $encargo = new encargo();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
            $encargo->setIdEncargo($linha['id_encargo']);
            $encargo->setNome($linha['nome']);
            $encargo->setSigla($linha['sigla']);
        }
        return $encargo;
    }

    public function excluir($codigo)
    {
        $sql = 'DELETE FROM encargo WHERE id_encargo = :idEncargo';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idEncargo', $codigo);
        $prep->execute();
    }
}
