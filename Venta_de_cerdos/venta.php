<?php 
include("db.php");
include("Includes/header.php");?>

<?php if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }?>


    <?php
     if($_SESSION['user_rol'] != '1'){
        header("Location: registro_peso.php");
    }
    
    ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                
                <div class="card card-body">
                    <h1>Ventas</h1>
                    <?php

                        $query = "SELECT * FROM articulo"; 
                        $query1 = "SELECT * FROM lechon" ;
                        $result = mysqli_query($conn, $query);
                        $result1 = mysqli_query($conn, $query1);
                        

                    ?>
                    <form action="venta.php" method="POST">
                        
                         <div class="form-group">
                            <select name='cerdo' class="form-control" placeholder="Artículo" autofocus>
                            <?php while($row = mysqli_fetch_array($result1)):; ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[3];?> ID: <?php echo $row[0];?></option>
                            <?php endwhile; ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="number" name="preciolbs" class="form-control" placeholder="Precio en Libras">
                        </div>    
                        
                        <div class="form-group">
                            <input type="number" name="precioVenta" class="form-control" placeholder="Precio de Venta">
                        </div>  
                        <div class="form-group">
                            <input type="number" name="age" class="form-control" placeholder="Edad">
                        </div>   
                        
                       
                        <input type="submit" value="Pagar"  class="btn btn-success btn-block" name="save_venta">


                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Venta</th>
                            <th>Animal</th>
                            <th>Precio en LBS</th>
                            <th>Precio de venta</th>
                            <th>Edad</th>
                            <th>Fecha venta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM venta";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['cerdo'] ?></td>
                                <td><?php echo $row['precio'] ?></td>
                                <td><?php echo $row['precio_venta'] ?></td>
                                <td><?php echo $row['age'] ?></td>
                                <td><?php echo $row['fecha_venta'] ?></td>
                                <td>
                                    <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i></a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i></a>
                                    <a href="detalle_venta.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fas fa-bars"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


<?php include("Includes/footer.php");?>


<?php
    if(isset($_POST['save_venta'])){
        $cerdo = $_POST['cerdo'];
        $preciolbs = $_POST['preciolbs'];
        $precioVenta = $_POST['precioVenta'];
        $age = $_POST['age'];
        $query = "INSERT INTO venta (cerdo, precio, precio_venta, age) VALUES ('$cerdo', '$preciolbs', '$precioVenta', '$age')";
        $querydelete = "DELETE FROM lechon WHERE id = '$cerdo'";
        $queryUpdate = "UPDATE inventario SET cantidad = cantidad - 1";
        $resultado = mysqli_query($conn, $query);
        mysqli_query($conn, $querydelete);
        mysqli_query($conn, $queryUpdate);

        if(!$resultado){
            die("Fallo la consulta");
        }

    }
?>