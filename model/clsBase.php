<?php

class Base{

    public $idBase, $nomeBase, $dataCadastro, 
    $responsavelBase, $telefoneBase, $celularBase, $emailBase, $ativo;

    public function __construct($idBase = NULL, $nomeBase = NULL, $dataCadastro = NULL, 
    $responsavelBase = NULL, $telefoneBase = NULL, $celularBase = NULL,$emailBase = NULL, $ativo = NULL){

        $this->idBase = $idBase;
        $this->nomeBase = $nomeBase;
        $this->dataCadastro = $dataCadastro;
        $this->responsavelBase = $responsavelBase; 
        $this->telefoneBase = $telefoneBase;
        $this->celularBase = $emailBase; 
        $this->ativo = $ativo;             
    }
}