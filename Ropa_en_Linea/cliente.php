<?php include("db.php")?>
<?php include("Includes/header.php")?>
<?php if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
    
    if($_SESSION['user_rol'] != '1'){
        header("Location: venta.php");
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
            <?php /*session_unset();*/ } ?>

            <div class="card card-body">

                <h1>Registro de Clientes</h1>

            
                <form action="cliente.php" method="post">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        
                        <input type="number" name="dpi" class="form-control" placeholder="DPI">
                    </div>
                    <div class="form-group">
                        <select name="sexo" class="form-control" >
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <textarea name="direccion" rows="10" class="form-control" placeholder="Dirección"></textarea>
                    </div>
                   
                    <input type="submit" value="Guardar artículo" class="btn btn-success btn-block" name="save_cliente">

                </form>
            </div>
            


            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DPI</th>
                            <th>Sexo</th>
                            <th>Dirección</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM cliente";
                            $result_articulos = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_articulos)){?>
                            <tr>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['apellidos']?></td>
                                <td><?php echo $row['dpi']?></td>
                                <td><?php echo $row['sexo']?></td>
                                <td><?php echo $row['direccion'] ?></td>
                                
                                <td>
                                    <a href="edit_article.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i></a>
                                    <a href="delete_article.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>


                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
<?php include("Includes/footer.php")?>


<?php
    include("Includes/footer.php");
?>

<?php
    if(isset($_POST['save_cliente'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dpi = $_POST['dpi'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];

        $query = "INSERT INTO cliente (nombre, apellidos, dpi, sexo, direccion) VALUES ('$nombre','$apellido','$dpi','$sexo','$direccion')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("No se pudo registrar el cliente");
        }

        
        

    }
?>