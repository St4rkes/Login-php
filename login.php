<?php

session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


 if(empty($_POST['usuario']) || empty ($_POST['senha'])){
      $_SESSION['nao_autenticado'] = $usuario;
       header('Location: index.php');
       exit(); 
 }
 

$query = "SELECT usuario FROM login WHERE usuario = '{$usuario}' 
and senha = md5 ('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1){
   #está logado
   $_SESSION['usuario'] = $usuario;
   header('Location: painel.php');
   exit();
   
}else {
   $_SESSION['nao_autenticado'] = $usuario;
   header('Location: index.php');
   exit();
   
   
}   #não será logado


/*print_r($result);*/
/*print_r($query);*/







