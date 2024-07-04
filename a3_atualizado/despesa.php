<?php
session_start();

/*if( !isset($_SESSION["logado"]) || $_SESSION["logado"] == false ){
    header("Location: index.php");
}else{
*/
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
</head>

<body>

    <h1>Cadastro de Despesas</h1>

    <form method="POST" action="controller/salvarDespesa.php?inserir">
    <label for="nome" class="form-label">Nome da Despesa:</label>
            <input class="form-control" type="text" name="txtNome" id="nomeDespesa" required>
            <br>

            <input type="submit" value="Cadastrar Despesa" class="btn btn-success mt-2">
    </form>
    <hr>

    <?php
    include_once("model/clsDespesa.php");
    include_once("dao/clsDespesaDAO.php");
    include_once("dao/clsConexao.php");

    $despesas = DespesaDAO::getDespesas();

    if( count($despesas) == 0 ){
        echo "<h1>Nenhuma despesa cadastrada!</h1>";
    }else{
?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>

        <?php
            
            foreach($despesas as $des){
                $id= $des->idDespesa;
                $nome= $des->nomeDespesa;
            
                echo "  <tr>
                            <td>$id</td>
                            <td>$nome</td>
                    
                            <td><a href='editarDespesa.php?id=$id'><button>Editar</button></a></td>
                        
                        <td><a onclick='return confirm(\"Você tem certeza que deseja apagar?\")'
                        href='controller/salvarDespesa.php?excluir&id=$id'>
                                <button>Excluir</button></a></td>
                        </tr>";
        }
        
                

    
       /*     if( isset($_REQUEST["nome"])){
                $nome = $_REQUEST["nome"];
                echo "  <tr>
                            <td>3</td>
                            <td>$nome</td>
                            <td><button>Editar</button></td>
                            <td><button>Excluir</button></td>
                        </tr>";
            }
            */
        ?>
    </table>



    <?php

        }

        if( isset($_REQUEST["despesaExcluida"])){
            echo "<script> alert('Despesa excluída com sucesso!'); </script>";
        }

        if( isset($_REQUEST["nome"])){
            $nome = $_REQUEST["nome"];
            echo "<script> alert('Despesa $nome cadastrada com sucesso!'); </script>";
        }
    ?>

</script>
</body>

</html>
