<?php include("db.php")?>
<?php include("Includes/header.php")?>
<?php 
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }

      
    if($_SESSION['user_rol'] != '2'){
        header("Location: registro_de_cerdo.php");
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

                <h1>Registro de pesos</h1>

                <?php

                    $query = "SELECT * FROM lechon";    

                    $result = mysqli_query($conn, $query);

                    ?>
                <form action="registro_peso.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <input type="number" name="peso" class="form-control" placeholder="Peso en Libras" >
                    </div>
                    <div class="form-group">
                    <select name='lechon' class="form-control" placeholder="Categoría">
                        <?php while($row = mysqli_fetch_array($result)):; ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[3];?> ID: <?php echo $row[0];?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                 
                    <input type="submit" value="Guardar Registro" class="btn btn-success btn-block" name="save_peso">

                </form>
            </div>
            


            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID del Animal</th>
                            <th>Peso</th>
                            <th>Fecha de Registro</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM registro_peso";
                            $result_articulos = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_articulos)){?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo 'lbs ',$row['peso']?></td>
                                <td><?php echo $row['fecha_registro']?></td>
                         
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


if(isset($_POST['save_peso'])){
    $id = $_POST['lechon'];
    $peso = $_POST['peso'];
    

    
	$query = "INSERT INTO registro_peso (id, peso) VALUES ('$id','$peso')";
    $result = mysqli_query($conn, $query);
   

    $_SESSION['message'] = 'Se registró el peso';
    $_SESSION['message_type'] = 'success';
    header("Location: registro_peso.php");
    
}

?>