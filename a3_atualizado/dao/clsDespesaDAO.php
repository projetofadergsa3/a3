<?php

class DespesaDAO {
    
    // INSERIR
    public static function inserir($despesa) {
        $nome = $despesa->nomeDespesa;

        $sql = "INSERT INTO despesa (nomeDespesa) VALUES ('$nome')";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

    // EDITAR
    public static function editar($despesa, $nom) {
        $id = $despesa;
        $nome = $nom;

        $sql = "UPDATE despesa SET 
                nomeDespesa = '$nome'
                WHERE idDespesa = $id";
        Conexao::executar($sql);
    }

    // EXCLUIR
    public static function excluir($idDespesa) {
        $sql = "DELETE FROM despesa WHERE idDespesa = $idDespesa";
        Conexao::executar($sql);
    }

    // METODO CONSULTAR BANCO
    public static function getDespesas() {
        $sql = "SELECT idDespesa, nomeDespesa FROM despesa ORDER BY nomeDespesa";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != NULL) {
            while ($row = mysqli_fetch_assoc($result)) {
                $despesa = new Despesa();
                $despesa->idDespesa = $row['idDespesa'];
                $despesa->nomeDespesa = $row['nomeDespesa'];

                $lista->append($despesa);
            }
        }
        return $lista;
    }

    public static function getDespesaById($id) {
        $sql = "SELECT nomeDespesa
                FROM despesa
                WHERE idDespesa = $id";

        $result = Conexao::consultar($sql);
        if ($result != NULL) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $despesa = new Despesa();
                $despesa->nomeDespesa = $row['nomeDespesa'];

                return $despesa;
            }
        }
        return null;
    }

}