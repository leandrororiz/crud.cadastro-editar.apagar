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
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Editar CRUD</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php
    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="proc_edit_usuarios.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id'];?>">

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo
         $row_usuario['nome']; ?>"> <br><br> 
        <label>email:</label>
        <input type="email" name="email" placeholder="Digite o seu email" value="<?php echo 
        $row_usuario['nome']; ?>"> <br><br> 

        <input type="submit" value="Editar">
        <a href="listar.php"><input type="button" value="Listar"></a>
    </form>
</body>
</html>