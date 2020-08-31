<!DOCTYPE  html>
<?php session_start(); $_SESSION["frutas"]=array();?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Frutas - Engenharia Reversa 2 </title>
        <script src="jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#btn").click(function(){
                   var fruta = $("input[name='fruta']").val();
                    $.get("cadastro.php",{"nomedafruta":fruta}, function(msg){
                        if(msg == "Nova fruta cadastrada"){
                            $("#divreceptora").html($("#divreceptora").html()+"<li>"+fruta+"</li>");
                            $("#registrou").css("color", "green");
                        }else{
                            $('#registrou').css("color", "red");
                        }
                        $("#registrou").html(msg);
                    });
                });
            });
        </script>
    </head>
    <body>
            <input type = "text" id = "fruit_camp" name="fruta" placeholder = "Cadastre uma fruta..."></input>
            <button id="btn">Cadastro Assíncrono</button>
            <hr />
            <span id="registrou"></span>
			<hr />
            <div id="divreceptora"></div>
    </body>
</html>