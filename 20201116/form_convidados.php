<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <title> Podcast | Cadastro Convidados </title>
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
                <h3> Cadastrar Convidados. </h3>
                <?php
                    if(empty($_POST)){
                        echo'
                        <form method = "POST" name="cadastro_convidados">
                            <input type="text" class="form-control" required = "required" name="nome_convidado" placeholder="Nome do Convidado(a)"> </br>
                            <button type="submit" class="btn btn-dark">Enviar</button>
                        </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome_convidado"];
                        $query = "INSERT into convidado(nome) values('$nome')";
                        
                        mysqli_query($conexao, $query) or die($query);

                        echo'<div class="alert alert-dark" role="alert">
                                Convidado(a) Cadastrado
                            </div>';
                    }

                    include "inc/script.inc";
                ?>                         
            </div>
        </div>
    </body>
</html>