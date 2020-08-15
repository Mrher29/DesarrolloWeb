<?php include("Includes/header.php")?>
<?php include("db.php")?>


<?php

 
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

if($_SESSION['user_rol'] != '1'){
    header("Location: registro_peso.php");
}
?>

<div class="container p-4">
    <div class="row">
   
     <br>
    
     <div class="col-md-4">
     <h1>Registro</h1>
        <div class="card card-body">
                <form action="signup.php" method="post">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Ingrese un Email registrado" class="form-control" autofocus>
                    </div><br>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <input type="password" name="confirm_password" placeholder="Confirmar contraseña" class="form-control">
                    </div><br>
                    
                    <input type="submit" value="Auntenticarse" class="btn btn-success btn-block" name="save_user">
                </form>
        </div>

       
       </div>
       <div class="col-md-8">
            <table class="table table-bordered">
            <thead>
                        <tr>
                            <th>ID</th>
                            <th>USUARIO</th>
                            <th>ROL</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM usuarios";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['usuario'] ?></td>
                                <td><?php echo $row['rol'] ?></td>
                                
                                
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

<?php include("Includes/footer.php")?>
<?php 
    if(isset($_POST['save_user'])){
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $cPassword = $_POST['confirm_password'];
        $query = "INSERT INTO usuarios (usuario, password) values ('$email', md5('$password'))";

        if($password != $cPassword){
            die('Las contraseñas no coinciden');
        }     
        
        
        
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Algo fallo');
        }

        
    }
?>