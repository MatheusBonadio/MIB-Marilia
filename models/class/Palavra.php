<?php

class Palavra
{
    private $idPalavra;
    private $idLider;
    private $titulo;
    private $texto;
    private $data;
    private $img;

    public function getIdPalavra()
    {
        return $this->idPalavra;
    }

    public function setIdPalavra($idPalavra)
    {
        $this->idPalavra = $idPalavra;
        return $this;
    }

    public function getIdLider()
    {
        return $this->idLider;
    }

    public function setIdLider($idLider)
    {
        $this->idLider = $idLider;
        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }
}
