<?php
session_start();
$error=array();
if(isset($_POST["send"])){
    foreach ($_POST as $key=>$value){
        if(empty($value)){
            $error["$key"]=" * $key is required";
        }
    }
    if(empty($error)){
        $con=mysqli_connect("localhost","youssef","4424392Yahz","blog");
        if(!$con){
            echo mysqli_connect_error();
            exit;
        }
        $username=mysqli_escape_string($con,$_POST["name"]);
        $password=$_POST["password"];
        $query2="select * from `users` where `email`='$username' and `password`='$password';";
        $result=mysqli_query($con,$query2);
        if(($row=mysqli_fetch_assoc($result))){
            $_SESSION["id"]=$row["id"];
            $_SESSION["email"]=$row["email"];
            header("location:DataBase.php");
            exit;
        }
        else{
            $error["invalid"]="invalid email or password";
        }
        //close connection
       // mysqli_free_result($result);
     //   mysqli_close($con);

    }
}


?>

<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form method="post">
    <input type="text" name="name" placeholder="Username.."><strong style="color: #FF0000"><?php if(isset($error["name"])) echo $error["name"] ?></strong><br><br>
    <input type="password" name="password" placeholder="Password.."><strong style="color: red"><?php if(isset($error["password"])) echo $error["password"] ?></strong><br><br>
    <input type="submit" name="send" value="Login"><br><br>
    <strong style="color: red"><?php if(isset($error["invalid"])) echo $error["invalid"] ?></strong>


</form>
</body>
</html>
