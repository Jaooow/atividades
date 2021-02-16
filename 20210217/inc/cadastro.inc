<body>
    <div class="container-fluid">
        <div class ="login">
            <div class="text-center" height="120px" width>
                <figure>
                    <img src="imagens/avatarH.png" alt="Logo" name = "logo" width="100px" height="100px">
                </figure>
                <h3>Cadastrar Assinante</h3>
            </div>
            
            <form id="cadastro" class="modal-content animate" name = "cadastro" action="processa.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="cpf"  name="cpf" aria-describedby="emailHelp" required="required" placeholder="CPF">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" required="required" placeholder="Nome">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required="required" placeholder="Seu email">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="data_assinatura" name="data_assinatura"aria-describedby="emailHelp" required="required" placeholder="Data Assinatura">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="senha" name="senha" required = "required" placeholder="Senha">
                </div>
                
                <button type="submit" class="btn btn-dark">Cadastrar</button>
            </form>
        </div>  
    </div>
</body>