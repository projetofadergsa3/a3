<?php

class Despesa{

    public $idDespesa, $idUsuario, $idCredor, $nomeDespesa, $dataCadastro, $ativo;

    public function __construct($idDespesa = NULL, $idUsuario = NULL, $idCredor = NULL, $nomeDespesa = NULL,
     $dataCadastro = NULL, $ativo = NULL){

        $this->idDespesa = $idDespesa;
        $this->idUsuario = $idUsuario;
        $this->idCredor = $idCredor;
        $this->nomeDespesa = $nomeDespesa;
        $this->dataCadastro = $dataCadastro;
        $this->ativo = $ativo;             
    }
}