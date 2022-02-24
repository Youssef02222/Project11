<?php
$error=array();
$con = mysqli_connect("localhost", "youssef", "4424392Yahz", "blog");
if (!$con) {
    echo mysqli_connect_error();
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query2="select * from `users` where `id`='$id'";
$result=mysqli_query($con, $query2);
$row=mysqli_fetch_assoc($result);


if(isset($_POST["send"])) {
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $error["$key"] = "* $key is required";
        }
    }
    if (empty($error)) {


        $name = mysqli_escape_string($con, $_POST["name"]);
        $email = mysqli_escape_string($con, $_POST["email"]);
        $password = mysqli_escape_string($con, $_POST["password"]);
        $query = "update `users` set `name`='$name',`email`='$email',`password`='$password' where `id`='$id' ";


        if (mysqli_query($con, $query)) {
            echo "your data updated successfully";
            header("Location:DataBase.php");
        } else {
            mysqli_error($con);
            $error["email"]="* this email already exist try another one";
        }
    }
}

?>

<html>
<title>Edit user data</title>
<body style="font-family: Verdana, Geneva, Tahoma, sans-serif">
<h1>Edit your Data</h1>
<form method="post" >

<label>User name : </label><br>
    <input type="text" name="name" value="<?= (isset($row["name"])) ? $row["name"] : '' ?>"><strong style="color: #FF0000"><?php if(isset($error["name"])) echo $error["name"]; ?><br><br></strong>
<label>Email : </label><br>
<input type="email" name="email" value="<?= (isset($row["email"])) ? $row["email"] : '' ?>">
    <strong style="color: #FF0000"> <?php if(isset($error["email"])) echo $error["email"]; ?></strong><br><br>


<label>New password : </label><br>
    <input type="password" name="password"><strong style="color: #FF0000"><?php if(isset($error["password"])) echo $error["password"]; ?></strong><br><br>
    <input type="submit" value="submit" name="send">
</form>

</body>
</html>
