<?php
class BaseDAO{

// METODOS ESCREVER BANCO

//INSERIR
    public static function inserir($base){
        $nome = $base->nomeBase;
        $responsavel = $base->responsavelBase;
        $telefone = $base->telefoneBase;
        $celular = $base->celularBase;
        $email = $base->emailBase;

        $sql = "INSERT INTO base (nomeBase, responsaveBase, telefoneBase, celularBase, emailBase
         VALUES ('$nome', '$responsavel', '$telefone', '$celular', '$email', 'S');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

//EDITAR
    public static function editar($base, $resp, $tel, $cel, $em, $idBase){
        $nome = $base;
        $responsavel = $resp;
        $telefone = $tel;
        $celular = $cel;
        $email = $em;
        $id = $idBase;

        $sql = "UPDATE base SET 
                nome = '$nome',
                responsavel = '$responsavel',
                telefone = '$telefone',
                celular = '$celular',
                email = '$email'
                WHERE id = $id;" ;
        Conexao::executar( $sql );
    }


//EXCLUIR
    public static function excluir($idBase){
            $sql = "DELETE FROM base WHERE id = $idBase;";
            Conexao::executar($sql);
            }

// METODO CONSULTAR BANCO
    public static function getBases(){
        //retorna todas os produtos
        $sql = "SELECT p.id
            FROM base p 
            ORDER BY p.nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NULL){
            while(list($_id, $_nome, $_responsavel, $_telefone, 
            $_celular, $_email) = mysqli_fetch_row($result)){
                $base=new Base();
                $base->idBase = $_id;
                $base->nomeBase = $_nome;
                $base->responsavelBase = $_responsavel;
                $base->telefoneBase = $_telefone;
                $base->celularBase = $_celular;
                $base->emailBase = $_email;

                $lista->append($base);
            }
        }
        return $lista;
    }

    public static function getBaseById($id){
        $sql = "SELECT p.nome, p.responsavel, p.telefone, p.celular, p.email
        from base p WHERE p.id = $id";
        
        $result = Conexao::consultar( $sql );
        if( $result != NULL ){
            $row = mysqli_fetch_assoc($result);
            if($row){
                $base = new Base();
                $base->nomeBase = $row['nome'];
                $base->responsavelBase = $row['responsavel'];
                $base->telefoneBase = $row['telefone'];
                $base->celularBase = $row['celular'];
                $base->emailBase = $row['email'];

                return $base;
    }
}
return null;
    }

}