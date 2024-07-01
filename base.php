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
    <title>Bases</title>
</head>

<body>

    <h1>Cadastro de Bases</h1>

    <form method="POST" action="controller/salvarBase.php?inserir">
    <label for="nome" class="form-label">Nome Completo:</label>
            <input class="form-control" type="text" name="txtNome" id="nome" required>
            <br>

            <label for="responsave" class="form-label">Responsável:</label>
            <input class="form-control" type="resp" name="txtResponsavel" id="responsavel" required>
            <br>

            <label for="telefone" class="form-label">Telefone:</label>
            <input class="form-control" type="tel" name="txtTelefone" id="telefone" required>
            <br>

            <label for="celular" class="form-label">Celular:</label>
            <input class="form-control" type="cel" name="txtCelular" id="celular" required>
            <br>

            <label for="email" class="form-label">E-mail:</label>
            <input class="form-control" type="email" name="txtEmail" id="email" required>
            <br>

            <input type="submit" value="Cadastrar Usuário" class="btn btn-success mt-2">
    </form>
    <hr>

    <?php
    include_once("model/clsBase.php");
    include_once("dao/clsBaseDAO.php");
    include_once("dao/clsConexao.php");

    $bases = BaseDAO::getBases();

    if( count($bases) == 0 ){
        echo "<h1>Nenhuma base cadastrada!</h1>";
    }else{
?>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Responsável</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <?php

        foreach( $bases as $bas ){
            $id = $bas->id;
            
            echo "  <tr>
                        <td>$id</td>
                        <td>".$bas->nome."</td>
                        <td><button>Editar</button></td>
                        <td><a href='controller/salvarBase.php?excluir&id=$id'>
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

    <hr>
    <a href="relatorioCidades.php" target="_blank">Gerar Relatório</a>

    <?php

        }

        if( isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
        }

        if( isset($_REQUEST["baseExcluida"])){
            echo "<script> alert('Base excluída com sucesso!'); </script>";
        }

        if( isset($_REQUEST["nome"])){
            $nome = $_REQUEST["nome"];
            echo "<script> alert('Base $nome cadastrada com sucesso!'); </script>";
        }
    ?>

</body>

</html>
