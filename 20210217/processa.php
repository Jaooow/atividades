<?php 

    if(!empty($_POST)){
        date_default_timezone_set("America/Sao_Paulo");
        include "inc/cabecalho.inc";
        include "inc/script.inc";
        include "conexao.php";
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $data_assinatura = $_POST["data_assinatura"];
        $senha = $_POST["senha"];
        $senhaN = md5($senha);

        //echo "CPF: $cpf <br/> Nome: $nome <br/> E-mail: $email <br/> Data-Assinatura: $data_assinatura
        //<br/> Senha: $senha";

        $insert="INSERT INTO assinantes(
            CPF, 
            nome,
            email,
            data_assinatura,
            senha) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?
        )";

        if($stmt = mysqli_prepare($conexao, $insert)){
            $data_assinatura = date("Ymd");
            mysqli_stmt_bind_param($stmt, "sssss", $cpf, $nome, $email, $data_assinatura, $senhaN);
            mysqli_stmt_execute($stmt);
            
            echo'
            <div class="alert alert-secondary" role="alert">
                Cadastro Realizado com Sucesso! <br/><a href = "index.php"> Voltar para o Login</a>
            </div>';
            
        }else{
            alert("Falha ao se comunicar com o BD");
        }
        mysqli_close($conexao);
    }
    else{
        echo'
        <div class="alert alert-secondary" role="alert">
            Requisição sem POST <br/><a href = "index.php"> Voltar para o Login</a>
        </div>';
    }   
?>