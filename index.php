<?php
    include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icon/favicon.ico">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Mateus Borges | Home</title>
</head>
<body>
    <header class="header-container">
        <nav>
            <a href="index.php" class="logo"><img src="img/logotipoWhite.png" width="250px" alt="Mateus Borges Desenvolvedor"></a>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#objetivo">OBJETIVO</a></li>
                <li><a href="#projetos">PROJETOS</a></li>
                <li><a href="#contato">CONTATO</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="bg">
            <img class="logo-bg" src="img/logotipoWhite.png" alt="Logo">
        </section>
        <section id="objetivo" class="objetivo">
            <div class="eu">
                <h2>Sobre mim..</h2>
                <img src="img/eu.jpg" alt="Eu" width="40%">
                <p>Sou o Mateus, gosto de tecnologia, cultura pop, música e carros</p>
            </div>
            <div class="objetivo-texto">
                <h2>Objetivo</h2>
                <div class="textos">
                    <p>Quo neque error repudiandae fuga? Ipsa laudantium molestias eos 
                        sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam
                        recusandae alias error harum maxime adipisci amet laborum. Perspiciatis 
                        minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit 
                        quibusdam sed amet tempora.</p>
                </div>
            </div>
        </section>
        <section id="projetos" class="projetos">
            <div class="projetos-texto">
                <h2>Projetos</h2>
                <div class="textos">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum!</p>
                    <p>
                        Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                        tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
                        quia.
                    </p>
                </div>
            </div>
            <div class="projetos-carousel">
                <div id="carouselExampleInterval" class="carousel slide d-flex justify-content-center" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="4000">
                            <img src="img/carousel/Python3.png" class="d-block w-100" alt="Python 3">
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="img/carousel/MySQL.png" class="d-block w-100" alt="MySQL">
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="img/carousel/Node_React.png" class="d-block w-100" alt="NodeJS e React JS">
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="img/carousel/SQL_Server.png" class="d-block w-100" alt="SQL Server">
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="img/carousel/HTML_CSS_JS.png" class="d-block w-100" alt="HTML CSS JavaScript">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> 
            </div>   
        </section>
        <section id="contato" class="contato">      
            <form class="form-contato rounded" action="" method="POST">
                <h2>Contato</h2>

                <!-- PHP -->
                <?php
                    if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['motivo'])){

                        if(strlen($_POST['nome']) == 0){
                            echo "Preencha seu nome!!";
                        }
                        elseif(strlen($_POST['email']) == 0){
                            echo "Preencha sua email!!";
                        }
                        elseif(strlen($_POST['motivo']) == 0){
                            echo "Informe o motivo do contato!!";
                        }
                        else{
                            $nome = $mysqli->real_escape_string($_POST['nome']);
                            $email = $mysqli->real_escape_string($_POST['email']);
                            $motivo = $mysqli->real_escape_string($_POST['motivo']);

                            $sql = "INSERT INTO contatos VALUES (DEFAULT, '$nome', '$email', '$motivo')";

                            if($mysqli->query($sql) === TRUE){
                                $_SESSION['enviado'] = true;
                            }
                            $mysqli->close();
                            // header('Location: index.php#contato');
                        }
                    }
                ?>

                <div class="col-10 mt-3 form-floating mb-3">
                    <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Nome</label>
                </div>
                <div class="col-10 mt-3 form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="col-10 mt-3 form-floating">
                    <textarea name="motivo" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Me informe o motivo do contato..</label>
                </div>
                <button type="submit" class="col-10 btn btn-success mt-3">Enviar</button>
            </form>
        </section>
    </main>
    <footer class="rodape">
        <span>Desenvolvido por Mateus Borges &copy;</span>
    </footer>
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>