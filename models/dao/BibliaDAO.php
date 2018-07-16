<?php

class BibliaDAO
{
    private $livro_formatado;

    public function __construct()
    {
        $jsonUrl = $_SERVER['DOCUMENT_ROOT'].'/public/json/books.json';
        $jsonData = file_get_contents($jsonUrl, true);
        $this->livro_formatado = json_decode($jsonData, true);
    }

    public function livro($livro, $capitulo, $verso1, $verso2 = null)
    {
        $jsonUrl = $_SERVER['DOCUMENT_ROOT'].'/public/json/bible/'.$livro.'.json';
        $jsonData = file_get_contents($jsonUrl, true);
        $obj = json_decode($jsonData, true);

        echo "<div class='bible'><p>".$this->livro_formatado[$livro]." ".$capitulo."</p>";

        if (isset($verso2)) {
            for ($i=$verso1;$i<=$verso2;$i++) {
                echo "<p><span class='verse'>".$i."</span> ".$obj[$capitulo-1][$i]."</p>";
            }
        } else {
            echo "<p><span class='verse'>".$verso1."</span> ".$obj[$capitulo-1][$verso1]."</p>";
        }
        echo '</div>';
    }
}
