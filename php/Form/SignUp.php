<?php
//validation
$error=array();
if(isset($_POST["send"])){
    foreach ($_POST as $key=>$value){
        if(empty($value))
        {
            $error[] = "$key is required!";
            break;
        }
        elseif (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $error[]="Email not valid";
            break;
        }
        elseif ($_POST["password"]!=$_POST["Confirm_password"]){
            $error[]="Passwords not identical";
            break;
        }

    }

    // Every thing is ok
    if(empty($error))
    {
       //die("thank you");
        $con=mysqli_connect("localhost","youssef","4424392Yahz","blog");
        if(!$con){
            echo mysqli_connect_error();
            exit;
        }
        $name1=mysqli_escape_string($con,$_POST["name"]);
        $email=mysqli_escape_string($con,$_POST["email"]);
        $password=mysqli_escape_string($con,$_POST["password"]);
        //insert
        $query="INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name1','$email','$password'); ";
        if(mysqli_query($con,$query)){
            echo "thank you, your information has been saved";
            header("Location:DataBase.php");
            exit;
        }
        else{
            echo $query;
            echo mysqli_error($con);
        }
        mysqli_close($con);
    }
    // user invalid data
    else{
       // header("Location: SignUp.php?$error=".implode(",",$error));
       // exit;
    }
}
//var_dump($error);

function keepField($var){
    if(isset($_POST["$var"])){
        echo $_POST["$var"];
    }
    else{
        echo "";
    }
}
?>
<html>
<head>
    <title>SignUp_Page</title>
    <style>

        .login{
            background-color: #f5e1ce;
            border-radius: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 25%;
            margin: 35px auto;
            padding: 15px;
            text-align: center;

        }
        .input{
            width: 80%;
            background-color: #f8d6bf;
            border: none;
            line-height: 2;
            outline: none;
            padding: 5px;
        }
        .input::placeholder{
            color: #6b6161;
        }
        .input:focus{
            border: 1px solid #da6f15;
        }
        .button{
            background-color: #9b795f;
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 10px;
            width: 40%;
            font-family:fantasy;
            font-size: large;
        }
        .button:hover{
            background-color: #6b532b;
        }
    </style>
</head>
<body>
<form class="login" method="post" action="SignUp.php">
    <p style="font-family: Forte;font-size: 35px;color: #775740">SignUp</p>

    <input id="1" class="input" type="text" name="name" placeholder="User name.." value="<?php keepField("name"); ?>"><br><br>

    <input  id="2" class="input" type="text" name="email" placeholder="email.." value="<?php keepField("email"); ?>"><br><br>

    <input id="3" class="input" type="password" name="password" placeholder="Password.." value="<?php keepField("password"); ?>"><br><br>

    <input id="4" class="input" type="password" name="Confirm_password" placeholder="confirm password.." value="<?php keepField("Confirm_password"); ?>" ><br><br>
    <h3 style="color:red "><?php  foreach ($error as $item){echo "* $item";}  ?></h3>

    <input class="button" type="submit" name="send" value="Submit">
    <input  class="button" id="clear" onclick="clear()"  name="clear" type="reset" value="clear form" />

    <script>
        function clear()
        {
            document.getElementById("1").innerHTML="";
            document.getElementById("2").innerHTML="";
            document.getElementById("3").innerHTML="";
            document.getElementById("4").innerHTML="";
        }
    </script>

</form>
</body>
</html>
