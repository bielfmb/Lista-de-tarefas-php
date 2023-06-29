<?php 
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '12345';
    $dbName = 'tarefas';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    function consultarRegistro(string $consulta) {  
        $conexao = new mysqli('localhost', 'root', '12345', 'tarefas');

        $busca = $conexao->query($consulta);
        $busca = $busca->fetch_assoc();
        return $busca;
    }
?>