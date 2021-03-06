<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title> Podcast | Lista de Convidados </title>
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
                <h3> Filtrar. </h3>
                <form method = "POST" name="filtro">
                    <input type="text" class="form-control" name="nome_convidado" placeholder = "Nome gênero"/><br/>
                    <button type="submit" class="btn btn-dark">Pesquisar</button>
                </form>
    
                <br/> 
                <?php
                    include "conexao.php";
                    include "script_remover_convidado.php";

                    $select = "SELECT * FROM convidado ";
                    if(!empty($_POST)){
                        $select .= " WHERE (1=1) ";
                        if($_POST["nome_convidado"]!=""){
                            $nome = $_POST["nome_convidado"];
                            $select .= " AND nome like '%$nome%' OR nome like '%$nome%'";
                        }
                    }

                    $resultado = mysqli_query($conexao,$select);

                    echo '<table class="table table-striped table-dark" align="center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                    ';

                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo "<tr>
                                <td>".$linha["id_convidado"]."</td>
                                <td>".$linha["nome"]."</td>
                                <td>
                                    <button class='btn btn-danger remover' value='".$linha["id_convidado"]."'>Remover</button>                       
                                </td>
                              </tr>";
                    }

                    echo "</table>";

                    include "inc/script.inc";
                ?>
            </div>
        </div>
    </body>
</html>
        