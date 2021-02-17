<!DOCTYPE html>
<html lang="pt-BR">
  <?php
		include "inc/cabecalho.inc";
		include "inc/script.inc";

    $aux = 1;
    if($aux==1){?>
       <script>
         $(document).ready(function(){
           $('#modalExemplo').modal('show');
         });
       </script>
     <?php 
    }
	?>
  <div class ="noticias">
  </div>


  <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Limite de Acessos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
            Seu Limite de acessos as Noticias foi atingido,<br/> para continuar navegando:
            <b>Cadastre-se</b> <a href = "cadastrar_assinantes.php"><u>Aqui</u></a><br/>
            Já é Assinante? <b>Faça seu Login</b> <a href = "login.php"><u>Aqui</u></a><br/>
        </p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
  </div>
</html>