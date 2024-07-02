<?php

class BaseDAO {
    
    // INSERIR
    public static function inserir($base) {
        $nome = $base->nomeBase;
        $responsavel = $base->responsavelBase;
        $telefone = $base->telefoneBase;
        $celular = $base->celularBase;
        $email = $base->emailBase;

        $sql = "INSERT INTO base (nomeBase, responsavelBase, telefoneBase, celularBase, emailBase) 
                VALUES ('$nome', '$responsavel', '$telefone', '$celular', '$email')";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

    // EDITAR
    public static function editar($base, $nom, $resp, $tel, $cel, $em) {
        $id = $base;
        $nome = $nom;
        $responsavel = $resp;
        $telefone = $tel;
        $celular = $cel;
        $email = $em;

        $sql = "UPDATE base SET 
                nomeBase = '$nome',
                responsavelBase = '$responsavel',
                telefoneBase = '$telefone',
                celularBase = '$celular',
                emailBase = '$email'
                WHERE idBase = $id";
        Conexao::executar($sql);
    }

    // EXCLUIR
    public static function excluir($idBase) {
        $sql = "DELETE FROM base WHERE idBase = $idBase";
        Conexao::executar($sql);
    }

    // METODO CONSULTAR BANCO
    public static function getBases() {
        $sql = "SELECT idBase, nomeBase, responsavelBase, telefoneBase, celularBase, emailBase FROM base ORDER BY nomeBase";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != NULL) {
            while ($row = mysqli_fetch_assoc($result)) {
                $base = new Base();
                $base->idBase = $row['idBase'];
                $base->nomeBase = $row['nomeBase'];
                $base->responsavelBase = $row['responsavelBase'];
                $base->telefoneBase = $row['telefoneBase'];
                $base->celularBase = $row['celularBase'];
                $base->emailBase = $row['emailBase'];

                $lista->append($base);
            }
        }
        return $lista;
    }

    public static function getBaseById($id) {
        $sql = "SELECT nomeBase, responsavelBase, telefoneBase, celularBase, emailBase
                FROM base 
                WHERE idBase = $id";

        $result = Conexao::consultar($sql);
        if ($result != NULL) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $base = new Base();
                $base->nomeBase = $row['nomeBase'];
                $base->responsavelBase = $row['responsavelBase'];
                $base->telefoneBase = $row['telefoneBase'];
                $base->celularBase = $row['celularBase'];
                $base->emailBase = $row['emailBase'];

                return $base;
            }
        }
        return null;
    }

}