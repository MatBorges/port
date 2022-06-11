<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icon/favicon-16x16.png">
    <link rel="manifest" href="/img/icon/site.webmanifest">
    <link rel="mask-icon" href="/img/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#000000">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Mateus Borges | Login</title>
</head>
<body class="body-login">
    <header class="header-container">
        <nav>
            <a href="index.html" class="logo"><img src="img/logotipoWhite.png" width="250px" alt="Mateus Borges Desenvolvedor"></a>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="index.html#objetivo">OBJETIVO</a></li>
                <li><a href="index.html#projetos">PROJETOS</a></li>
                <li><a href="index.html#contato">CONTATO</a></li>
                <li><a href="login.html">LOGIN</a></li>
            </ul>
        </nav>
    </header>    
    <section class="container">
        <form class="form-login" method="POST">
            <img src="img/logotipoWhite.png" width="300px" alt="">
            <div class="col-10 mt-3 form-floating mb-3">
                <input type="email" name="email-login" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="col-10 form-floating">
                <input type="password" name="senha-login" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button type="button" class="col-10 btn btn-primary mt-3">Entrar</button>

            <p class="mt-3">Cadastre-se <a href="cadastro.html"><strong>aqui</strong></a></p>
        </form>
    </section>    
    <footer class="rodape">
        <span>Desenvolvido por Mateus Borges &copy;</span>
    </footer>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
        if(isset($_POST['email']))
        {
            $emailLogin = addslashes($_POST['email-login']);
            $senhaLogin = addslashes($_POST['senha-login']);

            if(!empty($emailLogin) && !empty($senhaLogin))
            {
                $usuario->conectar("portifolio","root","");
                if($usuario->msgErro =="")
                {
                    if($usuario->logar($email, $senha))
                    {
                        header("location: area_privada.php");
                    }
                    else
                    {
                        ?>
                        <div id="msg-erro">
                            Email e/ou senha não confere.
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div id="msg-erro">
                        <?php echo "Erro: " .$usuario->msgErro; ?>
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div id="msg-erro">
                        Preencha todos os campos!
                    </div>
                <?php
            }
        }
    ?>
</body>
</html>