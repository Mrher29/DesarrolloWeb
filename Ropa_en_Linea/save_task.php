<?php

include("db.php");

if(isset($_POST["save_task"])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO task (title, descripcion) VALUES('$title', '$description')";
    //Necesita parametros cadena de conexión y consulta
    $result= mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }

        //mensajes 
    $_SESSION['message'] = 'Tarea Guardada';
    $_SESSION['message_type'] = 'success';
    header("Location: categoria.php");
}
?>