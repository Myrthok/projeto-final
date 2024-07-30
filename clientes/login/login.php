<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        #login {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-top: 0;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="login">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo '<p class="message">' . htmlspecialchars($_SESSION['msg'], ENT_QUOTES, 'UTF-8') . '</p>';
            unset($_SESSION['msg']);
        }
        ?>
        <form action="processa_login.php" method="post">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Digite o nome de usuário" required> <br><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a senha" required> <br><br>
            <input type="submit" value="Login">
        </form>
        <a href="registrar.php">Crie sua conta</a>
    </div>
</body>
</html>
