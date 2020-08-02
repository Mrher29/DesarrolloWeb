<?php
    include("db.php");
    include("Includes/header.php");
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
?>

<div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                
                <div class="card card-body">
                    
                    <?php

                        $query = "SELECT * FROM articulo"; 
                       
                        $result = mysqli_query($conn, $query);
                       
                        

                    ?>
                    <form action="detalle_venta.php" method="POST">
                        
                        <h1>Detalle Venta</h1>

                        <div class="form-group">
                        <select name='articulo' class="form-control" placeholder="Artículo" autofocus>
                            <?php while($row = mysqli_fetch_array($result)):; ?>
                            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php endwhile; ?>
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="venta">ID venta</label>
                            <input type="number" name="venta" value="<?php echo $_GET['id'];?>" class="form-control" readonly="TRUE">
                        </div>
                       
                        <input type="submit" value="Agregar a carrito" class="btn btn-success btn-block" name="detalle_venta">

                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            <th>Venta</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ventaId = $_GET['id'];
                        $query = "SELECT * FROM detalle_venta where venta = '$ventaId'";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                               
                                <td><?php echo $row['venta'] ?></td>
                                <td><?php 
                                    $idfoto = $row["articulo"];
                                    $imaSelect = "SELECT foto FROM articulo WHERE id = '$idfoto'";
                                    $resulta = mysqli_query($conn, $imaSelect);
                                    while($fila = mysqli_fetch_array($resulta)){
                                        echo "<div id='img_div'>";
                                            echo "<img height='100' width='100' src='uploads/".$fila['foto']."'>"; 
                                        echo "</div>";

                                    }
                                
                                ?></td>
                                <td><?php echo $row['cantidad'] ?></td>
                                <td><?php echo $row['subtotal'] ?></td>
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



<?php

    

    if(isset($_POST['detalle_venta'])){
        $id = $_POST['venta'];
        $articulo = $_POST['articulo'];
        $cantidad = $_POST['cantidad'];
        
        $queryPrecio = "SELECT precio FROM articulo WHERE id = '$articulo'";
        $precio = mysqli_query($conn, $queryPrecio);
        $row = mysqli_fetch_array($precio); 
        $subTotal = $row['precio'] * $cantidad; 
       
        
        //inserta en tabla detalle
        $query3 = "INSERT INTO detalle_venta ( venta, articulo, cantidad, subtotal) VALUES ('$id','$articulo','$cantidad','$subTotal')";
        $resultado3 = mysqli_query($conn, $query3);
        if(!$resultado3){
            print mysqli_error($conn); 
        }
        
        //realiza una venta de stock
        $actualizarStock = "UPDATE articulo SET cantidad = cantidad - '$cantidad' WHERE id = '$articulo'"; 
        $queryActualizar = mysqli_query($conn, $actualizarStock); 


        //actualiza el total de la venta
        $actualizarTotal = "UPDATE ventas SET total = (SELECT sum(subtotal) from detalle_venta where venta = '$id')
                            WHERE id = '$id'";
        $queryTotal = mysqli_query($conn, $actualizarTotal);

        
    }

    include("Includes/footer.php"); 

?>