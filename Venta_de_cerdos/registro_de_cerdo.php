<?php include("db.php") ; 
?>
<?php include("Includes/header.php") ; 
    
    
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }

  
    if($_SESSION['user_rol'] != '1'){
        header("Location: registro_peso.php");
    }
    
?>
    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">

            <?php  if(isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php /*session_destroy();*/ } ?>

                <div class="card card-body">
                    <h1>Registro de lechon</h1>
                    <form action="registro_de_cerdo.php" method="post">
                        <div class="form-group">
                            <input type="number" name="precio" class="form-control" placeholder="Precio de compra" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" name="peso" class="form-control" placeholder="Peso en Libras">
                        </div>
                        <div class="form-group">
                            <input type="text" name="descripcion" class="form-control" placeholder="Descripción">
                        </div>
                        <div class="form-group">
                            <input type="number" name="edad" class="form-control" placeholder="Edad en meses">
                        </div>
                        <input type="submit" value="Save Task" class="btn btn-success btn-block" name="save_pig">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Precio</th>
                            <th>Peso en</th>
                            <th>Descripción</th>
                            <th>Edad</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM lechon";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['precio_compra'] ?></td>
                                <td><?php echo $row['peso'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['edad'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td>
                                    <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i></a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

<?php include("Includes/footer.php")  
?>


<?php
if(isset($_POST["save_pig"])){
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $descripcion = $_POST['descripcion'];
    $edad = $_POST['edad'];
    


    $select = "SELECT * FROM inventario";
    $selectResult = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($selectResult);


    $query = "INSERT INTO lechon (precio_compra,peso, descripcion,edad) VALUES('$precio', '$peso', '$descripcion','$edad')";

    if(!$row)
        $queryInventario = "INSERT INTO inventario (cantidad) values (1)";
    else 
        $queryInventario = "UPDATE inventario SET cantidad = cantidad + 1";
    //Necesita parametros cadena de conexión y consulta
    $result= mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $queryInventario);
    if(!$result){
        die("Query Failed");
    }

        //mensajes 
    $_SESSION['message'] = 'Animal registrado';
    $_SESSION['message_type'] = 'success';
    header("Location: registro_de_cerdo.php");
}

?>