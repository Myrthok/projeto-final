<?php
session_start();

// Configurações do banco de dados
$host = 'localhost';
$db = 'seu_banco_de_dados';
$user = 'seu_usuario';
$pass = 'sua_senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST['usuario']) && isset($_POST['senha'])) {
        $usuario = trim($_POST['usuario']);
        $senha = trim($_POST['senha']);
        
        // Validação básica
        if (empty($usuario) || empty($senha)) {
            $_SESSION['msg'] = 'Por favor, preencha todos os campos!';
            header("Location: login.php");
            exit();
        }
        
        // Busca o usuário no banco de dados
        $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            // Senha correta
            $_SESSION['usuario'] = $usuario;
            header("Location: dashboard.php");
            exit();
        } else {
            // Senha incorreta
            $_SESSION['msg'] = 'Usuário ou senha incorretos!';
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = 'Por favor, preencha todos os campos!';
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    // Para segurança, não exiba detalhes do erro em um ambiente de produção
    error_log('Erro no banco de dados: ' . $e->getMessage());
    $_SESSION['msg'] = 'Ocorreu um erro, por favor tente novamente.';
    header("Location: login.php");
    exit();
}
?>
