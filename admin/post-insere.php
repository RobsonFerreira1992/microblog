<?php 
require "../inc/logica-posts.php"; 
require "../inc/cabecalho-admin.php"; 
?>

                <li class="breadcrumb-item">
                <a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="posts.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inserir</li>
            </ol>
        </nav> 

        <div class="row">
            <div class="col-sm">
            <h2>Inserir post</h2>
                <form class="form-geral" action="" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="nome">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <textarea name="texto" id="texto" cols="50" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="resumo">Resumo</label>
                        <textarea name="resumo" id="resumo" cols="50" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Selecionar uma imagem para este post:</label>
                        <input type="file" id="imagem" name="imagem" class="form-control"
                        accept="image/png, image/jpeg, image/gif, image/svg+xml">
                    </div>
                    <button type="submit" class="btn btn-primary" name="inserir">Inserir post</button>
                </form>
            </div>
        </div>

<?php
if( isset($_POST['inserir'])) {
        
    if( empty($_POST["titulo"]) || 
        empty($_POST["texto"]) || 
        empty($_POST["resumo"]) || 
        empty($_FILES["imagem"]['name']) ){
        echo '<p class="my-2 alert alert-danger" role="alert">Você deve preencher todos os campos</p>';
    } else {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $resumo = $_POST['resumo']; 
        $imagem = $_FILES['imagem'];
        $usuarioId = $_SESSION['id'];
        
        upload($imagem);
        
        inserePost(
            $conexao, $titulo, $texto, $resumo, $imagem['name'], $usuarioId
        );
        
        header("location:posts.php");
        require "../inc/desconecta.php";        
    }
}            


require "../inc/rodape-admin.php"; 
?>



