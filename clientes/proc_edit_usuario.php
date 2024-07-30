<?php
session_start();
include_once ('conexao.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);

$create_user = "UPDATE usuarios SET nome = '$nome', email='$email', cpf='$cpf', sexo='$sexo', modified = NOW() WHERE id='$id'";
$created_user = mysqli_query($conn, $create_user);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<p style='color: green'> Usuário editado com sucesso</p>";
    header("Location: listar.php");
} else {
    $_SESSION['msg'] = "<p style='color: red'> Usuário não foi editado com sucesso</p>";
    header("Location: edit_usuario.php?id=$id");
}