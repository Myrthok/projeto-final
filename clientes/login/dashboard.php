<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3); /* Gradiente de fundo */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 600px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        a:hover {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }
        footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <a href="logout.php">Sair</a>

        <footer>
            <p>© 2024 Dashboard - Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
