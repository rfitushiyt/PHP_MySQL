<?php
    $dogs = array(
        array("Golden Retriever" , "Scotland", "10-12 years"),
        array("German Sheperd" , "Germany", "9-13 years"),
        array("Labrador Retriever", "Newfoundland, California", "10-12 years")
    );

    echo $dogs[0][0]. ": Origin: ".$dogs[0][1]. ", Lifespan: ".$dogs[0][2]. "</br>";
    echo $dogs[1][0]. ": Origin: ".$dogs[1][1]. ", Lifespan: ".$dogs[1][2]. "</br>";
    echo $dogs[2][0]. ": Origin: ".$dogs[2][1]. ", Lifespan: ".$dogs[2][2]. "</br>";

    for($row = 0; $row < 3; $row++){
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for($col= 0; $col < 3; $col++){
            echo "<li>".$dogs[$row][$col]."</li>";
        }
        echo "</ul>";
    }

    for($i=0; $i<5; $i++){
        for($j=0; $j<=$i; $j++){
            echo "*";
        }
        echo "</br>";
    }

    //Associative arrays

    $grades = array("Math" => "5", "Physics" => "5", "Art" => "5", "Music" => "5");

    echo "Art grade is: ". $grades["Art"];
    echo "</br>";
    echo "</br>";

    foreach($grades as $subject => $grade){
        echo "Subject: " .$subject  . ", grade is: ".$grade . "</br>";
    }
?>