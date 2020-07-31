<?php 

include("db.php");
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
if(isset($_POST['save_article'])){
    $articulo = $_POST['articulo'];
    $precio = $_POST['precio'];
    $color = $_POST['color'];
    $talla = $_POST['talla'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    $query = "INSERT INTO articulo (articulo, precio, color, talla, categoria, cantidad) VALUES ('$articulo','$precio','$color','$talla','$categoria','$cantidad')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Falló la consulta");
    }

    $_SESSION['message'] = 'Se guardó el artículo';
    $_SESSION['message_type'] = 'success';
    header("Location: articulos.php");
}

?>