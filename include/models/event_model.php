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

    static public function create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $patron3, $patron4, $locationCoords)
    {
        $connection = connect();
        $sql = "INSERT INTO Events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2, Patron3, Patron4, LocationCoords) 
                VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2', '$patron3', '$patron4', '$locationCoords')";
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

    static public function update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $patron3, $patron4, $locationCoords)
    {
        $connection = connect();
        $sql = "UPDATE Events SET Title='$title', DateTime='$dateTime', StartTime='$startTime', 
        Location='$location', Description='$description', Patron1='$patron1', Patron2='$patron2', Patron3='$patron3', Patron4='$patron4', LocationCoords='$locationCoords' where Id='$id'"; 
        $result = $connection->query($sql);
        $connection = disconnect();
    }

    
}
