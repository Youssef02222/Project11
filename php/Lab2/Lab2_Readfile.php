<?php
session_start();

if(!isset($_SESSION["is_visited"]))//لو لم يزرني من قبل
{
    echo "firest visit hello";
    $_SESSION["is_visited"]=true;

}
else {
    $_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 2;
    echo "you visited this page " . $_SESSION["counter"] . " time";
}
echo "<br />";
if (file_exists("log1.txt")) {
    $content = file("log1.txt");
    echo "<br/>";
    foreach ($content as $value) {
        $data = explode(",", $value);
        echo " Date: " . $data[0];
        echo "<br />IP Address: " . $data[1];
        echo "<br />Email: " . $data[2];
        echo "<br />Name: " . $data[3];
        echo "<hr />";
    }
}

