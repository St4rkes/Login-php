<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<section class="hero is-link is-small">
    <div class="hero-body">
        <nav class="navbar">
            <div class="container has-text-centered">

                <div class="column is-4 is-offset-4">
                    <div class="box">
                        <label class="label">Bem vindo ao sistema integrado SENAC</label>
                    </div>
                </div>
            </div>
    </div>
</section>

<section class="hero is-link is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <div class="box">


                    <h3 class="title has-text-grey"> Painel do sistema </h3>



                    <?php
                    session_start();
                    include('verifica_login.php');
                    $usuario = $_SESSION['usuario'];
                    ?>



                    <p>Olá, <?php echo $usuario ?></p><br>






                    <a href="cadastro.php"> <button class="button is-primary"> Cadastrar</button></a>
                    <br><br>
                    
                        <a href="logout.php"> <button class="button is-primary" > Sair</button ></a>
                    


                    </body>
                </div>
            </div>
        </div>
    </div>
</section>

</html>