<?php
$con=mysqli_connect("localhost","youssef","4424392Yahz","blog");
if(!$con){
    echo mysqli_connect_error();
}
$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$query="delete from `users` where `id`='$id' ";
if(mysqli_query($con,$query)){
    header("location:DataBase.php");
    exit;
}
else{
    mysqli_error($con);
}

mysqli_close($con);



