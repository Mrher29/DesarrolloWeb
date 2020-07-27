<?php
    include("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro </title>
</head>
<body>
    <form action="registro.php" method="post">
        <div class="form-group">
            <input type="text" name="usuario" placeholder="Usuario">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Contraseña">
        </div>
        <input type="submit" value="Registro" name="Registro">
    </form>
</body>
</html>


<?php
    if(isset($_POST['Registro'])){
        $nombre = $_POST['usuario'];
        $password = $_POST['password'];

        $query = "INSERT INTO grupo4.user (nombre, password) VALUES ('$nombre', '$password')";
        $resultado = mysqli_query($conn, $query); 

        if(!$resultado){
            die("falló el registro");
        }
    }

?>