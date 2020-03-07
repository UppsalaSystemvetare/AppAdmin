<?php
include("header.php");

class Events{

    static public function get_events(){
        $connection = connect();
        $all = "SELECT * FROM Events";
        $result = $connection->query($all);
        $connection = disconnect();
        return $result;
    }

    static public function create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $isPubrunda){
        $connection = connect();
		$sql = "INSERT INTO Events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2, IsPubrunda) 
                VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2', '$isPubrunda')";
        $result = $connection->query($sql);
		$connection = disconnect();
    }
}