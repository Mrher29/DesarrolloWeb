<?php include("db.php") ; 
?>
<?php include("Includes/header.php") ; 
    
    
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
            <?php /*session_destroy();*/ } ?>

                <div class="card card-body">
                    <h1>Categorías</h1>
                    <form action="save_task.php" method="post">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Categoría" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="10" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                        <input type="submit" value="Save Task" class="btn btn-success btn-block" name="save_task">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Descripcion</th>
                            <th>Creado en</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
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

