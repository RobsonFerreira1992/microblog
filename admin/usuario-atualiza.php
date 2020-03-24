<?php 
require "../inc/logica-usuarios.php"; 
require "../inc/cabecalho-admin.php"; 

$id = $_GET['id'];
$usuario = lerUmUsuario($conexao, $id);
?>

                <li class="breadcrumb-item">
                <a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="usuarios.php">Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Atualizar</li>
            </ol>
        </nav> 

        <div class="row">
            <div class="col-sm">
            <h2>Atualizar usuário</h2>

            <form class="form-geral" action="" method="post">
                    <input type="hidden" name="id" 
                    value="<?=$usuario['id']?>">
                    
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                        value="<?=$usuario['nome']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                        value="<?=$usuario['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="senha">
                        Senha (repita ou digite uma nova)</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary" name="atualizar">Atualizar usuário</button>
                </form>

            </div>
        </div>


<?php
if( isset($_POST['atualizar'])) {    
    if( empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) ){
        echo '<p class="my-2 alert alert-danger" role="alert">Você deve preencher todos os campos</p>';
    } else {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = verificaSenha( $_POST['senha'], $usuario['senha'] );
        
        atualizarUsuario($conexao, $id, $nome, $email, $senha);
        
        require "../inc/desconecta.php";
        header("location:usuarios.php");
    }
}            

require "../inc/rodape-admin.php"; 
?>



