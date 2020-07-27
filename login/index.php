<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php" method="POST">
        <div class="form-group">
            <input type="text" name="usuario" placeholder="usuario">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Contraseña">
        </div>
        <input type="submit" value="Login" name="Login">
    </form>
</body>
</html>

<?php 
    if(isset($_POST['Login'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $query = "SELECT id, nombre, password FROM grupo4.user WHERE nombre = '$usuario' and password = '$password'";
        $resultado = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($resultado);
        $_SESSION['user_id'] = $row[0]; 
        if($_SESSION['user_id']!=null){
            header("Location: principal.php");
        }

    }
  

?>

