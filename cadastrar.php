<?php
session_start();
include('conexao.php');


$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$nome_completo = mysqli_real_escape_string($conexao, $_POST['nome_completo']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);

$query = "SELECT * FROM login WHERE usuario = '{$usuario}'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);


if ($nome_completo == "") {
    $_SESSION['nome_completo_invalido'] = TRUE;
    header('Location: cadastro.php');
    exit();
}
if ($usuario == "") {
    $_SESSION['usuario_invalido'] = TRUE;
    header('Location: cadastro.php');
    exit();
}

if ($senha == "") {
    $_SESSION['senha_nao_digitada'] = TRUE;
    header('Location: cadastro.php');
    exit();
}
#se o usuario já existir vai retornar como 1, então não cadastra e retorna a tela cadastro

if ($row == 1) {
    $_SESSION['usuario_existe'] = TRUE;
    header('Location: cadastro.php');
    exit();
}


#se o usuario não existe cadastra o novo no banco dados
$sql = "INSERT INTO login (usuario_id, usuario, senha, nome_completo,email)
VALUES (NULL, '{$usuario}', md5 ('{$senha}'), '{$nome_completo}', '{$email}')";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['usuario_cadastrado'] = TRUE;
    
}
$conexao->close();
header('Location: cadastro.php');
exit();
