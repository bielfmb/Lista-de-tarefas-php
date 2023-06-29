<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas com PHP</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if (isset($_POST['atualizar'])) {
            include_once('config.php');

            for ($i = 0; $i <= sizeof($_POST['terminada']); $i++) {
                if(isset($_POST['terminada'])){
                    if(in_array("$i", $_POST['terminada'])){
                        $terminada = 1;
                    } else {
                        $terminada =  0;
                    }
                    $result = mysqli_query($conexao, "UPDATE tarefas SET terminada = '$terminada' WHERE id = '$i'");
                }
            }
        }
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <fieldset>
                <legend>Tarefas</legend>
                <table>
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Descrição</th>
                            <th>Data de início</th>
                            <th>Data de término</th>
                            <hr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('config.php');

                            $registros = consultarRegistro("SELECT COUNT(*) as total FROM tarefas")['total'];
                            if ($registros == 0) {
                                header('Location: criarTarefa.php');
                            }

                            function verificarTermino($concluida) : string {
                                if ($concluida == true) {
                                    return "checked";
                                } else {
                                    return "";
                                }
                            }

                            for ($i = 0; $i <= $registros; $i++) {
                                $dbDescricao = consultarRegistro("SELECT descricao FROM tarefas WHERE id = '$i++'")['descricao'];
                                $dbDatainicio = consultarRegistro("SELECT datainicio FROM tarefas WHERE id = '$i++'")['datainicio'];
                                $dbDatafim = consultarRegistro("SELECT datafim FROM tarefas WHERE id = '$i++'")['datafim'];
                                $dbTerminada = consultarRegistro("SELECT terminada FROM tarefas WHERE id = '$i++'")['terminada'];

                                echo "<tr>
                                <td><input type=\"checkbox\" name=\"terminada[]\" value=\"$i\"" . verificarTermino($dbTerminada) ." class=\"check\"></td>
                                <td>$dbDescricao</td>
                                <td>$dbDatainicio</td>
                                <td>$dbDatafim</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                
                <a href="criarTarefa.php"><input type="button" value="Criar tarefa" class="submit_btn"></a>
                <input type="submit" name="atualizar" value="Atualizar" class="submit_btn">
            </fieldset>
    </form>
</body>
</html>