<?php
session_start();
include('conexao.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM login WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        
        header('Location: listar.php');
    }

}
