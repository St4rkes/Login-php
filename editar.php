<?php
session_start();
include('conexao.php');
$usuario = $_SESSION['usuario'];

#Pega as informações do Banco de dados e grava em variáveis: Nome, Usuario, Senha
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM login WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_assoc($resultado);


    $usuario_edit = $linha['usuario'];
    $senha = $linha['senha'];
    $nome_completo = $linha['nome_completo'];
    $email = $linha['email'];
}

#Realiza o update no banco de dados
if (isset($_POST['salvar'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome_completo = $_POST['nome'];
    $email = $linha['email'];

    $sql = "UPDATE login SET usuario = '{$usuario}', senha = '{$senha}',
    nome = '{$nome_completo}', '{$email}' WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);

    header('Location: listar.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

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
    <!--Menu de navegação  -->
    <nav class="navbar is-spaced has-shadow is-info" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="painel.php">
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
    <!--Fim - Menu de  Navegação  -->

    <!--HTML Bulma -->

    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1 center" style="text-align: center;">Editar Usuário</h1>
                <div class="column">
                    <div class="box">
                        <h3 class="subtitle is-4" style="text-align: left;">Preencha os campos abaixo para editar os dados do usuario!</h3>
                        <form role="form" method="POST" action="">
                            <div class="field">
                                <div class="control">
                                    <label class="label">Nome Completo</label>
                                    <input value="<?php echo $nome_completo ?>" name="nome" type="text" class="input is-large" placeholder="Informe o nome completo" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="label">Novo usuário</label>
                                    <input value="<?php echo $usuario_edit ?>" name="usuario" name="text" class="input is-large" placeholder="Informe o usuário">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="label">Nova enha</label>
                                    <input value="<?php echo $senha ?>" name="senha" class="input is-large" type="password" placeholder="Informe a senha">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label">E-mail</label>
                                    <input value="<?php echo $email ?>" name="usuario" name="text" class="input is-large" placeholder="Informe seu novo email">
                                </div>
                                <button type="submit" name="salvar" class="button  is-info is-large is-fullwidth">Editar</button>
                        </form>
                    </div>

                </div>
            </div>

    </section>


    <!--FIM - HTML Bulma -->

</body>

</html>