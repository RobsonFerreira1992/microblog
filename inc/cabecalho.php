<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<title>PHP e MySQL Microblog</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <h1>
            <a class="navbar-brand" href="index.php">Microblog</a>
        </h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin">Painel de Controle</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquise aqui" aria-label="Search" name="q" id="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">OK</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">