<?php
session_start();
include_once('conexao_login.php');

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($usuario) && isset($senha)) {
        $usuario = trim($usuario);
        $senha = trim($senha);

        if (empty($usuario) || empty($senha)) {
            $_SESSION['msg'] = 'Por favor, preencha todos os campos!';
            header('Location: login.php');
            exit();
        }

        $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($senha, $result['senha'])) {
            // Login bem-sucedido, redirecionar para a página principal
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Usuário ou senha inválidos!';
            header('Location: login.php');
            exit();
        }
    }
} catch (PDOException $e) {
    // Log the error message to a file for debugging
    file_put_contents('pdo_errors.log', $e->getMessage(), FILE_APPEND);
    // Display a generic error message to the user
    $_SESSION['msg'] = 'Erro ao conectar ao banco de dados!';
    header('Location: login.php');
    exit();
}
?>
