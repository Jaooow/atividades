<html lang='pt-BR'>
    <body>    
        <?php
            include "inc/cabecalho.inc";
            include "inc/script.inc";
            include "cabecalho.php";
            session_start();
            if(isset($_SESSION["cpf"])){
                include "inc/navbarA.inc";
                echo'<input type="text" id="sessao" value="'.$_SESSION["cpf"].'"  hidden>';
            }
            else{
                echo'<input type="text" id="sessao" value=" "  hidden>';
                include "inc/navbar.inc";
            }
        ?>
        <div class="container-fluid">
            <div class = "noticias">
                <h1>Mudança permite delivery para construção civil</h1>
                <p>
                Em reunião com empresários na tarde desta segunda-feira, dia 15, o prefeito Edinho Silva decidiu permitir algumas mudanças no Decreto Municipal nº 12.485 que endureceu medidas restritivas para o combate da Pandemia do coronavírus, inclusive, com controle na circulação de pessoas.<br/>

                Segundo informações apuradas pelo Portal Morada, a principal mudança ocorre no setor da construção civil. O acordo, firmado na reunião, garante o funcionamento de lojas de materiais de construção, mas com restrições, ou seja, com 30% da sua capacidade (funcionários) e somente no sistema delivery. Atendimento no balcão e drive-thru seguem proibidos. A mesma regra vale para loja de tintas.<br/>

                O novo Decreto, com mudanças na redação, deve ser publicado em breve no Diário Oficial do Município. O texto passa por avaliação do Departamento Jurídico da Prefeitura e pequenas mudanças podem ocorrer.<br/>

                <h3>Lockdown</h3> <br/>

                Nesta segunda-feira (15) Araraquara iniciou as medidas mais restritivas e colocou em prática regras do Decreto que permite o funcionamento apenas de atividades consideradas essenciais pelos próximos 15 dias.<br/>

                A principal alteração do novo documento é a restrição de circulação de veículos e de munícipes pelas ruas. Somente pode circular quem trabalha em serviço considerado essencial (como supermercados, farmácias, postos de combustíveis, entre outros) e quem for utilizar um desses serviços.<br/>

                Agentes de Trânsito realizaram bloqueios na Via Expressa e outros podem da cidade com abordagens de veículos. Motoristas foram questionados sobre o destino e orientados a evitar sair de casa. Ninguém foi multado nesse primeiro dia de “lockdown” em Araraquara.<br/>
                </p>
            </div>
        </div>

        <?php            
            include "modal_acesso.php";
        ?>
    </body>
</html>   