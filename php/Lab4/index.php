<?php

//open session and loading the composer
session_start();
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;
$con =new MYSQLHandler();
$con->connect2();

/*$capsule = new Capsule();
$capsule->addConnection([
    "driver" => _driver_,
    "host" => _host_,
    "database" => _database_,
    "username" => _username_,
    "password" => _password_
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();*/


$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
//$all_requrds= Capsule::table("items")->skip($index)->take(_Pager_size_)->get();
$all_requrds=$con->get_data("items",$index);
$next_index = $index +_Pager_size_;
$next_link = "http://localhost:63342/test/Lec/day4/index.php?_ijt=5do4ql5ugjf8o6fu627ugmkfn0&_ij_reload=RELOAD_ON_SAVE&index=$next_index";
$previous_index = (($index - _Pager_size_)>=0)?$index - _Pager_size_:0;
$previous_link = "http://localhost:63342/test/Lec/day4/index.php?_ijt=5do4ql5ugjf8o6fu627ugmkfn0&_ij_reload=RELOAD_ON_SAVE&index=$previous_index";

if(isset($_POST["send"])){
    $all_requrds=$con->get_record_by_id($_POST["id"]);
}
//$glasses = Capsule::table('items')->first();
//$searched_glasses = Capsule::table('items')->find(91);
//$usa_glasses_count = Capsule::table("items")->where("Country","=","USA")->count();
//$usa_glasses = Capsule::table("items")->where("Country","=","USA")->get();

//return response view
  require_once("views/table.php");
//require_once("views/intro.php");
?>
<html>
<center>
    <form method="post">
        <input name="id" type="text" placeholder="enter the id..">
        <input type="submit" value="search" name="send">
    </form>
</center>
</html>


