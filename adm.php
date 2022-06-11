<?php
    // session_start();
    include('verifica.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Mateus Borges | Administrador</title>
</head>
<body class="body-login">
    <header class="header-container">
        <nav>
            <a href="index.html" class="logo"><img src="img/logotipoWhite.png" width="250px" alt="Mateus Borges Desenvolvedor"></a>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="index.php#objetivo">OBJETIVO</a></li>
                <li><a href="index.php#projetos">PROJETOS</a></li>
                <li><a href="index.php#contato">CONTATO</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
    </header>    
    <section class="container">
        <h1 id="bem-vindo">Bem-vindo <?php echo$_SESSION['usuario'] ?> !</h1>
        <a class="col-12" href="logout.php"><button type="submit" class="col-4 btn btn-danger">Logout</button></a>
    </section>    
    <footer class="rodape">
        <span>Desenvolvido por Mateus Borges &copy;</span>
    </footer>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>