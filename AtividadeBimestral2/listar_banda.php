<?php
    include "conexao.php";
    $selectBanda = "SELECT nome, id_genero FROM genero";
    $resultadoBanda = mysqli_query($conexao,$selectBanda);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
        <title> Central da Música | Banda </title>
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
                <h3> Filtrar: </h3>
        
                <form method = "POST" name="filtro">
                    <input type="text" class="form-control" name="nome_banda" placeholder = "Nome Banda"/><br/>
                    <select name = "genero"  class="form-control">
                        <option value ="">Seleciona uma Banda</option>
                        <?php
                            while($linhaBanda = mysqli_fetch_assoc($resultadoBanda)){
                                echo '<option value='.$linhaBanda["nome"].'> '.$linhaBanda["nome"].'</option>';
                            }
                        ?>
                    </select>
                    <br/>
                    <button type="submit" class="btn btn-dark">Pesquisar</button>
                </form>
                <br/> </hr>
                <?php
                    $select = "SELECT banda.nome as nome_banda, genero.nome as nome_genero FROM banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";
                    
                    if(!empty($_POST)){
                        $select .= " WHERE (1=1) ";
                    
                        if($_POST["nome_banda"]!=""){
                            $nome = $_POST["nome_banda"];

                            $select .= " AND banda.nome like '%$nome%'";
                        }

                        if($_POST["genero"]!=""){
                            $genero = $_POST["genero"];

                            $select .= " AND genero.nome like '%$genero%'";
                        }
                    }

                    $resultado = mysqli_query($conexao,$select);

                    echo '<table class="table table-striped table-dark" align="center">
                            <thead>
                                <tr>
                                    <th>Banda</th>
                                    <th>Gênero</th>
                                </tr>
                            </thead>
                    ';

                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo '<tr>
                                <td>'.$linha["nome_banda"].'</td>
                                <td>'.$linha["nome_genero"].'</td>
                            </tr>';
                    }

                    echo "</table>";
                    include "inc/script.inc";
                ?>
            </div>
        </div>
    </body>
</html>

