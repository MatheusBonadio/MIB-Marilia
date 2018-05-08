<?php

require_once $_SERVER['DOCUMENT_ROOT']."/controllers/class/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controllers/class/Usuario.php";

class UsuarioDAO{

	private $con;

	public function __construct(){
		$conexao = new Conexao();
		$this->con = $conexao->getConexao();
	}	

	public function inserir($usuario){
		$sql = 'INSERT INTO usuario(login, senha, nome, email, nivel, cpf) VALUES(:login, :senha, :nome, :email, :nivel, :cpf)';
		$prep = $this->con->prepare($sql);
		$prep->bindValue(':login', $usuario->getLogin());
		$prep->bindValue(':senha', $usuario->getSenha());
		$prep->bindValue(':nome', $usuario->getNome());
		$prep->bindValue(':email', $usuario->getEmail());
		$prep->bindValue(':nivel', $usuario->getNivel());
		$prep->bindValue(':cpf', $usuario->getCpf());
		$prep->execute();
	}

	public function listar(){
		$sql = 'SELECT * FROM usuario ORDER BY field(nivel, "Pastor", "Discipulador", "Líder"), nome';
		$prep = $this->con->prepare($sql);
		$prep->execute();
		$exec = $prep->fetchAll(PDO::FETCH_ASSOC);
		return $exec;
	}
	
	public function alterar($usuario){
		$sql = 'UPDATE usuario SET login = :login, senha = :senha, nome = :nome, email = :email, nivel = :nivel, cpf = :cpf WHERE id_usuario = :idUsuario';
		$prep = $this->con->prepare($sql);
		$prep->bindValue(':idUsuario', $usuario->getIdUsuario());
		$prep->bindValue(':login', $usuario->getLogin());
		$prep->bindValue(':senha', $usuario->getSenha());
		$prep->bindValue(':nome', $usuario->getNome());
		$prep->bindValue(':email', $usuario->getEmail());
		$prep->bindValue(':nivel', $usuario->getNivel());
		$prep->bindValue(':cpf', $usuario->getCpf());
		$prep->execute();
	}

	public function consultar($codigo){
		$sql = "SELECT * FROM usuario WHERE id_usuario = :idUsuario";
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idUsuario', $codigo);
        $prep->execute();
        $usuario = new Usuario();
        $exec = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exec as $linha) {
        	$usuario->setIdUsuario($linha['id_usuario']);
	        $usuario->setLogin($linha['login']);
	        $usuario->setSenha($linha['senha']);
	        $usuario->setNome($linha['nome']);
	        $usuario->setEmail($linha['email']);
	        $usuario->setNivel($linha['nivel']);
	        $usuario->setCpf($linha['cpf']);
        }
        return $usuario;
	}

	public function excluir($codigo){
		$sql = "DELETE FROM usuario WHERE id_usuario = :idUsuario";
        $prep = $this->con->prepare($sql);
        $prep->bindValue(':idUsuario', $codigo);
        $prep->execute();
	}

}