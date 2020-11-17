<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Podcast | Home </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet"/>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                include "inc/menu.inc";
            ?>
            <br/>
            
            <div class="form-generico col-sm-6">
                <h3> Bem vindo a Central do Podcast. </h3>
                <?php
                    include "inc/modal.inc";
                ?>
                <br/><br/>
                Desenvolvido: &copy João Pedro Catarina Conçolaro.
            </div>
        </div>       

        <?php
            include "inc/script.inc";
        ?>
    </body>
</html>