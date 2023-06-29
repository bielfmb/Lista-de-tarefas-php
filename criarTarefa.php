<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $descricao = "Sem descrição";
        $datainicio = date('Y/m/d');
        $datafim = date('Y/m/d');

        if (isset($_POST['submit'])) {
            include_once('config.php');
            
            if ($_POST['descricao'] != null) {
                $descricao = $_POST['descricao'];
            }
            if ($_POST['datainicio'] != null) {
                $datainicio = $_POST['datainicio'];
            }
            if ($_POST['datafim'] != null) {
                
            $datafim = $_POST['datafim'];
            }
 
            $result = mysqli_query($conexao, "INSERT INTO tarefas(descricao, datainicio, datafim) VALUES ('$descricao', '$datainicio', '$datafim');");
        }
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <fieldset>
            <legend>Criar Tarefa</legend>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?=$descricao?>">
            <br>
            <label for="datainicio">Data de início:</label>
            <input type="date" name="datainicio" id="datainicio" value="<?=$datainicio?>">
            <br>
            <label for="datafim">Data de término:</label>
            <input type="date" name="datafim" id="datafim" value="<?=$datafim?>">
            <br>
            <input type="submit" name="submit" value="Enviar" class="submit_btn">
            <input type="reset" value="Limpar" class="submit_btn">
            <a href="index.php"><input type="button" value="Voltar" class="submit_btn"></a>
        </fieldset>
    </form>
</body>
</html>