<?php
require_once 'conf.php';
$message = array();
if(isset($_POST["send"])){
    foreach ($_POST as $key=>$value)
    {
        if(empty($value)) $message[] = "$key is required!";
    }
    $email = $_POST["email"];
    //debug($email);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $message[]= "email is not valid";
    }


    $messageErr=$_POST["message"];
    if(strlen($messageErr)<MAX_MESSAGE_LENGTH)
    {
        $message[]= "message must be more than 20 characters";
    }


    if(empty($message)){
        echo "<h2>thank you for contac us</h2>";
       // echo "<br>";
        $fp=fopen("log1.txt","a+");
        $date = date("F d Y h:m A");
        $ip = $_SERVER['REMOTE_ADDR'];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $fileData="$date, $ip, $name , $email";
        fwrite($fp,$fileData.PHP_EOL);
        foreach($_POST as $key=>$value){
            if($key != "send") echo "<br/>$key: $value";
        }

       // die("<br/><center>Thank you for submitting the form!</center>");
    }
}

function clearBtn() {
    $name = "";
    $email = "";
    $message = "";
}


function get_default($field){

    if(isset($_POST[$field])){
        echo $_POST[$field];
    }else{
        echo "";
    }
}

?>

<html>
<head>
    <title> contact form </title>


</head>

<body>
<h3> Contact Form </h3>
<h3><?php
    foreach($message as $line){
        echo "** $line <br/>";
    }
    ?></h3>
<div id="after_submit">

</div>
<form id="contact_form" action="Lab2.php" method="POST" enctype="multipart/form-data">

    <div class="row">
        <label class="required" for="name">Your name:</label><br />
        <input id="name" class="input" name="name" type="text" value="<?php  get_default("name");   ?>" size="30" /><br />

    </div>
    <div class="row">
        <label class="required" for="email">Your email:</label><br />
        <input id="email" class="input" name="email" type="text" value="<?php  get_default("email");   ?>" size="30" /><br />

    </div>
    <div class="row">
        <label class="required" for="message">Your message:</label><br />
        <textarea id="message" class="input" name="message" rows="7" cols="30" value="<?php  get_default("message");   ?>"></textarea><br />

    </div>

    <input id="submit" name="send" type="submit" value="send" />
    <input id="clear" onclick="clearBtn()" name="clear" type="reset" value="clear form" />

</form>
</body>

</html>
