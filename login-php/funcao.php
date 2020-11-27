<?php
include('verifica_login.php');

$idusuario = $_SESSION['id_user'];
$banco = new mysqli("localhost", "root", "", "login");
$sql = "SELECT * FROM imagem WHERE usuario_imagem_id = ('{$idusuario}')";
$resultado = $banco->query($sql);
while ($linha = mysqli_fetch_array($resultado)) {
    $album[] = $linha;
}
?>