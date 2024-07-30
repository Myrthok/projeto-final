<?php
session_start();
include_once('conexao.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar-CRUD</title>
    <link rel="stylesheet" href="listar.css">
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#cpf").mask("###.###.###-##");
        })
    </script>
</head>

<body>
    <div id="edit_usuario">


        <h1>Editar Usuário</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form action="proc_edit_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"> <br><br>
            <label>email:</label>
            <input type="email" name="email" placeholder="digite o seu email" value="<?php echo $row_usuario['email']; ?>"> <br><br>
            <label>CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $row_usuario['cpf']; ?>"> <br><br>
            Sexo: <select name="sexo" value="<?php echo $row_usuario['sexo']; ?>">
                <option>M</option>
                <option>F</option>
            </select><br> <br>

            <input type="submit" value="editar">
            <a href="listar.php"><input type="button" value="lista"></a>
        </form>
    </div>

</body>

</html>