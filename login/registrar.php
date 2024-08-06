<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar</title>
</head>
<body>
    <?php if (isset($_SESSION['msg'])): ?>
        <p><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
    <?php endif; ?>
    <form action="processa_registro.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario"><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha"><br>
        <input type="submit" value="Registrar">
    </form>
    <a href="login.php">Já tem uma conta? Faça login</a>
</body>
</html>
