<?php   
    
    $num = 4;

    if($num>0){
        echo "$num is grater than 0";
    }

    echo "</br>";

    $age = 13;

    if(($age>12) && ($age<20)){
        echo"You are a teenager";
    }

    echo "</br>";

    $Age = 19;

    if($Age < 18){
        echo"You are under 18";
    }else{
        echo"You are an adult";
    }

    echo "</br>";

    $number = 8;
    
    if($number < 0){
        echo"The value of $number is a negativ number";
    }elseif($number == 0){
        echo"The value of $number is 0";
    }else{
        echo"The value of $number is a positive number";
    }

    echo "</br>";

    $number_1 = 10;
    $number_2 = 20;

    if(($number_1 == $number_2)){
        echo"$number_1 is equal to $number_2";
    }else{
        echo"$number_1 is not equal to $number_2";
    }

    echo "</br>";

    $dita = 1;

    switch($dita){
        case 1 :
            echo"E hene";
            break;

        case 2 :
            echo"E marte";
            break;

        case 3 :
            echo"E merkure";
            break;

        default:
        echo"Dite e pavlefshme";
    }

?>