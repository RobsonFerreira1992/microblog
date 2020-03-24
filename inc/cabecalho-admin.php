<?php
require "logica-sessao.php";
verificaAcesso();
expirarSessao();

if(isset($_GET['logout'])){
    logout();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
<title>Admin | Microblog</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <h1><a class="navbar-brand" href="index.php">Admin | Microblog</a></h1>
        
        <ul class="nav justify-content-right">
            <li class="nav-item"><a class="nav-link active" href="?logout">Sair</a></li>
        </ul>
    </div>
</nav>

<div class="container">    
    <main class="my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">