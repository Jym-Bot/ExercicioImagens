<?php
include('conexao.php');
include('funcao.php');

$idimg = $_POST['idimg'];

$banco = new mysqli("localhost", "root", "", "login");

$sqldelete = "DELETE FROM imagem WHERE id_imagem = ('{$idimg}')";
$banco->query($sqldelete);
$banco->close(); 

header("Location: painel.php");
?>