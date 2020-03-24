<?php 
require "../inc/cabecalho-admin.php"; 

?>

                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav> 

        <div class="jumbotron">
            <h1 class="display-3">
            Bem-vindo <?=$_SESSION['nome']?>!</h1>
            <p class="lead">Você está no painel de controle e administração do Microblog.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="posts.php" role="button">Gerenciar Posts</a>
                <a class="btn btn-primary btn-lg" href="usuarios.php" role="button">Gerenciar Usuários</a>
            </p>
        </div>

<?php require "../inc/rodape-admin.php"; ?>



