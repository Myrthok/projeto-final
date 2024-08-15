<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/login/background.css">
</head>
<body>
    <?php if (isset($_SESSION['msg'])): ?>
        <p><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
    <?php endif; ?>
    <form action="processa_login.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <input type="submit" value="Login">
    </form>
    <div class="link-conteiner">
        <a href="registrar.php">Não tem uma conta? Registre-se</a>
    </div>
        
</body>
</html>

