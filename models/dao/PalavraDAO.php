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
        $sql = 'SELECT * FROM palavra ORDER BY data desc';
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

    public function consultarId($codigo)
    {
        $sql = 'SELECT *, (select descricao from categoria where categoria.id_categoria = palavra.id_categoria) as categoria, DATE_FORMAT(data, "%d/%m/%Y") AS data_formatada, DATE_FORMAT(data, "%d") as dia, DATE_FORMAT(data, "%m") AS mes, DATE_FORMAT(data, "%Y") AS ano,
        (SELECT sigla FROM encargo WHERE palavra.id_lider = lider.id_lider AND encargo.id_encargo = lider.id_encargo) AS sigla
        FROM palavra, lider WHERE id_palavra = :idPalavra AND lider.id_lider = palavra.id_lider';
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idPalavra', $codigo);
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        $arrayMonth = array(
            '01'=>'Janeiro',	'02'=>'Fevereiro',		'03'=>'Março',
            '04'=>'Abril',	'05'=>'Maio',		'06'=>'Junho',
            '07'=>'Julho',	'08'=>'Agosto',		'09'=>'Setembro',
            '10'=>'Outubro',	'11'=>'Novembro',		'12'=>'Dezembro'
        );
        $exec[0]['mes'] = $arrayMonth[$exec[0]['mes']];
        return $exec[0];
    }

    public function listarFormatado($limit = null)
    {
        if (!is_null($limit)) {
            $sql = 'SELECT *, (select descricao from categoria where categoria.id_categoria = palavra.id_categoria) as categoria, DATE_FORMAT(data, "%d/%m/%Y") AS data_formatada, DATE_FORMAT(data, "%d") AS dia, DATE_FORMAT(data, "%m") AS mes, DATE_FORMAT(data, "%Y") AS ano FROM palavra ORDER BY data desc LIMIT :limitIndex';
        } else {
            $sql = 'SELECT *, (select descricao from categoria where categoria.id_categoria = palavra.id_categoria) as categoria, DATE_FORMAT(data, "%d/%m/%Y") AS data_formatada, DATE_FORMAT(data, "%d") AS dia, DATE_FORMAT(data, "%m") AS mes, DATE_FORMAT(data, "%Y") AS ano FROM palavra ORDER BY data desc';
        }
        $prep = $this->con->prepare($sql);
        if (!is_null($limit)) {
            $prep->bindValue(':limitIndex', (int) $limit, PDO::PARAM_INT);
        }
        $prep->execute();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        $arrayMonth = array(
              '01'=>'JAN',	'02'=>'FEV',		'03'=>'MAR',
              '04'=>'ABR',	'05'=>'MAIO',		'06'=>'JUN',
              '07'=>'JUL',	'08'=>'AGO',		'09'=>'SET',
              '10'=>'OUT',	'11'=>'NOV',		'12'=>'DEZ'
          );
        foreach ($exec as $key=>$list) {
            $exec[$key]['mes'] = $arrayMonth[$list['mes']];
        }
        return $exec;
    }
}
