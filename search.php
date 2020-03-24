<?php 
require "inc/logica-posts.php"; 
require "inc/cabecalho.php"; 

$termo = $_GET['q'];
$posts = busca($conexao, $termo);
?>

<main class="row my-3">
    <div class="list-group" style="width:100%">
        <p class="">Você procurou por: 
        <b> <?=$termo?> </b></p>
        <p class="">Resultados: 
        <b> <?=count($posts)?> </b> </p>
<?php foreach($posts as $post) { ?>
        <a href="post-detalhe.php?id=<?=$post['id']?>" class="list-group-item list-group-item-action">
            <article>
                <header class="d-flex w-100 justify-content-between">
                    <h2 class="mb-1">
                    <?=$post['titulo']?></h2>
                    <time datetime="" class="text-secondary">
                        <?=formataData($post['data'])?>
                    </time>
                </header>
                <p class="mb-1"><?=nl2br($post['resumo'])?></p>
            </article>
        </a>
<?php } ?>        
        
    </div>
</main>

<?php require "inc/rodape.php"; ?>



