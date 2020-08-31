<?php
    session_start();
    $nome_fruta = $_GET["nomedafruta"];
    
    if(in_array("$nome_fruta", $_SESSION["frutas"])){
        echo "Fruta já existe"; 
    }else{
        array_push($_SESSION["frutas"], $nome_fruta);
        echo "Nova fruta cadastrada";
    }
?>