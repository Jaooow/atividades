<?php
    include "conexao.php";
    $selectGenero = "SELECT nome, id_genero FROM genero";
    $resultadoGenero = mysqli_query($conexao,$selectGenero);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <title> Central da Música | Cadastro Banda Músical </title>
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
                <h3> Cadastrar Banda. </h3>
                <?php
                    if(empty($_POST)){
                        echo'
                            <form method = "POST" name="cadastro_banda">
                                <input type="text" class="form-control" required = "required" name="nome_banda" placeholder="Nome da Banda Músical"> </br>
                                <select class="form-control" required = "required" name = "genero">
                                    <option value ="">Selecione o Gênero da Banda</option>';
                                    while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                        echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome"].'</option>';
                            }
                        echo'
                                </select>
                                <br/>
                                <button type="submit" class="btn btn-dark">Enviar</button>
                            </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome_banda"];
                        $cod_genero = $_POST["genero"];
                        $query = "INSERT into banda(nome, cod_genero) values('$nome','$cod_genero')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<div class="alert alert-dark" role="alert">
                                Banda Cadastrada!
                            </div>';
                    }   
                    include "inc/script.inc";     
                ?>
            </div>
        </div>
    </body>
</html>