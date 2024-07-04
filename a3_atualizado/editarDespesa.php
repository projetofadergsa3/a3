<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR DESPESA</title>
</head>

<body>
    <br>

    <?php 
    $id= $_GET['id'];
    
 
    include_once ("dao/clsConexao.php");
  
    include_once ("model/clsDespesa.php");
    include_once ("dao/clsDespesaDAO.php");


    $despesa = DespesaDAO::getDespesaById($id);
    
    ?>

    <h1>Editar Despesa:</h1>
    <form method="POST" action="controller/salvarDespesa.php?editar&id=<?=$id ?>">
        <label>Nome: </label>
        <input type="text" value="<?=$despesa->nomeDespesa ?>" name="txtNome" />
        <br><br>
        
        <input type="submit" value="Salvar alterações" />
    </form>
    <br>
    <hr>

</body>

</html>