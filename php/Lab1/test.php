<?php

require_once 'conf.php';
$success=0;
$name=$email=$message=$nameErr=$emailErr=$messageErr="";
$end="Thank you for contacting Us";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || strlen($_POST["name"])>20 ) {
        $nameErr = "Name is invalid";
        $end="";
    } else {
        $name = test_input($_POST["name"]);
        $nameErr="";
        $end="Thank you for contacting Us";
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    elseif (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
    {
        $emailErr = "Email is not valid";
        $_POST["email"]="not valid";
    }

    else{
        $email = test_input($_POST["email"]);
        $emailErr="";
    }



    if (empty($_POST["message"]) || strlen($_POST["message"])>MAX_MESSAGE_LENGTH) {
        $messageErr = "invalid message lenth";
    } else {
        $message = test_input($_POST["message"]);
    }

if($emailErr!="Email is not valid" && $messageErr!="invalid message lenth" && $nameErr!="Name is invalid"){
   // echo "<center><h2>$end</h2></center>";
    $success=1;
}

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function get_default($field)
{
    if(isset($_POST[$field])){
        echo $_POST[$field];

    }
    else{
        echo "";
    }

}

function clear(){
    $name=$email=$message=$nameErr=$emailErr=$messageErr="";
    $_POST["name"]="";$_POST["email"]="";$_POST["message"]="";
}
echo "hello PHP in my firest try";?>
<html>
    <head>
        <title> contact form </title>
        <style>
            .error {color: #FF0000;}
        </style>

    </head>

    <body>
        <h3> Contact Form </h3>
        <div id="after_submit">

        </div>
        <form id="contact_form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php get_default("name"); ?>" size="30" required="required" /> <span class="error">* <?php echo $nameErr;?></span>
                <br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php get_default("email"); ?>"  size="30" required="required" /><span class="error">* <?php echo $emailErr;?></span><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea> <span class="error">* <?php echo $messageErr;?></span><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send" />
            <input id="clear" name="clear" type="reset" value="clear form" onclick="<?php clear(); ?>" />

        </form>
    </body>

</html>
<?php

if ($success==1) {
    echo "<hr />";
    echo "<h2>Thank you For Contacting Us";

    echo "<hr />";

}
?>


