<?php
require_once "header.php";

class Events
{

    static public function get_events()
    {
        $connection = connect();
        $all = "SELECT * FROM Events";
        $result = $connection->query($all);
        $connection = disconnect();
        return $result;
    }

    static public function create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $isPubrunda, $locationCoords)
    {
        $connection = connect();
        $sql = "INSERT INTO Events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2, IsPubrunda, LocationCoords) 
                VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2', '$isPubrunda', '$locationCoords')";
        $result = $connection->query($sql);
        $connection = disconnect();
    }

    static public function delete_event($id)
    {
        $connection = connect();
        $query = "DELETE FROM Events WHERE Id = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
        return $result;
    }

    static public function update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $locationCoords)
    {
        $connection = connect();
        $sql = "UPDATE events SET Title='$title', dateTime='$datetime', startTime='$starttime', 
        location='$location', description='$description', patron1='$Patron1', patron2='$Patron2', locationCoords='$locationCoords' where Id='$id'";
        $result = $connection->query($sql);
        $connection = disconnect();
    }
}
