<?php   
    $school="Digital School";

    echo"I love $school";

    $x = 120;
    $y = 50;

    echo "</br>";
    echo $x + $y;
    echo "</br>";
    echo $x - $y;
    echo "</br>";
    echo $x * $y;
    echo "</br>";
    echo $x / $y;
    echo "</br>";
    echo $x % $y;

    echo "</br>";

    $a="Digital ";
    $b="School";

    $c=$a.$b;
    echo "$c";

    echo "</br>";

    $the_string="DIgital School";
    echo strlen($the_string);echo "</br>";
    echo str_word_count($the_string);

    echo "</br>";

    echo strrev($a);

    echo "</br>";

    $programming="Programming is not cool";
    echo str_replace("not","very",$programming);
?>