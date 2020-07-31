<?php
    include("db.php");
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $resultado = mysqli_query($conn,$query);
        if(!$resultado){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Tarea Eliminada';
        $_SESSION['message_type'] = 'danger';
        //redirección
        header("Location: categoria.php");
    }
?>