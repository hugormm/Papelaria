<?php

require_once("../funcoes/database.php");

$produtos = selectSQL("SELECT * FROM produtos");

$form = isset($_GET["id"]);

if($form){
    $id = $_GET["id"];
    $produto = selectSQLunico("SELECT * FROM produtos WHERE id=$id");
}

$form_2 = isset($_GET["id"]) && isset($_GET["total"]);

if($form_2){
    $id = intval($_GET["id"]);
    $total = intval($_GET["total"]);
    $limite = false;
    if($total <= $produto["quantidade"]){
        iduSQL("UPDATE produtos SET quantidade = quantidade-$total WHERE id=$id");
        $produto = selectSQLunico("SELECT * FROM produtos WHERE id=$id");
        if($produto["quantidade"] == 0){
            iduSQL("DELETE FROM produtos WHERE id=$id");
        }
    }
    else{
        $limite = true;
    }
    
}


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho 18 saida</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style_geral.css">
    
</head>
<body class="container-fluid d-flex flex-column align-items-center gap-4">
    <div class="row box mt-3 w-75 p-4 text-center">
        <div class="col">
            <h3>SISTEMA DA PAPELARIA 2023</h3>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link" href="registar.php">REGISTAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="editar.php">EDITAR PRODUTO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="vendas.php">REGISTAR VENDAS</a>
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
    <?php if(!$form): ?>
        <h5>REGISTO DE SAIDAS</h5>
        <br>
        <table class="w-100">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>PREÇO</th>
                <th>QUANTIDADE</th>
                <th>ACÇÃO</th>
            </tr>
            <?php foreach($produtos as $produto): ?>
                <tr>
                    <td><?= $produto["id"]; ?></td>
                    <td><?= $produto["nome"]; ?></td>
                    <td><?= number_format($produto["preco"], 2); ?> €</td>
                    <td><?= $produto["quantidade"]; ?></td>
                    <td>
                        <form action="">
                            <button name="id" value="<?= $produto["id"]; ?>">VENDER</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>  

        <?php if($form && !$form_2): ?>
            <h3>VENDER</h3>
            <form action="">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                    <th>ACÇÃO</th>
                </tr>
                <tr>
                    <td><?= $produto["id"]; ?></td>
                    <td><?= $produto["nome"]; ?></td>
                    <td><?= number_format($produto["preco"], 2); ?> €</td>
                    <td><?= $produto["quantidade"]; ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="number" name="total" min="1" placeholder="Total" required="required">
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="VENDER">
        </form>
        <?php endif; ?>   
        <?php if($form_2 && $limite): ?>
            <h5 style="color: red;">O total é maior que a quantidade que dispõe para venda.</h5>
            <a href="vendas.php">
                <button>VOLTAR</button>
            </a>
        <?php endif; ?>
        <?php if($form_2 && !$limite): ?>
            <h3>Produto vendido com sucesso!</h3>
            <a href="vendas.php">
                <button>VOLTAR</button>
            </a>
        <?php endif; ?> 
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

