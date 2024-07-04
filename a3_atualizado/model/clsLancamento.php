<?php

class Lancamento{

    public $idLancamento, $competenciaDespesa, $dataVencimento, 
    $valorLiquido, $valorMulta, $valorCorrecao, $dataCadastro, $ativo, $observacao;

    public function __construct($idLancamento = NULL, $competenciaDespesa = NULL, $dataVencimento = NULL, 
    $valorLiquido = NULL, $valorMulta = NULL, $valorCorrecao = NULL, $dataCadastro = NULL , $ativo = NULL,
    $observacao = NULL
    ){

        $this->idLancamento = $idLancamento;
        $this->competenciaDespesa = $competenciaDespesa;
        $this->dataVencimento = $dataVencimento;
        $this->valorLiquido = $valorLiquido; 
        $this->valorMulta = $valorMulta;
        $this->valorCorrecao = $valorCorrecao;
        $this->dataCadastro = $dataCadastro; 
        $this->ativo = $ativo;   
        $this->observacao = $observacao;          
    }
}