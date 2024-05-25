<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="" method="POST">
        <h1>LOGIN</h1>
        <div class="us">
            <input type="text" placeholder="username" name="user">
        </div>
        <div class="pass">
            <input type="password" placeholder="password" name="pass">
        </div>
        <div class="sub">
            <input type="submit" name="logn">
        </div>
    </form>
</div>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST["logn"])){
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $qr="select * from form where EMAIL='$user' && PASSWORD='$pass'";
    $data=mysqli_query($a,$qr);
    $total=mysqli_num_rows($data);
    if($total==1){
        $_SESSION['user_name']=$user;
        header('location:display.php');
    }
    else{
        echo "<script>alert('give proper input')</script>";
    }
}
?>