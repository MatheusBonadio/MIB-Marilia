<?php

class Encargo
{
    private $idEncargo;
    private $nome;
    private $sigla;

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

    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    public function getSigla()
    {
        return $this->sigla;
    }
}
