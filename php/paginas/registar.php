<?php

require_once("../funcoes/database.php");

$form = isset($_GET["nome"]) && isset($_GET["preco"]) && isset($_GET["quantidade"]);

if ($form) {
    $nome = $_GET["nome"];
    $preco = $_GET["preco"];
    $quantidade = $_GET["quantidade"];

    iduSQL("INSERT INTO produtos (nome, preco, quantidade) VALUES ('$nome', $preco, $quantidade)");
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho 18 registar</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style_geral.css">
</head>

<body class="container-fluid d-flex flex-column align-items-center gap-4">
    <div class="row box mt-3 w-75 p-4 text-center">
        <div class="col">
            <h3>SISTEMA DA PAPELARIA 2023</h3>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listar.php">LISTAR PRODUTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pesquisar.php">PESQUISAR CODIGO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="registar.php">REGISTAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="editar.php">EDITAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="vendas.php">REGISTAR VENDAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete.php">APAGAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logoff.php">SAIR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="col box mt-3 w-75 p-4 text-center">
        <h5>REGISTAR</h5>
        <br>
        <form action="">
            <input type="text" name="nome" placeholder="Nome" required="required">
            <br><br>
            <input type="number" name="preco" min="0.01" step="0.01" placeholder="Preço" required="required">
            <br><br>
            <input type="number" name="quantidade" min="1" placeholder="Quantidade" required="required">
            <br><br>
            <input type="submit" value="Registar">
        </form>
        <?php if ($form): ?>
            <br>
            <h3>Produto registado com sucesso!</h3>
        <?php endif; ?>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>