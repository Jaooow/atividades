<!DOCTYPE  html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>ViaCEP - Atividade</title>
		<style>
			input{
				margin:5px;
				height: 20px;
				color: #008B8B;
			};
		</style>
        <script src="jquery-3.3.1.min.js"></script>
        <script>

        $(document).ready(function() {

            function RESET_CEP() {
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }
            
            $("#cep").blur(function() {

                var cep = $(this).val().replace(/\D/g, '');

                if (cep != "") {

                    var Valida_CEP = /^[0-9]{8}$/;

                    if(Valida_CEP.test(cep)) {

                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
								
								$("#numero").focus();
                            }
                            else {
                                RESET_CEP();
                                alert("CEP não encontrado.");
                            }
                        });
                    }
                    else {
                        RESET_CEP();
                        alert("Formato de CEP inválido.");
                    }
                }
                else {
                    RESET_CEP();
                }
            });
        });

    </script>
    </head>

    <body>
		<form method="get">
			<label>CEP</label>
			<input name="cep" type="text" id="cep" placeholder = "CEP"/> <br />
			<label>Endereço</label>
			<input name="endereco" type="text" id="endereco" placeholder = "Endereço" disabled=""/><br />
			<label>Número</label>
			<input name="numero" type="text" id="numero" placeholder = "Número" /> <br />
			<label>Bairro</label>
			<input name="bairro" type="text" id="bairro" placeholder = "Bairro" disabled=""/> <br />
			<label>Cidade</label>
			<input name="cidade" type="text" id="cidade" placeholder = "Cidade" disabled=""/> <br />
			<label>Estado</label>
			<input name="uf" type="text" id="uf" placeholder = "Estado" disabled=""/> <br/>
		</form>
    </body>

</html>
    
