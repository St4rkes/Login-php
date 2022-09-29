<?php
session_start();
include('verifica_login.php');
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - Senac</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"><!-- Importa Bulma-->
    <script src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script><!-- Importa ícones-->
    <script src="https://kit.fontawesome.com/0fa5400974.js" crossorigin="anonymous"></script><!-- Importa ícones-->
    <link rel="stylesheet" href="css/painel.css">

</head>

<body>
    <nav class="navbar is-spaced has-shadow is-info" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            
            <a class="navbar-item">  
            <img src="img/senac-logo-sem-fundo.webp">              
            </a>
            

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>


        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">


                <a class="navbar-item" href="painel.php">
                    Painel
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="cadastro.php">
                        Cadastro
                    </a>

                    <div class="navbar-dropdown">

                        <a class="navbar-item" href="cadastro.php">
                            Cadastrar Usuário
                        </a>

                        <hr class="navbar-divider">
                        <a class="navbar-item" href="listar.php">
                            Listar Usuários
                        </a>
                    </div>
                </div>

            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <p> Seja bem vindo(a) <?php echo $usuario ?> &nbsp;&nbsp; </p>
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-primary" href="logout.php">
                                <span class="icon">
                                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                                </span>
                                <span>Sair</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </nav>


    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1 center" style="text-align: center;">Listar Usuários</h1>
                <div class="column">
                    <label class="label">Crie um usuário e senha</label>
                </div>
                <div class="box">
                    <?php if (isset($_SESSION['usuario_existe'])) {
                    ?>
                        <div class="notification is-danger">
                            <p>O usuário informado já existe, tente um novo!</p>
                        </div>

                    <?php
                        unset($_SESSION['usuario_existe']);
                    } else if (isset($_SESSION['usuario_cadastrado'])) {
                    ?>
                        <div class="notification is-success">
                            <p>O usuário foi cadastrado com sucesso!</p>
                        </div>
                        <?php

                        unset($_SESSION['usuario_cadastrado']);
                        ?>
                    <?php

                    } else if (isset($_SESSION['senha_nao_digitada'])) {
                    ?>
                        <div class="notification is-danger">
                            <p>Senha não informado, tente novamente!</p>
                        </div>
                        <?php

                        unset($_SESSION['senha_nao_digitada']);
                        ?>

                    <?php
                    } else if (isset($_SESSION['nome_completo_invalido'])) {
                    ?>
                        <div class="notification is-danger">
                            <p>Nome não informado, tente novamente!</p>
                        </div>
                        <?php

                        unset($_SESSION['nome_completo_invalido']);
                        ?>

                    <?php
                    } else if (isset($_SESSION['usuario_invalido'])) {
                    ?>
                        <div class="notification is-danger">
                            <p>Usuário não informado, tente novamente!</p>
                        </div>
                    <?php
                    }
                    unset($_SESSION['usuario_invalido']);
                    ?>


                    <br>
                    <form action="cadastrar.php" method="POST">

                        <div class="field">
                            <div class="control">
                                <label class="label">Nome Completo*</label>
                                <input name="nome_completo" name="text" class="input is-large" placeholder="Informe Nome Completo" autofocus="">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label">Usuario*</label>
                                <input name="usuario" name="text" class="input is-large" placeholder="Informe usuário" autofocus="">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label class="label">Senha*</label>
                                <input name="senha" class="input is-large" type="password" placeholder="cria uma Senha">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="label">E-mail</label>
                                <input name="email" name="text" class="input is-large" placeholder="Informe seu email" autofocus="">
                            </div>
                        </div>
                        <h1>Obrigatório o preenchimento de dados onde: *.</h1>
                        <button type="submit" class="button  is-link is-large is-fullwidth">Cadastrar</button>
                    </form>
                </div>


            </div>
        </div>

    </section>
</body>

</html>