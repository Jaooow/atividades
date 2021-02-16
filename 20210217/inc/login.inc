<body>
    <div class="container-fluid">
        <div class ="login">
            <div class="text-center" height="120px" width>
                <figure>
                    <img src="imagens/avatarH.png" alt="Logo" name = "logo" width="100px" height="100px">
                </figure>
            </div>
            <form method = "POST" action = "autentificacao.php">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp" placeholder="Seu email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name = "senha" id="senha" placeholder="Senha">
                    <a href="cadastrar_assinantes.php" class="text-dark stretched-link">Cadastre-se Aqui!</a>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
        </div>  
    </div>
</body>