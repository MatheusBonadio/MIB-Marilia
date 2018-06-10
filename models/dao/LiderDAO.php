<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Lider.php';

class LiderDAO
{
    private $con;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function inserir($lider)
    {
        $sql = 'INSERT INTO lider(id_encargo, nome) VALUES(:idEncargo, :nome)';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idEncargo', $lider->getIdEncargo());
        $prep->bindValue(':nome', $lider->getNome());
        $prep->execute();
    }

    public function listar()
    {
        $sql = 'SELECT * FROM lider';
        $prep = $this->con->prepare($sql);
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $exec;
    }

    public function alterar($lider)
    {
        $sql = 'UPDATE lider SET id_usuario = :idUsuario, id_encargo = :idEncargo, nome = :nome, rede = :rede WHERE id_lider = :idLider';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idLider', $lider->getIdLider());
        $prep->bindValue(':idUsuario', $lider->getIdUsuario());
        $prep->bindValue(':idEncargo', $lider->getIdEncargo());
        $prep->bindValue(':nome', $lider->getNome());
        $prep->bindValue(':rede', $lider->getRede());
        $prep->execute();
    }

    public function consultar($codigo)
    {
        $sql = 'SELECT * FROM lider WHERE id_lider = :idLider';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idLider', $codigo);
        $prep->execute();
        $lider = new Lider();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
            $lider->setIdLider($linha['id_lider']);
            $lider->setIdUsuario($linha['id_usuario']);
            $lider->setIdEncargo($linha['id_encargo']);
            $lider->setNome($linha['nome']);
            $lider->setRede($linha['rede']);
        }
        return $lider;
    }

    public function excluir($codigo)
    {
        $sql = 'DELETE FROM lider WHERE id_lider = :idLider';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idLider', $codigo);
        $prep->execute();
    }
}
