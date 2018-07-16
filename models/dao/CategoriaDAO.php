<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Categoria.php';

class CategoriaDAO
{
    private $con;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function inserir($categoria)
    {
        $sql = 'INSERT INTO categoria(descricao) VALUES(:descricao)';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':descricao', $categoria->getDescricao());
        $prep->execute();
    }

    public function listar()
    {
        $sql = 'SELECT * FROM categoria';
        $prep = $this->con->prepare($sql);
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $exec;
    }

    public function alterar($categoria)
    {
        $sql = 'UPDATE categoria SET descricao = :descricao WHERE id_categoria = :idCategoria';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idCategoria', $categoria->setIdCategoria());
        $prep->bindValue(':descricao', $categoria->setDescricao());
        $prep->execute();
    }

    public function consultar($codigo)
    {
        $sql = 'SELECT * FROM categoria WHERE id_categoria = :idCategoria';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idCategoria', $codigo);
        $prep->execute();
        $categoria = new categoria();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
            $categoria->setIdcategoria($linha['id_categoria']);
            $categoria->setNome($linha['descricao']);
        }
        return $categoria;
    }

    public function excluir($codigo)
    {
        $sql = 'DELETE FROM categoria WHERE id_categoria = :idCategoria';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idCategoria', $codigo);
        $prep->execute();
    }
}
