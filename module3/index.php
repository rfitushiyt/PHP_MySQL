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

    echo "</br>";
    echo "</br>";


    //Loops (while, do while, for, foreach)

    $x = 1;
    while($x<=5){
        echo"The number is : $x <br>";
        $x++;
    }

    echo "</br>";

    $y=1;
    do{
        echo"The number is : $y <br>";
        $y++;
    }while($y >=5);
    
    echo "</br>";

    for($i=0; $i<=10; $i++){
        echo"Numri eshte $i <br>";
    }

    echo "</br>";

    //foreach vetem te arrays

    $cars = ["BMW", "Ferrari", "Lamborghini", "Ford", "Qiantu K50"];

    foreach($cars as $value){
        echo"The best car firm is : $value <br>";
    };

    echo "</br>";

      
$age = array("John" => 18, "Michael" => 20, "Joe" => 13);
 foreach($age as $key => $value){
    echo "$key = $value  <br>";
 }
?>