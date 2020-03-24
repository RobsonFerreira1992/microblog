<?php
require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $senha){
    $sql = "INSERT INTO usuarios (nome, email, senha) ";
    $sql.= " VALUES('$nome', '$email', '$senha')";
    return mysqli_query(
        $conexao, $sql) or die(mysqli_error($conexao));
}

function lerUsuarios($conexao){
    $sql = "SELECT * FROM usuarios ORDER BY nome";
    $resultado = mysqli_query($conexao, $sql) or die(
        mysqli_error($conexao)
    );
    
    
    $usuarios = [];
    
   
    while($usuario = mysqli_fetch_assoc($resultado)){
        
        
        array_push($usuarios, $usuario);
    }
    return $usuarios;  
}

function lerUmUsuario($conexao, $id){
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(
        mysqli_error($conexao)
    );
    return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($conexao, $id, $nome, $email, $senha){
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', ";
    $sql.= "senha = '$senha' WHERE id = $id";
    return mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirUsuario($conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    return mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


function buscaUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    
    $resultado = mysqli_query($conexao, $sql) 
        or die(mysqli_error($conexao));
    
    return mysqli_fetch_assoc($resultado);
}





function codificaSenha($senha){
    return password_hash($senha, PASSWORD_BCRYPT);
}

function verificaSenha($senhaFormulario, $senhaBanco){
    if( password_verify($senhaFormulario, $senhaBanco) ){
        return $senhaBanco;
    } else {
        return codificaSenha($senhaFormulario);
    }
}


