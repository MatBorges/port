<?php
    class Usuario{
        private $pdo;
        public $msgErro = "";

        public function conectar($nomeBD, $usuarioBD, $senhaBD){
            global $pdo;
            try{
                $pdo = new PDO('mysql.dbname='.$nomeBD, $usuarioBD, $senhaBD);
            }
            catch(PDOException $e){
                $msgErro = $e->getMessage();
            }
        }

        public function cadastrar($nome, $email, $senha)
        {
            global $pdo;

            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();
            if($sql->rowCount()>0){
                return false; //email já cadastrado
            }
            else{
                $sql = $pdo->prepare("INSERT INTO usuarios VALUES (:n, :e, :s)");
                $sql->bindValue(":n",$nome);                
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->execute();
                return true; //tudo ok
            }
        }

        public function logar($email, $senha)
        {
            global $pdo;

            //verificar se o email e a senha estão cadastrados, se sim
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            if($sql->rowCount()>0){
                //entrar no sistema
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dado['id_usuario'];
                return true;//usuário cadastrado
            }
            else{
                return false; //não foi possível logar
            }
        }
    }
?>