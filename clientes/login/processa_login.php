<?php
session_start();

// Simule um banco de dados com usuários e senhas hash
$usuarios = [
    'usuario1' => password_hash('senha123', PASSWORD_DEFAULT),
    'usuario2' => password_hash('senha456', PASSWORD_DEFAULT),
    'gustavo' => password_hash('123456', PASSWORD_DEFAULT)
];

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    if (isset($usuarios[$usuario]) && password_verify($senha, $usuarios[$usuario])) {
        // Usuário e senha corretos
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php"); // Redireciona para a página principal
        exit();
    } else {
        // Usuário ou senha incorretos
        $_SESSION['msg'] = 'Usuário ou senha incorretos!';
        header("Location: login.php"); // Redireciona de volta para a página de login
        exit();
    }
} else {
    $_SESSION['msg'] = 'Por favor, preencha todos os campos!';
    header("Location: login.php");
    exit();
}
