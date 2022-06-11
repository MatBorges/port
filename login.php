<?php
    include('conexao.php');
    session_start();
    // REDIRECIONA PARA ADM CASO A SESSAO ESTEJA ATIVA
    if($_SESSION != null){
        header('Location: adm.php');
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Mateus Borges | Login</title>
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
        <form class="form-login" method="POST">
            <img src="img/logotipoWhite.png" width="300px" alt="">

            <!-- PHP -->
            <?php
                if(isset($_POST['email']) || isset($_POST['senha'])){

                    if(strlen($_POST['email']) == 0){
                        echo "Preencha seu email!!";
                    }
                    elseif(strlen($_POST['senha']) == 0){
                        echo "Preencha sua senha!!";
                    }
                    else{
                        $email = $mysqli->real_escape_string($_POST['email']);
                        $senha = $mysqli->real_escape_string($_POST['senha']);
            
                        $sql = "SELECT nome_usuario FROM usuarios WHERE email_usuario = '$email' AND senha_usuario = '$senha'";
                        $query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
            
                        $qtd = $query->num_rows;
            
                        if($qtd == 1){
                            $usuario = $query->fetch_assoc();
                            if(!isset($_SESSION)){
                                session_start();
                            }            
                            $_SESSION['usuario'] = $usuario['nome_usuario'];            
                            header("Location: adm.php");
                            exit();
                        }
                        else{
                            $_SESSION['nao_aut'] = true;
                            header("Location: login.php");
                        }
                    }
                }
            ?>

            <!-- ALERT DE SENHA INVÁLIDA -->
            <?php
                if(isset($_SESSION['nao_aut'])):
            ?>
            <div class="col-10 alert alert-danger" role="alert">
                Usuario ou senha inválidos!!
            </div>
            <?php
                endif;
                unset($_SESSION['nao_aut']);
            ?>
            <!-- ALERT DE SENHA INVÁLIDA -->

            <div class="col-10 mt-3 form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="col-10 form-floating">
                <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button type="submit" class="col-10 btn btn-primary mt-3">Entrar</button>

            <p class="mt-3">Cadastre-se <a href="cadastro.php"><strong>aqui</strong></a></p>
        </form>
    </section>    
    <footer class="rodape">
        <span>Desenvolvido por Mateus Borges &copy;</span>
    </footer>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>