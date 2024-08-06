<?php
session_start();
include_once('conexao_login.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if (empty($usuario) || empty($senha)) {
        $_SESSION['msg'] = 'Por favor, preencha todos os campos!';
        header('Location: registrar.php');
        exit();
    }

    try {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['msg'] = 'Usuário já existe!';
            header('Location: registrar.php');
            exit();
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");
            $stmt->execute([$usuario, $senha_hash]);

            $_SESSION['msg'] = 'Cadastro realizado com sucesso!';
            header('Location: login.php');
            exit();
        }
    } catch (PDOException $e) {
        file_put_contents('pdo_errors.log', $e->getMessage(), FILE_APPEND);
        $_SESSION['msg'] = 'Erro ao conectar ao banco de dados!';
        header('Location: registrar.php');
        exit();
    }
}
?>
