<?php

    include "inc/cabecalho.inc";
    include "inc/script.inc";
    include "conexao.php";
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    $senha=md5($senha);

    $sql = "SELECT id, permissao FROM administradores WHERE email=? AND senha=?";
        
    if($stmt = mysqli_prepare($conexao, $sql)) { //retorna um statement ou false

        mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
        //retorna true ou false

        mysqli_stmt_execute($stmt);
        //retorna true ou false

        $resultado = mysqli_stmt_get_result($stmt);
        //retorna um resultset para comandos SELECT ou false
        
        if(mysqli_num_rows($resultado) == 1) {
            
            $linha = mysqli_fetch_assoc($resultado);
            
            $_SESSION["id"] = $linha["id"];
            $_SESSION["email"] = $email;
            $_SESSION["permissao"] = $linha["permissao"];

            //header("location: index.php");
            header("Location: index_assinante.php");
        }
        else {
            //header("location: erro.html");
            echo '{"codigo":2, "mensagem":"Credenciais inválidas"}';
        }
        mysqli_stmt_close($stmt);
        //fecha o statement
    }
    else {
        //echo "Houve um erro na preparação da consulta SQL:".mysqli_error($conexao);
        echo '{"codigo":3, "mensagem":"Falha ao se comunicar com o BD"}';
    }
    //fecha a conexão

    // login assinante
    $sqlA = "SELECT cpf FROM assinantes WHERE email=? AND senha=?";
    
    if($stmt = mysqli_prepare($conexao, $sqlA)) { //retorna um statement ou false

        mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
        //retorna true ou false

        mysqli_stmt_execute($stmt);
        //retorna true ou false

        $resultado = mysqli_stmt_get_result($stmt);
        //retorna um resultset para comandos SELECT ou false
        
        if(mysqli_num_rows($resultado) == 1) {
            
            $linha = mysqli_fetch_assoc($resultado);
            
            $_SESSION["cpf"] = $linha["cpf"];
            $_SESSION["email"] = $email;

            //header("location: index.php");
            header("Location: index_assinante.php");
        }
        else {
            //header("location: erro.html");
            echo '{"codigo":2, "mensagem":"Credenciais inválidas"}';
        }
        mysqli_stmt_close($stmt);
        //fecha o statement
    }
    else {
        //echo "Houve um erro na preparação da consulta SQL:".mysqli_error($conexao);
        echo '{"codigo":3, "mensagem":"Falha ao se comunicar com o BD"}';
    }
    mysqli_close($conexao);
    //fecha a conexão
?>