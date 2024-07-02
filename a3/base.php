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
    <label for="nome" class="form-label">Nome da Base:</label>
            <input class="form-control" type="text" name="txtNome" id="nome" required>
            <br>

            <label for="responsave" class="form-label">Responsável:</label>
            <input class="form-control" type="resp" name="txtResponsavel" id="responsavel" required>
            <br>

            <label for="telefone" class="form-label">Telefone:</label>
            <input class="form-control" type="tel" name="txtTelefone" id="fone"
            placeholder='(00) 0000-0000'
            required>
            <br>

            <label for="celular" class="form-label">Celular:</label>
            <input class="form-control" type="cel" name="txtCelular" id="cel"
            placeholder='(00) 0000-0000'
            required>
            <br>

            <label for="email" class="form-label">E-mail:</label>
            <input class="form-control" type="email" name="txtEmail" id="email" required>
            <br>

            <input type="submit" value="Cadastrar Base" class="btn btn-success mt-2">
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
            <th>Id</th>
            <th>Nome</th>
            <th>Responsável</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <?php
            
            foreach($bases as $bas){
                $id= $bas->idBase;
                $nome=$bas->nomeBase;
                $responsavel=$bas->responsavelBase;
                $telefone=$bas->telefoneBase;
                $celular=$bas->celularBase;
                $email=$bas->emailBase;
                echo "  <tr>
                            <td>$id</td>
                            <td>$nome</td>
                            <td>$responsavel</td>
                            <td>$telefone</td>
                            <td>$celular</td>
                            <td>$email</td>
                            <td><a href='editarBase.php?id=$id'><button>Editar</button></a></td>
                        
                        <td><a onclick='return confirm(\"Você tem certeza que deseja apagar?\")'
                        href='controller/salvarBase.php?excluir&id=$id'>
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

        if( isset($_REQUEST["baseExcluida"])){
            echo "<script> alert('Base excluída com sucesso!'); </script>";
        }

        if( isset($_REQUEST["nome"])){
            $nome = $_REQUEST["nome"];
            echo "<script> alert('Base $nome cadastrada com sucesso!'); </script>";
        }
    ?>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<script>
    $(document).ready(function(){
        $('#fone').mask('(00) 0000-0000');
        $('#cel').mask('(00) 00000-0000');
    });
</script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</script>
</body>

</html>
