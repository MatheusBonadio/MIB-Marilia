<?php

require_once $_SERVER['DOCUMENT_ROOT']."/controllers/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controllers/class/Evento.php";

class EventoDAO{

	private $con;

	public function __construct(){
		$conexao = new Conexao();
		$this->con = $conexao->getConexao();
	}	

	public function inserir($evento){
		$sql = 'INSERT INTO evento(nome_evento, data_inicio, data_termino, hora_inicio) VALUES(:nomeEvento, :dataInicio, :dataTermino, :horaInicio)';
		$prep = $this->con->prepare($sql);
		$prep->bindValue(':nomeEvento', $evento->getNomeEvento());
		$prep->bindValue(':dataInicio', $evento->getDataInicio());
		$prep->bindValue(':dataTermino', $evento->getDataTermino());
		$prep->bindValue(':horaInicio', $evento->getHoraInicio());
		$prep->execute();
	}

	public function listar(){
		$sql = 'SELECT * FROM evento ORDER BY data_inicio';
		$prep = $this->con->prepare($sql);
		$prep->execute();
		$exec = $prep->fetchAll(PDO::FETCH_ASSOC);
		return $exec;
	}

	public function alterar($evento){
		$sql = 'UPDATE evento SET nome_evento = :nomeEvento, data_inicio = :dataInicio, data_termino = :dataTermino, hora_inicio = :horaInicio WHERE id_evento = :idEvento';
		$prep = $this->con->prepare($sql);
		$prep->bindValue(':idEvento', $evento->getIdEvento());
		$prep->bindValue(':nomeEvento', $evento->getNomeEvento());
		$prep->bindValue(':dataInicio', $evento->getDataInicio());
		$prep->bindValue(':dataTermino', $evento->getDataTermino());
		$prep->bindValue(':horaInicio', $evento->getHoraInicio());
		$prep->execute();
	}

	public function consultar($codigo){
		$sql = "SELECT * FROM evento WHERE id_evento = :idEvento";
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idEvento', $codigo);
        $prep->execute();
        $evento = new Usuario();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
        	$evento->setIdEvento($linha['id_evento']);
        	$evento->setNomeEvento($linha['nome_evento']);
	        $evento->setDataInicio($linha['data_inicio']);
	        $evento->setDataTermino($linha['data_termino']);
	        $evento->setHoraInicio($linha['hora_inicio']);
        }
        return $evento;
	}

	public function excluir($codigo){
		$sql = "DELETE FROM evento WHERE id_evento = :idEvento";
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idEvento', $codigo);
        $prep->execute();
	}

}