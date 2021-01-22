<?php
	include "conteudo.php";
	
	if(isset($_COOKIE["cpf"])){
		if ($_COOKIE["permissao"] == 1 ){
			$nivelpermissao = "Aluno";
		}elseif($_COOKIE["permissao"] == 2){
			$nivelpermissao = "Professor";
		}else{
			$nivelpermissao = "Administrador";
		}

		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_COOKIE['email'].".</p>";
		$conteudos[1] = "<p>Seu tipo é ".$_COOKIE['permissao'].".</p>";
		$conteudos[2] = "<p>Nível de permissão identificado como de ".$nivelpermissao."</p>";
		$conteudos[3] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[4] = "<p><a href='logout.php'>Sair</a></p>";
		exibir($titulo, $conteudos);
	}
	else {
		setcookie('cpf');
		setcookie('permissao');
		setcookie('email');

		header("location: form_login.html");
	}
?>