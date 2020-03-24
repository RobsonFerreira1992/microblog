<?php 
ob_start(); /* Output Buffer */
require "../inc/logica-posts.php";
require "../inc/cabecalho-admin.php";

$id = $_GET['id'];
$post = listaUmPost($conexao, $id);
?>

                <li class="breadcrumb-item">
                <a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="posts.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Atualizar</li>
            </ol>
        </nav> 

        <div class="row">
            <div class="col-sm">
            <h2>Atualizar post</h2>

                <form class="form-geral" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" 
                    value="<?=$post['id']?>">
                    <div class="form-group">
                        <label for="nome">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                        value="<?=$post['titulo']?>">
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <textarea name="texto" id="texto" cols="50" rows="10" class="form-control"><?=$post['texto']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="resumo">Resumo</label>
                        <textarea name="resumo" id="resumo" cols="50" rows="3" class="form-control"><?=$post['resumo']?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="imagem-existente">Imagem do post:</label>
                        <input type="text" id="imagem-existente" name="imagem-existente" class="form-control" readonly value="<?=$post['imagem']?>">
                    </div>            
                    
                    <div class="form-group">
                        <label for="imagem">Selecionar uma imagem para este post:</label>
                        <input type="file" id="imagem" name="imagem" class="form-control"
                        accept="image/png, image/jpeg, image/gif, image/svg+xml">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="atualizar">Atualizar post</button>
                </form>

            </div>
        </div>

<?php
if( isset($_POST['atualizar'])) {
        
    if( empty($_POST["titulo"]) || 
        empty($_POST["texto"]) || 
        empty($_POST["resumo"]) ){
        echo '<p class="my-2 alert alert-danger" role="alert">Você deve preencher todos os campos</p>';
    } else {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $resumo = $_POST['resumo'];
        
        /* Se não for escolhida uma nova imagem... */
        if( empty($_FILES['imagem']['name']) ){
            /* então pegue a referência da imagem já existente */
            $imagem = $_POST['imagem-existente'];
        } else {
            /* senão, pegue a nova imagem */
            $imagem = $_FILES['imagem']['name'];
            
            /* e faça o upload para o servidor */
            upload($_FILES['imagem']);
        }
        
        atualizaPost(
            $conexao, $id, $titulo, $texto, $resumo, $imagem);
        
        header("location:posts.php");
        require "../inc/desconecta.php";
    }
}            

require "../inc/rodape-admin.php"; 
ob_end_flush();
?>



