<?php

class Inscricao {

    private $idInscricao;
    private $idUsuario;
    private $idEvento;
    private $idLider;
    private $celula;
    private $dataPago;

    public function setIdInscricao($idInscricao){
        $this->idInscricao = $idInscricao;
    }

    public function getIdInscricao(){
        return $this->idInscricao; 
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario(){
        return $this->idUsuario; 
    }

    public function setIdEvento($idEvento){
        $this->idEvento = $idEvento;
    }

    public function getIdEvento(){
        return $this->idEvento; 
    }

    public function setIdLider($idLider){
        $this->idLider = $idLider;
    }

    public function getIdLider(){
        return $this->idLider;
    }

    public function setCelula($celula){
        $this->celula = $celula;
    }

    public function getCelula(){
        return $this->celula;
    }

    public function setDataPago($dataPago){
        $this->dataPago = $dataPago;
    }

    public function getDataPago(){
        return $this->dataPago;
    }

}