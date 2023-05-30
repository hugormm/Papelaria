<!-- 
Hugo Moreira
Trabalho 18
Data inicio: 20/01/2023 
-->
<?php

require_once("php/funcoes/funcoes.php");

if(verificarLogado()){
    header("Location: php/paginas/home.php");
    exit();
}

$form = isset($_POST["login"]) && isset($_POST["senha"]);

if($form){
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if(fazerLogin($login, $senha)){
        header("Location: php/paginas/home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho 18 Entrada</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_geral.css">
</head>
<body class="container-fluid d-flex flex-column align-items-center gap-4">
    <div class="row box mt-3 w-75 p-4 text-center">
        <div class="col">
            <h3>SISTEMA DA PAPELARIA 2023</h3>
        </div>
    </div>
    <div class="row box w-75 p-5 text-center">
        <div class="col">
            <h5>LOGIN</h5>
            <br>
            <?php if($form): ?>
                <h5 style="color: red;">Login invalido, tente novamente.</h5>
            <?php endif; ?>
            <br>
            <form action="" method="POST">
                <input type="text" name="login" placeholder="Nome" required="required">
                <br><br>
                <input type="password" name="senha" placeholder="Senha" required="required">
                <br><br>
                <input type="submit" value="ENTRAR">
            </form>
            
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>