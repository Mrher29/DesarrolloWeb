<?php include("db.php");

        if(!$_SESSION["user_id"]){
            header("Location: index.php");

        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <h1>Te has logueado con id: <?php $_SESSION["user_id"]?></h1><br>
    <a href="logout.php">Logout</a>
</body> 
</html>