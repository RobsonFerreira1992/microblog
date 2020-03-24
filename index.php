<?php 
require "inc/logica-posts.php"; 
require "inc/cabecalho.php";
$posts = lerTodosOsPosts($conexao);
?>

<main class="row my-3">
<?php foreach($posts as $post){ ?>
        <article class="col-sm-6 my-1">
            <div class="card">
                <img src="img/<?=$post['imagem']?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="post-detalhe.php?id=<?=$post['id']?>">
                            <?=$post['titulo']?>
                        </a>
                    </h2>
                    <p class="card-text">
                        <?=$post['resumo']?> - 
                        <small><i>por <?=$post['autor']?></i></small>
                    </p>
                </div>
            </div>
        
        </article>
<?php } ?>
</main>

<?php require "inc/rodape.php"; ?>



