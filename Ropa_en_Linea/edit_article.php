<?php
    include("db.php");

    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM articulo WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $articulo = $row['articulo'];
            $precio = $row['precio'];
            $color = $row['color'];
            $talla = $row['talla'];
            $cantidad = $row['cantidad'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id']; 
        $articulo = $_POST['articulo'];
        $precio = $_POST['precio'];
        $color = $_POST['color'];
        $talla = $_POST['talla'];
        $cantidad = $_POST['cantidad'];
        
        $query = "UPDATE articulo SET articulo = '$articulo', precio = '$precio', color = '$color',talla = '$talla', cantidad = '$cantidad' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea actualizada';
        $_SESSION['message_type'] = 'warning';
        header("Location: articulos.php");

    }

?>

<?php include("Includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_article.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="articulo" value="<?php echo $articulo; ?>" id="" class="form-control" placeholder="Actualizar">
                    </div>
                    <div class="form-group">
                        <input type="number" name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <input type="color" name="color" value="<?php echo $color; ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <input type="number" name="talla" value="<?php echo $talla; ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="">
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("Includes/footer.php")?>