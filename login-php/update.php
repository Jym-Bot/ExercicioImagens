<?php
include('conexao.php');
include('verifica_login.php');

$nome =  $_SESSION['nome'];
$idusuario = $_SESSION['id_user'];

$name = $_FILES["img"]["name"];
$temp = $_FILES["img"]["tmp_name"];

$banco = new mysqli("localhost", "root", "", "login");

$sql = "INSERT INTO usuario(nome_imagem) VALUES ('{$name}') WHERE usuario_id = ('{$idusuario}')";
$banco->query($sql);
$banco->close();

move_uploaded_file($temp, "./imagems/".$name);

header("Location: painel.php");

echo $nome;
echo $idusuario;

?>