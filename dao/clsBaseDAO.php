<?php

class BaseDAO{


    public static function inserir($base){
        $nome = $base->nomeBase;
        $responsavel = $base->responsavelBase;
        $telefone = $base->telefoneBase;
        $celular = $base->celularBase;
        $email = $base->emailBase;

        
        $sql = "INSERT INTO usuario (nomeBase, responsavelBase, telefoneBase,
        celularBase, emailBase, ativo) VALUES ('$nome', '$responsavel', '$telefone',
        '$celular','$email', 'S');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }
    
        $result = Conexao::consultar($sql);
            if (mysqli_num_rows($result) == 0){
                return null;
            }else{
                list($_id, $_nome, $_email) = mysqli_fetch_row($result);
                $user = new Base($_id, $_nome, $_email);
                return $user;
            }
    }

    //EDITAR
public static function editar( $base, $id ){
    $idBase = $id;
    $nome = $base;
    $sql = "UPDATE base SET nome = '$nome' WHERE id = $idBase ;" ;
    Conexao::executar( $sql );
}

//EXCLUIR
    public static function excluir($idBase){
            $sql = "DELETE FROM base WHERE id = $idBase;";
            Conexao::executar($sql);
            }

    

}



?>