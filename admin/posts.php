<?php 
require "../inc/logica-posts.php"; 
require "../inc/cabecalho-admin.php"; 

$posts = listaPosts($conexao, $_SESSION['id']);
?>

                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </nav> 

        <div class="row">
            <div class="col-sm">
                <h2>Posts</h2>

                <p class="text-right">
                    <a class="btn btn-primary" href="post-insere.php" role="button">
                    Inserir novo post</a>
                </p>

                <table class="table table-hover data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($posts as $post) { ?>                    
                        <tr>
        <td><?=$post['id']?></td>
        <td><?=$post['titulo']?><br>
        <a href="post-atualiza.php?id=<?=$post['id']?>">
        Atualizar</a> -
        <a class="excluir" data-toggle="modal" data-target="#myModal"
    href="post-exclui.php?id=<?=$post['id']?>">Excluir</a></td>
                            <td>
                            <?=formataData($post['data'])?>
                            </td>
                        </tr>
<?php } ?>   
                    </tbody>
                </table>
            </div>
        </div>

<?php require "../inc/rodape-admin.php"; ?>



