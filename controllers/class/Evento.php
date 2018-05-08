<?php

class Evento {

    private $idEvento;
    private $nome;
    private $dataInicio;
    private $dataTermino;
    private $horaInicio;
    private $local;
    private $coordenadas;
    private $img;

    public function setIdEvento($idEvento){
        $this->idEvento = $idEvento;
    }

    public function getIdEvento(){
        return $this->idEvento; 
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome; 
    }

    public function setDataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }

    public function getDataInicio(){
        return $this->dataInicio;
    }

    public function setDataTermino($dataTermino){
        $this->dataTermino = $dataTermino;
    }

    public function getDataTermino(){
        return $this->dataTermino;
    }

    public function setHoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }

    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setLocal($local){
        $this->local = $local;
    }

    public function getLocal(){
        return $this->local; 
    }

    public function setCoordenadas($coordenadas){
        $this->coordenadas = $coordenadas;
    }

    public function getCoordenadas(){
        return $this->coordenadas; 
    }

    public function setImg($img){
        $this->img = $img;
    }

    public function getImg(){
        return $this->img; 
    }
}