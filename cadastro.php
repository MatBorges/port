<?php
    include('conexao.php');
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
    <title>Mateus Borges | Cadastro</title>
</head>
<body class="body-login">
    <header class="header-container">
        <nav>
            <a href="index.php" class="logo"><img src="img/logotipoWhite.png" width="250px" alt="Mateus Borges Desenvolvedor"></a>
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
        <form class="form-login" action="" method="POST">
            <h1>Cadastre-se</h1>

            <!-- PHP -->
            <?php
                if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])){

                    if(strlen($_POST['nome']) == 0){
                        echo "Preencha seu nome!!";
                    }
                    elseif(strlen($_POST['email']) == 0){
                        echo "Preencha sue email!!";
                    }
                    elseif(strlen($_POST['senha']) == 0){
                        echo "Preencha sua senha!!";
                    }
                    else{
                        $nome = $mysqli->real_escape_string($_POST['nome']);
                        $email = $mysqli->real_escape_string($_POST['email']);
                        $senha = $mysqli->real_escape_string($_POST['senha']);

                        $sql = "SELECT COUNT(*) AS TOTAL FROM usuarios WHERE email_usuario = '$email'";
                        $result = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
                        $row = mysqli_fetch_assoc($result);                       

                        if($row['total'] == 1){
                            $_SESSION['usuario_existe'] = true;
                            header('Location: cadastro.php');                    
                            exit;
                        }

                        $sql = "INSERT INTO usuarios VALUES (DEFAULT, '$nome', '$email', '$senha')";

                        if($mysqli->query($sql) === TRUE){
                            $_SESSION['cadastrado'] = true;

                        }

                        $mysqli->close();
                        header('Location: cadastro.php');
                    }
                }
            ?>

            <div class="col-10 mt-3 form-floating mb-3">
                <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Nome" required>
                <label for="floatingInput">Seu Nome</label>
            </div>
            <div class="col-10 form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Cadastre um email</label>
            </div>
            <div class="col-10 form-floating">
                <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Crie uma password</label>
            </div>
            <button type="submit" class="col-10 btn btn-primary mt-3">Entrar</button>
        </form>
    </section>    
    <footer class="rodape">
        <span>Desenvolvido por Mateus Borges &copy;</span>
    </footer>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>