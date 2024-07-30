<?php
session_start();
include_once ('conexao.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);

// echo "Nome: $nome <br>";
// echo "Email: $email <br>";

$criar_usuario = "INSERT INTO usuarios (nome, email, cpf, sexo, created) VALUES ('$nome', '$email', '$cpf', '$sexo', NOW())";
$usuario_criado = mysqli_query($conn, $criar_usuario);
if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("Location:cadastrar.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi encontrado com sucesso</p>";
    header("Location: cadastrar.php");
}