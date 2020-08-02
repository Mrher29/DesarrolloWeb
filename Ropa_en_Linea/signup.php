<?php include("Includes/loginHeader.php")?>
<?php include("db.php")?>


    <center>
    <h1>Registrarse</h1> <br>
    <span>ó <a href="login.php">Autenticate</a></span><br>
     <div class="col-md-4">
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
    </center>    

<?php include("Includes/footer.php")?>
<?php 
    if(isset($_POST['save_user'])){
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $cPassword = $_POST['confirm_password'];
        $query = "INSERT INTO users (email, password) values ('$email', md5('$password'))";

        if($password != $cPassword){
            die('Las contraseñas no coinciden');
        }     
        
        
        
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Algo fallo');
        }

        header("Location: login.php");
    }
?>