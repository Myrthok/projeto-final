<?php
session_start();

// Configurações do banco de dados (substitua com suas credenciais)
$host = 'localhost';
$db = 'usuarios';
$user = '';
$pass = '';

try {
    // Conectando ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Verifica se os dados foram enviados
    if (isset($_POST['usuario']) && isset($_POST['senha'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        
        // Criptografa a senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        
        // Verifica se o usuário já existe
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['msg'] = 'Usuário já existe!';
            header("Location: registrar.php");
            exit();
        }

        // Insere o novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");
        $stmt->execute([$usuario, $senha_hash]);
        
        $_SESSION['msg'] = 'Cadastro realizado com sucesso!';
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['msg'] = 'Por favor, preencha todos os campos!';
        header("Location: registrar.php");
        exit();
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>