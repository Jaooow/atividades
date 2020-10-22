<?php
    include "conexao.php";
    header('Content-Type: application/json');
    $genero = $_POST['genero'];
    $Bandaselecionada = "SELECT nome, id_banda FROM banda WHERE cod_genero = '$genero'";
    $rBanda = mysqli_query($conexao,$Bandaselecionada);

    while($linhaBanda = mysqli_fetch_assoc($rBanda)){
        $resultado[] = $linhaBanda;
    } 
    echo json_encode($resultado);
?>