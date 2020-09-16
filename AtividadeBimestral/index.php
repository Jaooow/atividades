<!DOCTYPE html>
<html>
    <head>
		<title>Atividade Avaliativa 1ºBimestre</title>
		<style>
			table, th, td{
				border: 1px solid black;
				width:auto; 
				height:20px;
				text-align:center;
			}
			tr:nth-child(even) {background: white;}
			tr:nth-child(odd) {background: #FFFDD0;}
			
			copy{
				text-align:center;
				position: absolute;
				font-weight: bold;
			}
		</style>
		<script src = "jquery-3.3.1.min.js"></script>
		<script>
			// Utilização da Função AddTableRow com JavaScript e jQuery 
			$(document).ready(function(){
				
				var newLine = $("<tr>");	   
				var cols = "";
				
				cols += '<td colspan="3">Preencha o Nome e o Ano para verificar se este nome está entre os 20 mais frequentes da década</td>';   	
				newLine.append(cols);	
				
				$("#tabela").append(newLine);


				$("input[name='nome']").focus();
				$("iinput[name='nome']").blur(function(){
					if($("input[name='nome']").val() == ""){
						$("input[name='nome']").focus();
					}
					else{
						nameToUpper =$("input[name='nome']'").val().toUpperCase();
						decada = $("input[name='nome']").val();
						$.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada=" +decada+ "", function(dados){
							
							$("#tabela tr").remove();
							var newLine = $("<tr>");	   
							var cols = "";
							
							cols += '<th>Posição</td>';	 
							cols += '<th>Nome</td>';
							cols += '<th>Frenquência</td>';   	
							newLine.append(cols);	    
							$("#tabela").append(newLine);
							for(i=0;i<20;i++){
								AddTableRow(dados[0].res[i], nameToUpper, i);
							}
						});
					}
				});     

				$("input[name='decada']").change(function(){
					nameToUpper = $("input[name='nome']").val().toUpperCase();
					decada = $("input[name='decada']").val();
					$.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada=" +decada+ "", function(dados) {
						$("#tabela tr").remove();
						var newLine = $("<tr>");	   
						var cols = "";
						
						cols += '<th>Posição</td>';	 
						cols += '<th>Nome</td>';
						cols += '<th>Frenquência</td>';   	
						newLine.append(cols);	    
						$("#tabela").append(newLine);
						for(i=0;i<20;i++){
							AddTableRow(dados[0].res[i], nameToUpper, i);
						}
					});
				});   

				function AddTableRow(dados, nameToUpper,i){	
				
						var cols = "";	
						var newLine = $("<tr id=" +i+ ">");	   
						cols += '<td>'+(dados.ranking)+'</td>';
						
						if(dados.nome == nameToUpper){
							cols += '<td style="color:darkgreen;  font-weight: bold;">'+ (dados.nome) +'</td>';
						}
						else{
							cols += '<td>'+ (dados.nome) +'</td>';
						}    
						cols += '<td>'+ (dados.frequencia) +'</td>';
						
						newLine.append(cols);	    
						$("#tabela").append(newLine);	
							
						return false;	  
				 }
			});
		</script>
    </head>
    <body>
        <input type = "text" name = "nome" placeholder = "Digite Um Nome...">
        <input type = "number" name = "decada" step = "10" min = "1930" max = "2010" value = "1930">
		
        <hr />
		
        <table id="tabela">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Frequência</th>
                </tr>
            </thead>
            <tbody>
				
            </tbody>
			<tfoot>
			
			</tfoot>
        </table>
		
		</br>
		<div id = "copy">
			Atividade Avaliativa Referente ao 1º Bimestre de WEB. </br>
			&copy João Pedro C. Conçolaro e Murilo Crispim
		</div>
    </body>
</html>