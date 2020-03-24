<?php 
require "inc/logica-posts.php"; 
require "inc/cabecalho.php"; 

$id = $_GET['id'];
$post = lerDetalhes($conexao, $id);
?>

<main class="row my-3">
    <article class="col-12">
        <h2> <?=$post['titulo']?> </h2>
        <time datetime="" class="text-secondary">
            <?=formataData($post['data'])?>
        </time> - <span class="text-info">
            <?=$post['autor']?>
        </span>

        <img src="img/<?=$post['imagem']?>" alt="" class="img-fluid float-left mr-3">
        
        <p>
        <?=nl2br($post['texto'])?>
        </p>
    </article>
</main>

<?php require "inc/rodape.php"; ?>



