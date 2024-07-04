<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR BASE</title>
</head>

<body>
    <br>

    <?php 
    $id= $_GET['id'];
    
 

    include_once ("dao/clsConexao.php");
  
    include_once ("model/clsBase.php");
    include_once ("dao/clsBaseDAO.php");


    $base = BaseDAO::getBaseById($id);
    
    ?>

    <h1>Editar Base:</h1>
    <form method="POST" action="controller/salvarBase.php?editar&id=<?=$id ?>">
        <label>Nome: </label>
        <input type="text" value="<?=$base->nomeBase ?>" name="txtNome" />
        <br><br>
        <label>Responsável: </label>
        <textarea rows="10" cols="50" name="txtResponsavel"><?=$base->responsavelBase?></textarea>
        <br><br>
        <label>Telefone: </label>
        <input type="text" value="<?=$base->telefoneBase ?>" id="fone" name="txtTelefone" />
        <br><br>
        <label>Celular: </label>
        <input type="text" value="<?=$base->celularBase ?>" id="cel" name="txtCelular" />
        <br><br>
        <label>Email: </label>
        <textarea rows="10" cols="50" name="txtEmail"><?=$base->emailBase ?></textarea>
        <br><br>
        
        <input type="submit" value="Salvar alterações" />
    </form>
    <br>
    <hr>

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

</body>

</html>