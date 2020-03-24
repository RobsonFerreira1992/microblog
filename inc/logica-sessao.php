<?php
if( !isset($_SESSION) ){
    session_start();
}

function login($id, $nome, $email){
   
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
}

function verificaAcesso(){
    if( !isset($_SESSION['id']) ){
        session_destroy();
        header("location:../login.php?acesso_proibido");
        exit;
    }
}

function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    exit;
}


function expirarSessao(){    
    if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > 600)) {
        // última atividade foi mais de 30 segundos atrás
        session_unset();     // unset $_SESSION  
        session_destroy();   // destruindo session data 
        header("location:../login.php?expirado");
     
    }    
    // update da ultima atividade (ultimo clique, ação etc) 
    $_SESSION['ultima_atividade'] = time(); 
}




