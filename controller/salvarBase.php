<?php

include_once("../dao/clsConexao.php");

include_once("../dao/clsBaseDAO.php");
include_once("../model/clsBase.php");

//INSERIR USUARIO

if(isset($_REQUEST["inserir"])){
    $nome = $_POST["txtNome"];
    $responsavel = $_POST["txtResponsavel"];
    $telefone = $_POST["txtTelefone"];
    $celular = $_POST["txtCelular"];
    $email = $_POST["txtEmail"];
    
    if(strlen($nome) == 0 ){
        header("Location: ../base.php?nomeVazio");
    }elseif(strlen($responsavel) == 0 ){
            header("Location: ../base.php?responsavelVazio");
    }elseif(strlen($telefone) == 0 ){
                header("Location: ../base.php?telefoneVazio");
    }elseif(strlen($celular) == 0 ){
                    header("Location: ../base.php?celularVazio");
    }elseif(strlen($email) == 0 ){
                        header("Location: ../base.php?emailVazio");
    }else{
        $base = new Base();
        $base->nomeBase = $nome;
        $base->responsavelBase = $responsavel;
        $base->telefoneBase = $telefone;
        $base->celularBase = $celular;
        $base->emailBase = $email;
        BaseDAO:: inserir($base);
        header("Location: ../base.php?nome=$nome");
    }
}

// EXCLUIR USUARIO

if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    BaseDAO:: excluir($id);
    header("Location: ../base.php?baseExcluida");
}


// EDITAR USUARIO

if( isset( $_REQUEST["editar"] ) &&  isset( $_REQUEST["id"] ) ){
    $nome = $_POST["txtNome"];
    $responsavel = $_POST["txtResponsavel"];
    $telefone = $_POST["txtTelefone"];
    $celular = $_POST["txtCelular"];
    $email = $_POST["txtEmail"];   
    $id = $_REQUEST["id"];
    BaseDAO::editar( $base, $resp, $tel, $cel, $em, $idBase );
    header( "Location: ../base.php?baseEditada");
}