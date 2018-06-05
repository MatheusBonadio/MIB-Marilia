<?php

require_once $_SERVER['DOCUMENT_ROOT']."/controllers/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controllers/class/Inscricao.php";

class InscricaoDAO{

	private $con;

	public function __construct(){
		$conexao = new Conexao();
		$this->con = $conexao->getConexao();
	}	

	public function inserir($inscricao){
		$sql = 'INSERT INTO inscricao(id_usuario, id_evento, discipulador, celula, data_pago) VALUES(:idUsuario, :idEvento, :discipulador, :celula, :dataPago)';
		$prep = $this->con->prepare($sql);
		$prep->bindValue(':idUsuario', $inscricao->getIdUsuario());
		$prep->bindValue(':idEvento', $inscricao->getIdEvento());
		$prep->bindValue(':discipulador', $inscricao->getDiscipulador());
		$prep->bindValue(':celula', $inscricao->getCelula());
		$prep->bindValue(':dataPago', $inscricao->getDataPago());
		$prep->execute();
	}

	public function listar(){
		$sql = 'SELECT * FROM inscricao ORDER BY id_evento';
		$prep = $this->con->prepare($sql);
		$prep->execute();
		$exec = $prep->fetchAll(PDO::FETCH_ASSOC);
		return $exec;
	}
	
	public function alterar($inscricao){
		$sql = 'UPDATE inscricao SET id_usuario = :idUsuario, id_evento = :idEvento, discipulador = :discipulador, celula = :celula, data_pago = :dataPago WHERE id_inscricao = :idInscricao';
		$prep = $this->con->prepare($sql);
		$prep->bindValue(':idInscricao', $inscricao->getIdInscricao());
		$prep->bindValue(':idUsuario', $inscricao->getIdUsuario());
		$prep->bindValue(':idEvento', $inscricao->getIdEvento());
		$prep->bindValue(':discipulador', $inscricao->getDiscipulador());
		$prep->bindValue(':celula', $inscricao->getCelula());
		$prep->bindValue(':dataPago', $inscricao->getDataPago());
		$prep->execute();
	}

	public function consultar($codigo){
		$sql = "SELECT * FROM inscricao WHERE id_inscricao = :idInscricao";
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idInscricao', $codigo);
        $prep->execute();
        $inscricao = new Usuario();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
        	$inscricao->setIdInscricao($linha['id_inscricao']);
        	$inscricao->setIdUsuario($linha['id_usuario']);
	        $inscricao->setIdEvento($linha['id_evento']);
	        $inscricao->setDiscipulador($linha['discipulador']);
	        $inscricao->setCelula($linha['celula']);
	        $inscricao->setDataPago($linha['data_pago']);
        }
        return $inscricao;
	}

	public function excluir($codigo){
		$sql = "DELETE FROM inscricao WHERE id_inscricao = :idInscricao";
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idInscricao', $codigo);
        $prep->execute();
	}

}