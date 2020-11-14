<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $bd = "podcast";

    if(!$conexao = mysqli_connect($host,$usuario,$senha,$bd)){
        echo "Falha na Conexão";
    }
?>