<?php 
require "../inc/logica-usuarios.php";
require "../inc/cabecalho-admin.php";


$usuarios = lerUsuarios($conexao);
?>

                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
            </ol>
        </nav> 

        <div class="row">
            <div class="col-sm">
                <h2>Usuários</h2>

                <p class="text-right">
                    <a class="btn btn-primary" href="usuario-insere.php" role="button">
                    Inserir novo usuário</a>
                </p>

                <table class="table table-hover data-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach( $usuarios as $usuario ){ ?>
                        <tr>
                            <td> <?=$usuario['nome']?> <br>
                <a href="usuario-atualiza.php?id=<?=$usuario['id']?>">
                                Atualizar</a> - 
                            
                                <a class="excluir" data-toggle="modal" data-target="#myModal" href="usuario-exclui.php?id=<?=$usuario['id']?>">
                                Excluir</a></td>
                            <td> <?=$usuario['email']?> </td>
                        </tr>
<?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>

<?php require "../inc/rodape-admin.php"; ?>



