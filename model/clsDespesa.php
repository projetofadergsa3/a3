<?php

class Despesa{

    public $idDespesa, $nomeDespesa, $dataCadastro, $ativo;

    public function __construct($idDespesa = NULL, $nomeDespesa = NULL,
     $dataCadastro = NULL, $ativo = NULL){

        $this->idDespesa = $idDespesa;
        $this->nomeDespesa = $nomeDespesa;
        $this->dataCadastro = $dataCadastro;
        $this->ativo = $ativo;             
    }
}