<?php

class Lider
{
    private $idLider;
    private $idUsuario;
    private $idEncargo;
    private $nome;
    private $rede;

    public function setIdLider($idLider)
    {
        $this->idLider = $idLider;
    }

    public function getIdLider()
    {
        return $this->idLider;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdEncargo($idEncargo)
    {
        $this->idEncargo = $idEncargo;
    }

    public function getIdEncargo()
    {
        return $this->idEncargo;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setRede($rede)
    {
        $this->rede = $rede;
    }

    public function getRede()
    {
        return $this->rede;
    }
}
