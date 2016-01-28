<?php
include 'cheatsheat.php';
$db_server = new mysqli("localhost", "root", "root", "roomschedule");
if ($db_server->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function table_room_gen($roomnumber) {
    $table = "<table> ";
    //run cycleday_room_gen for each cycleday   
}

function cycleday_room_gen($roomnumber, $cycleday) {
    //queries
    
}

function expression_to_array($roomnumber) {
    $db_server = new mysqli("localhost", "root", "root", "roomschedule");

    $get_expressions_of_all_classes_in_room = "SELECT * FROM master WHERE Room = '$roomnumber' AND Term != 'S1';";
    
    $result_of_get_expressions_of_all_classes_in_room = mysqli_query($db_server, $get_expressions_of_all_classes_in_room);
    if ($result_of_get_expressions_of_all_classes_in_room->connect_errno) {
        echo "connection failed: " . $mysqli->connect_errno;
    }
    $results_as_array = mysqli_fetch_array($result_of_get_expressions_of_all_classes_in_room, MYSQLI_ASSOC);
    //echo $results_as_array['Expression'];
    //print_r($results_as_array);
    
    while($row = mysqli_fetch_assoc($result_of_get_expressions_of_all_classes_in_room)):
        $everythingpertinentforthisday = $row['Expression'] . "$$ " .$row['Course Name'] . " && " . $row['Section'] . " </br>";
        //print_r($everythingpertinentforthisday);
        
        $modsforrow = substr($everythingpertinentforthisday, 0 ,strpos($everythingpertinentforthisday, "$$"));
        echo "</br>";
        echo "</br>";
        print_r($modsforrow);
        $modsforrowround2 = substr($modsforrow, 0, strpos($modsforrow, " "));
        echo "</br>";
        echo $modsforrowround2;
    endwhile;
}


expression_to_array("US 119");




















?>