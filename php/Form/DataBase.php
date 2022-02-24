<?php
//start session
session_start();
if(isset($_SESSION["id"])){
    echo "welcome<br>";
    echo $_SESSION["email"] ;
    echo "<br>";
    echo '<a href="Authentication.php">Logout</a>';

}
else{
    header("Location:Authentication.php");
    exit;
}




//open the connection
$con=mysqli_connect("localhost","youssef","4424392Yahz","blog");
if(!$con){
    echo mysqli_connect_error();
    exit;
}

//Do operations
$query="select * from `users`";


// to check if user enter anything in ths search field

////////////////////////////////  important note in database query always put the $variable in a single quote ''  //////////////////
if(isset($_GET["search"])){
    $search=mysqli_escape_string($con,$_GET["search"]);
    $query.=" where `name` like '%$search%' or email like '%$search%' ";
}
$result=mysqli_query($con,$query);

?>
<html>
<head>
    <title>All_Users</title>
    <link href="table.css" rel="stylesheet">
</head>
<body>
<center>
    <h1>List Users</h1>
    <form method="get">
        <input style="width: 400px;height: 30px" type="search" name="search" placeholder="Enter name or Email to search..">
        <input style="height: 30px;width: 100px;background-color: #6c6363;color: white;border-radius: 5px;" type="submit" value="search">
    </form>
    <table class="tablestyle">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Admin</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <?php
        while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?=$row["id"]?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=($row["admin"]) ? 'Yes' : 'No'?></td>
            <td><p><a href="edit.php?id=<?=$row["id"]?>">edit</a>|<a href="delete.php?id=<?=$row["id"]?>">delete</a></p> </td>
        </tr>
        <?php } ?>
        <tfoot>
        <tr>
            <td colspan="3" ><?=mysqli_num_rows($result)?> users</td>
            <td colspan="2"><a href="SignUp.php">Add User</a> </td>
        </tr>
        </tfoot>
    </table>


</center>
</body>
</html>

<?php
/*while($row=mysqli_fetch_assoc($result)){

    echo "ID: ".$row['id']."<br>";
    echo "Name: ".$row['name']."<br>";
    echo "IEmail: ".$row['email']."<br>";
    echo str_repeat("-",50)."<br>";
}*/

//close the connection
mysqli_free_result($result);
mysqli_close($con);?>
