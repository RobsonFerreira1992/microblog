<?php
require "../inc/logica-posts.php";    
require "../inc/logica-sessao.php";    
verificaAcesso();
$id = $_GET['id'];            
excluiPost($conexao, $id);
require "../inc/desconecta.php";
header("location:posts.php");

