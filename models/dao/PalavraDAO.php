<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/class/Palavra.php';

class PalavraDAO
{
    private $con;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function inserir($palavra)
    {
        $sql = 'INSERT INTO palavra(id_lider, titulo, texto, data, img) VALUES(:idLider, :titulo, :texto, :data, :img)';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idLider', $palavra->getIdLider());
        $prep->bindValue(':titulo', $palavra->getTitulo());
        $prep->bindValue(':texto', $palavra->getTexto());
        $prep->bindValue(':data', $palavra->getData());
        $prep->bindValue(':img', $palavra->getImg());
        $prep->execute();
    }

    public function listar()
    {
        $sql = 'SELECT * FROM palavra ORDER BY data';
        $prep = $this->con->prepare($sql);
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $exec;
    }

    public function alterar($palavra)
    {
        $sql = 'UPDATE palavra SET id_lider = :idLider, titulo = :titulo, texto = :texto, data = :data, img = :img WHERE id_palavra = :idPalavra';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idPalavra', $palavra->setIdPalavra());
        $prep->bindValue(':idLider', $palavra->setIdLider());
        $prep->bindValue(':titulo', $palavra->setTitulo());
        $prep->bindValue(':texto', $palavra->setTexto());
        $prep->bindValue(':data', $palavra->setData());
        $prep->bindValue(':img', $palavra->setImg());
        $prep->execute();
    }

    public function consultar($codigo)
    {
        $sql = 'SELECT * FROM palavra WHERE id_palavra = :idPalavra';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idPalavra', $codigo);
        $prep->execute();
        $palavra = new Palavra();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
            $palavra->setIdPalavra($linha['id_palavra']);
            $palavra->setIdLider($linha['id_lider']);
            $palavra->setTitulo($linha['titulo']);
            $palavra->setTexto($linha['texto']);
            $palavra->setData($linha['data']);
            $palavra->setImg($linha['img']);
        }
        return $palavra;
    }

    public function excluir($codigo)
    {
        $sql = 'DELETE FROM palavra WHERE id_palavra = :idPalavra';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idPalavra', $codigo);
        $prep->execute();
    }

    public function formatarTitulo($titulo)
    {
        $titulo = strtolower(utf8_decode($titulo));
        $i=1;
        $titulo = strtr($titulo, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $titulo = preg_replace("/([^a-z0-9])/", '-', utf8_encode($titulo));
        while ($i>0) {
            $titulo = str_replace('--', '-', $titulo, $i);
        }
        if (substr($titulo, -1) == '-') {
            $titulo = substr($titulo, 0, -1);
        }
        return $titulo;
    }

    public function listarId($codigo)
    {
        $sql = 'SELECT *,
        (SELECT sigla FROM encargo WHERE palavra.id_lider = lider.id_lider AND encargo.id_encargo = lider.id_encargo) AS sigla
        FROM palavra, lider WHERE id_palavra = :idPalavra AND lider.id_lider = palavra.id_lider';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idPalavra', $codigo);
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $exec[0];
    }
}
