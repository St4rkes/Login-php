<?php
session_start();
include("conexao.php");
$usuario = $_SESSION['usuario'];

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
                <h1 class="title is-1 center" style="text-align: center;">Listar Usuários</h1>
                <div class="column">
                    <div class="box">
                        <!---->

                        <!--Aqui fica a grid de listagem de usuários-->
                        <?php
                        $consulta = "SELECT * FROM login";
                        $result = mysqli_query($conexao, $consulta);

                        ?>

                        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" style="text-align: left;" align="center">
                            <thead>
                                <tr>
                                    <th>Usuário_ID</th>
                                    <th>Usuário </th>
                                    <th>senha </th>
                                    <th>Nome Completo</th>
                                    <th>E-mail</th>
                                    <th colspan="2" align="center">Operações</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                while ($numero_linha = mysqli_fetch_assoc($result)) {
                                    $id =  $numero_linha['usuario_id'];
                                    $usuario = $numero_linha['usuario'];
                                    $senha = $numero_linha['senha'];
                                    $nome_completo = $numero_linha['nome_completo'];
                                    $email = $numero_linha['email'];



                                    echo '<tr>
                                    <td>' . $id . ' </td>
                                    <td>' . $usuario . ' </td>
                                    <td>' . $senha . ' </td>
                                    <td>' . $nome_completo . ' </td>
                                    <td>' . $email . ' </td>
                                    <td align="center">                                         
                                            <a class="button is-info" href="editar.php?id=' . $id . '">
                                            <span class="icon">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </span>
                                            <span>Editar</span>
                                            </a>
                                         </td>
                                         <td align="center">                                         
                                            <a class="button is-danger" href="excluir.php?id=' . $id . '">
                                            <span class="icon">
                                                <i class="fa-solid fa-trash"></i>
                                            </span>
                                            <span>Excluir</span>
                                            </a>
                                         </td> 
                                                                                 
                                        </tr>';
                                }

                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Usuário_ID</th>
                                    <th>Usuário </th>
                                    <th>senha </th>
                                    <th>Nome Completo</th>
                                    <th>E-mail</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>

    </section>


    <!--FIM - HTML Bulma -->

</body>

</html>