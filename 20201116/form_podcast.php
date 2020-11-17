<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <title> Podcast | Cadastro de Podcast </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
	</head>
    <body>
        <div class="container-fluid">
            <?php
                include "inc/menu.inc";
            ?>
            <div class="form-generico col-sm-6">
                <br/>
                <h3> Cadastrar Podcast. </h3>
                <?php
                    include "conexao.php";
                    if(empty($_POST)){
                        echo'
                        <form method = "POST" name="cadastro_podcast">
                            <input type="text" class="form-control" required = "required" name="nome_podcast" placeholder="Nome do Podcast">
                        ';
                       
                        $selectApresentador = "SELECT * FROM apresentador ";
                        if(!empty($_POST)){
                            $selectApresentador .= " WHERE (1=1) ";
                            if($_POST["nome_apresentador"]!=""){
                                $nomeApresentador = $_POST["nome_apresentador"];
                                $selectApresentador .= " AND nome like '%$nomeApresentador%' OR nome like '%$nomeApresentador%'";
                            }
                        }

                        $resultadoApresentador = mysqli_query($conexao,$selectApresentador);
                        
                        $selectConvidado = "SELECT * FROM convidado ";
                        if(!empty($_POST)){
                            $selectConvidado .= " WHERE (1=1) ";
                            if($_POST["nome_convidado"]!=""){
                                $nomeConvidado = $_POST["nome_convidado"];
                                $selectConvidado .= " AND nome like '%$nomeConvidado%' OR nome like '%$nomeConvidado%'";
                            }
                        }

                        $resultadoConvidado = mysqli_query($conexao,$selectConvidado);

                        echo'<br/><h4> Selecionar Apresentador. </h4>';

                        while($linhaA = mysqli_fetch_assoc($resultadoApresentador)){
                            echo '
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="nome_apresentador" name="nome_apresentador">
                                    <label class="form-check-label" for="nome_apresentador">
                                        '.$linhaA["nome"].'
                                    </label>
                                </div>';
                        }

                        echo'<br/><h4> Selecionar Convidado. </h4>';

                        while($linhaC = mysqli_fetch_assoc($resultadoConvidado)){
                            echo '
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" value="" id="nome_convidado" name="nome_convidado">
                                    <label class="form-check-label" for="nome_convidado">
                                        '.$linhaC["nome"].'
                                    </label>
                                </div>';
                        }

                        echo'<br/><button type="submit" class="btn btn-dark">Enviar</button>
                             </form>';

                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome_podcast"];
                        $Apresentadores = $_POST["nome_apresentador"];
                        $convidado = $_POST["nome_convidado"];
                        $query = "INSERT into podcast(nome) values('$nome')";
                        
                        mysqli_query($conexao, $query) or die($query);

                        echo'<div class="alert alert-dark" role="alert">
                                Podcast Cadastrado
                            </div>';
                    }

                    include "inc/script.inc";
                ?>                         
            </div>
        </div>
    </body>
</html>