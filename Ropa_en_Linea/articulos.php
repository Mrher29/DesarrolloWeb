<?php include("db.php")?>
<?php include("Includes/header.php")?>
<?php 
    if(!isset($_SESSION['user_id'])){
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

                <h1>Registro de artículos</h1>

                <?php

                    $query = "SELECT * FROM task";    

                    $result = mysqli_query($conn, $query);

                    ?>
                <form action="save_article.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="articulo" class="form-control" placeholder="Artículo" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="number" name="precio" class="form-control" placeholder="Precio" >
                    </div>
                    <div class="form-group">
                        <input type="color" name="color" class="form-control">
                        <!--input type="text" name="color" class="form-control" placeholder="color"-->
                    </div>
                    <div class="form-group">
                        <input type="number" name="talla" class="form-control" placeholder="Talla" >
                    </div>
                    <div class="form-group">
                        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" >
                    </div>
                    <div class="form-group">
                    <select name='categoria' class="form-control" placeholder="Categoría">
                        <?php while($row = mysqli_fetch_array($result)):; ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <input type="submit" value="Guardar artículo" class="btn btn-success btn-block" name="save_article">

                </form>
            </div>
            


            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Articulo</th>
                            <th>Precio</th>
                            <th>Color</th>
                            <th>Talla</th>
                            <th>Cantidad</th>
                            <th>Creado en:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM articulo";
                            $result_articulos = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_articulos)){?>
                            <tr>
                                <td><?php echo $row['articulo']?></td>
                                <td><?php echo 'Q ',$row['precio']?></td>
                                <td><?php echo $row['color']?></td>
                                <td><?php echo $row['talla'],' " '?></td>
                                <td><?php echo $row['cantidad'] ?></td>
                                <td><?php echo $row['created_at']?></td>
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