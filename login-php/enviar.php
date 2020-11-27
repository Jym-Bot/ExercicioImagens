<?php
include('verifica_login.php');

//Pegando info do Usuario
$nome =  $_SESSION['nome'];
$idusuario = $_SESSION['id_user'];

//Pegando info da imagem
$name = $_FILES["img"]["name"];
$temp = $_FILES["img"]["tmp_name"];

//Testando infos das imagens
//var_dump($temp);
//var_dump($name);

/*$idusuario = "SELECT usuario_id FROM usuario WHERE nome = '{$nome}'";
$resultado = $banco->query($idusuario);
$banco->close();
echo $resultado;

$sql = "UPDATE usuario SET nome_imagem = ('{$name}') WHERE nome = '{$nome}'";
$banco->query($sql);
$banco->close();
*/

$banco = new mysqli("localhost", "root", "", "login");

$sql = "INSERT INTO imagem (nome, usuario_imagem_id) VALUES ('{$name}', '{$idusuario}')";
$banco->query($sql);
$banco->close();

move_uploaded_file($temp, "./imagems/".$name);

header("Location: painel.php");
