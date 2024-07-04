<?php

include_once("../dao/clsConexao.php");

include_once("../dao/clsDespesaDAO.php");
include_once("../model/clsDespesa.php");

//INSERIR USUARIO

if(isset($_REQUEST["inserir"])){
    $nomeDespesa = $_POST["txtNome"];
    $idUsuario = 1;
    $idCredor = 1;
    
    if(strlen($nome) == 0 ){
        header("Location: ../despesa.php?nomeVazio");
        $despesa = new Despesa();
        $despesa->idDespesa = $id;
        $despesa->nomeDespesa = $nomeDespesa;
        $despesa->idUsuario = $idUsuario;
        $despesa->idCredor = $idCredor;

        DespesaDAO:: inserir($despesa);
        header("Location: ../despesa.php?nome=$nomeDespesa");
    }
}

// EXCLUIR USUARIO

if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    DespesaDAO:: excluir($id);
    header("Location: ../despesa.php?despesaExcluida");
}


// EDITAR USUARIO

if( isset( $_REQUEST["editar"] ) &&  isset( $_REQUEST["id"] ) ){
    $nome = $_POST["txtNome"];
    $id = $_REQUEST["id"];
    DespesaDAO::editar( $id, $nome);
    header( "Location: ../despesa.php?despesaEditada");
}