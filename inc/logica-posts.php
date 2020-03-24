<?php
require "conecta.php";

function inserePost($conexao, $titulo, $texto, $resumo, $imagem, $usuarioId){
    $sql = "INSERT INTO posts (titulo, texto, resumo, imagem, usuario_id) ";
    $sql.= " VALUES( '$titulo', '$texto', '$resumo', '$imagem', '$usuarioId' )";
    return mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} 



function listaPosts($conexao, $usuarioId){
	$posts = [];
	$sql = "SELECT * FROM posts WHERE usuario_id = $usuarioId ORDER BY data DESC";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
	while( $post = mysqli_fetch_assoc($resultado) ){
		array_push($posts, $post);
	}
	return $posts; 
} 


function listaUmPost($conexao, $id){    
    $sql = "SELECT * FROM posts WHERE id = $id";    
	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
}


function atualizaPost($conexao, $id, $titulo, $texto, $resumo, $imagem){
    $sql = "UPDATE posts SET titulo = '$titulo', texto = '$texto', ";
    $sql.= " resumo = '$resumo', imagem = '$imagem' ";
    $sql.= " WHERE id = $id";
    return mysqli_query($conexao, $sql) or die(mysqli_error($conexao));    
}


function excluiPost($conexao, $id){
	$sql = "DELETE FROM posts WHERE id=$id";
	return mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}



function lerTodosOsPosts($conexao){
    $posts = [];
    
    $sql = "SELECT posts.id, posts.titulo, posts.data, posts.imagem, posts.resumo, usuarios.nome AS autor FROM posts ";
    $sql.= " INNER JOIN usuarios ON posts.usuario_id = usuarios.id ";
    $sql.= " ORDER BY data DESC";
    
    $resultado = mysqli_query($conexao, $sql) 
        or die(mysqli_error($conexao));
    
    while( $post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }
    
    return $posts;
}


function lerDetalhes($conexao, $id){
    $sql = "SELECT posts.id, posts.titulo, posts.data, posts.imagem, posts.texto, ";
    $sql.= " usuarios.nome AS autor FROM posts ";
    $sql.= " INNER JOIN usuarios ON posts.usuario_id = usuarios.id";
    $sql.= " WHERE posts.id = $id";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
}

function busca($conexao, $termo){
    $posts = [];
    
    $sql = "SELECT * FROM posts WHERE ";
    $sql.= " titulo LIKE '%$termo%' OR ";
    $sql.= " texto LIKE '%$termo%' OR ";
    $sql.= " resumo LIKE '%$termo%' ";
    $sql.= " ORDER BY data";
    
    $resultado = mysqli_query($conexao, $sql) 
        or die(mysqli_error($conexao));
    
    while( $post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }    
    return $posts;
}



function formataData( $data ){
    return date("d/m/Y H:i", strtotime($data));    
} 

function upload($imagem){
    $tiposValidos = [
        'image/png',
        'image/jpeg',
        'image/gif',
        'image/svg+xml'
    ];
    
    /* Se o type do arquivo não é um dos válidos */
    if( !in_array($imagem['type'], $tiposValidos) ){
        die('<p class="my-2 alert alert-danger" role="alert">Formato não permitido</p>');
        return false;
    }
    
    $nome = $imagem['name'];
    $temp = $imagem['tmp_name'];
    
    $destino = '../img/'.$nome;
    
    if(move_uploaded_file($temp, $destino)){
        return true;
    }    
}
