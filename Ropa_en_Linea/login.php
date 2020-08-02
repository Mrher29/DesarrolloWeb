<?php include("Includes/loginHeader.php")?>
<?php include("db.php")?>



    <center>
    <h1>Auntenticarse</h1> <br>
    <span>ó <a href="signup.php">Registrate</a></span><br>
     <div class="col-md-4">
        <div class="card card-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Ingrese un Email registrado" class="form-control" autofocus>
                    </div><br>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    </div><br>
                    <input type="submit" value="Auntenticarse" class="btn btn-success btn-block" name="login">
                </form>
        </div>
       </div>
    </center>    

<?php include("Includes/footer.php")?>

<?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT id, email, password, rol FROM users WHERE email='$email' and password = md5('$password')";
        
        
        $resultado = mysqli_query($conn,$query);

        if($row = mysqli_fetch_array($resultado)){
            $_SESSION['user_id'] = $row[0];
            $_SESSION['user_rol'] = $row[3];

            $querySesion = "INSERT INTO sesion (usuario, rol) VALUES ('$row[1]','$row[3]')";
            mysqli_query($conn,$querySesion);


            header('Location: categoria.php');

        }else{
            die("Credenciales Incorrectas");
        }

      
        //$_SESSION['users_id']  = $results['id'];
       


    }

?>

