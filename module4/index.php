<?php

    //Built-in Functions

    //phpinfo();

    $x = "Hello";
    print_r($x);

    echo "</br>";

    $a = 5;
    echo gettype($a) . "<br>";

    $b = 10.3;
    echo gettype($b) . "<br>";

    $c = "Singing";
    echo gettype($c) . "<br>";

    //User-created Functions

    function display(){
        echo "This is PHP  version is : " . phpversion();
        echo "</br>";
    }
    display();

    function hello(){
        echo "Hello World";
        echo "</br>";
    }
    hello();

    function sum(){
        $value = 120 + 20;
        echo  $value;
        echo "</br>";
    }
    sum();

    function shuma($x,$y){
        $value = $x + $y;
        echo  $value;
        echo "</br>";
    }
    shuma(12,40);

    function maximum($a,$b){
        if ($a > $b){
            return $a;
        }else{
            return $b;
        }
    }

    $a = 10;
    $b = 30;

    $test = maximum(10,30);
    echo "The max of $a and $b is $test";
    echo "</br>";

    function localVariable() {
    $h = 10; // local variable
    //echo $z;
    echo $h;
    } 
    localVariable();

    echo "</br>";

    function callCounter(){
    static $count = 0;
    $count++; //1
    echo "The value of count is: $count";
    echo "<br>";
    }
    callCounter(); //count=1
    callCounter();
?>