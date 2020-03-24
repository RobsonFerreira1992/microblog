<?php 
require "inc/logica-usuarios.php";
require "inc/logica-sessao.php";
require "inc/cabecalho.php"; 

/* Mensagens de feedback */
if( isset($_GET['acesso_proibido']) ){
    $feedback = "Você deve logar primeiro!";
    
} elseif( isset($_GET['logout']) ) {
    $feedback = "Você saiu do sistema!";
    
} elseif( isset($_GET['nao_encontrado']) ) {
    $feedback = "Usuário/Senha não encontrado!";
    
} elseif( isset($_GET['campos_obrigatorios']) ) {
    $feedback = "Você deve preencher todos os campos!";
    
} elseif( isset($_GET['expirado']) ) { // se der tempo
    $feedback = "A sessão expirou! <br>Logue novamente para acessar a área administrativa.";    
} else {
    $feedback = "";
}

?>

<main class="row my-3">
    <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Acesso ao painel de controle</h2>
        
        <?php if( !empty($feedback) ){?>
        <p class="my-2 alert alert-warning text-center">
        <?=$feedback?>
        </p>                 
        <?php } ?>
       
        <div class="form-group">
            <label for="email" class="sr-only">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de e-mail" autofocus>
        </div>

        <div class="form-group">
            <label for="senha" class="sr-only">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
        </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar">Entrar</button> 
    </form>
</main>

<?php
if( isset($_POST["entrar"]) ){
    
    if( empty($_POST["email"]) && empty($_POST["senha"]) ){
        header("location:login.php?campos_obrigatorios");
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $usuario = buscaUsuario($conexao, $email);
        
        //var_dump($usuario);
        
        if( password_verify($senha, $usuario['senha']) ){
            login(
                $usuario['id'], 
                $usuario['nome'], 
                $usuario['email'] 
            ); 
            header("location:admin/index.php");
        } else {
            header("location:login.php?nao_encontrado");
        }
        
    }
}

require "inc/rodape.php"; 
?>



