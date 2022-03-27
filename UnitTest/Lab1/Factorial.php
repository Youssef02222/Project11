<?php


    function factorial($num){
        if($num<0){
            echo "Factorial of $num is null". "\n";
            return null;
        }
        else if(!(is_int($num))){
            echo "Factorial of $num is null". "\n";
            return null;
        }
        else if($num==false){
            echo "Factorial of $num is false". "\n";
            return null;
        }

        $factorial = 1;
        for ($x=$num; $x>=1; $x--)
        {
            $factorial = $factorial * $x;
        }
        echo "Factorial of $num is $factorial". "\n";
    return $factorial;
    }
 
