<?php
    include("db.php");
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM articulo WHERE id = $id";
        $resultado = mysqli_query($conn, $query);
        if(!$resultado){
            die("No se pudo eliminar");
        }

        $_SESSION['message'] = 'Artículo eliminado';
        $_SESSION['message_type'] = 'success';

        header("Location: articulos.php");
    }
?>