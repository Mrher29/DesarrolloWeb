<?php 
include("db.php");
include("Includes/header.php");?>

<?php if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                
                <div class="card card-body">
                    <h1>Ventas</h1>
                    <?php

                        $query = "SELECT * FROM articulo"; 
                        $query1 = "SELECT * FROM cliente" ;
                        $result = mysqli_query($conn, $query);
                        $result1 = mysqli_query($conn, $query1);
                        

                    ?>
                    <form action="venta.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="factura" class="form-control" placeholder="factura">
                        </div>    
                        <div class="form-group">
                            <select name='cliente' class="form-control" placeholder="Artículo" autofocus>
                            <?php while($row = mysqli_fetch_array($result1)):; ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1], ' ';?><?php echo $row[2];?></option>
                            <?php endwhile; ?>
                        </select>
                        </div>
                        
                       
                        <input type="submit" value="Pagar"  class="btn btn-success btn-block" name="save_venta">


                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Factura</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Fecha venta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM ventas";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['factura'] ?></td>
                                <td><?php echo $row['cliente'] ?></td>
                                <td><?php echo $row['total'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
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
        $factura = $_POST['factura'];
        //$total = $_POST['cantidad'];
        $cliente = $_POST['cliente'];
        $query = "INSERT INTO ventas (factura, cliente ) VALUES ('$factura', '$cliente')";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Fallo la consulta");
        }

    }
?>