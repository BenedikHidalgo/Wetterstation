<?php
    $conn = new PDO("mysql: host=localhost; dbname=wetterstation;","root");

    $stmt_select = "SELECT Temperatur, Luftfeuchtigkeit, Zeitpunkt FROM Daten;";
    $cmd_select = $conn->prepare($stmt_select);

    $cmd_select->execute();
    $time_arr = array();
    $i = 0;
    while (($record = $cmd_select->fetch()) != FALSE && $i<7) {
        array_push($time_arr, $record["Zeitpunkt"]);
        $i++;
    }
    echo '"';
    echo print_r(implode('", "',$time_arr));
    echo '"';
?>