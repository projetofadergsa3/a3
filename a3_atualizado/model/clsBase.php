<?php

class Base{

    public $idBase, $idUsuario, $nomeBase, $dataCadastro, 
    $responsavelBase, $telefoneBase, $celularBase, $emailBase, $ativo;

    public function __construct($idBase = NULL, $idUsuario = NULL, $nomeBase = NULL, $dataCadastro = NULL, 
    $responsavelBase = NULL, $telefoneBase = NULL, $celularBase = NULL,$emailBase = NULL, $ativo = NULL){

        $this->idBase = $idBase;
        $this->idUsuario = $idUsuario;
        $this->nomeBase = $nomeBase;
        $this->dataCadastro = $dataCadastro;
        $this->responsavelBase = $responsavelBase; 
        $this->telefoneBase = $telefoneBase;
        $this->celularBase = $celularBase;
        $this->emailBase = $emailBase; 
        $this->ativo = $ativo;             
    }
}