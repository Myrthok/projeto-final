<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#cpf").mask("###.###.###-##");
        })
    </script>
    <title>Document</title>
    <link rel="stylesheet" href="listar.css">
</head>

<body>
    <div id="cadastrar">

        <h1>Cadastrar Usuário</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <form action="processa.php" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome completo"> <br><br>
            <label>email:</label>
            <input type="email" name="email" placeholder="Digite o seu e-mail"> <br><br>
            <label>CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="CPF"> <br><br>
            Sexo: <select name="sexo">
                <option>M</option>
                <option>F</option>
            </select><br> <br>
            <input type="submit" value="Cadastrar">
            <a href="listar.php">
                <input type="button" value="Listar"></a>
        </form>
    </div>
</body>

</html>