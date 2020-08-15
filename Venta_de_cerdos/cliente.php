<?php include("db.php")?>
<?php include("Includes/header.php")?>
<?php if(!isset($_SESSION['user_id'])){
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
            <?php /*session_unset();*/ } ?>

            <div class="card card-body">
             <?php
                    $querySelect = "SELECT * FROM INVENTARIO";
                    
                    $resultadoSelect = mysqli_query($conn, $querySelect);
                    $row = mysqli_fetch_array($resultadoSelect);

                ?>
                <h1>INVENTARIO</h1>
                <h2><?php echo $row['cantidad']?></h2>

            
               
            </div>
            


<?php include("Includes/footer.php")?>



