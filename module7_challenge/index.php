<?php  
$num_of_activities="100";
$completed_activities=["85","20","45","30","65"];

$student1="Rita Bekteshi";
$age1="14";

$student2="Valeza Maqedonci";
$age2="13";

$student3="Diella Maqedonci";
$age3="13";

$student4="Anisa Thaqi";
$age4="16";

$student5="Sara Cocaj";
$age5="16";

$students = [$student1, $student2, $student3, $student4, $student5];
$ages = [$age1, $age2, $age3, $age4, $age5];

foreach ($completed_activities as $index => $completed){
    $percentage = ($completed / $num_of_activities) * 100;

    echo $students[$index] . "</br>";
    echo $ages[$index] . "</br>";
    echo "You have completed: " . $completed . " tasks</br>";

    if ($percentage <= 20) {
        echo $percentage . "% is bad, try harder!";
    }
    elseif ($percentage <= 40) {
        echo $percentage . "% is good!";
    }
    elseif ($percentage <= 60) {
        echo $percentage . "% is very good!";
    }
    else {
        echo $percentage . "% is an excellent job!";
    }

    echo "</br></br>";
}
?>