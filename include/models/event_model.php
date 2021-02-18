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

    static public function create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $isPubrunda)
    {
        $connection = connect();
        $sql = "INSERT INTO Events(Title, DateTime, StartTime, Location, Description, Patron1, Patron2, IsPubrunda) 
                VALUES ('$title', '$dateTime', '$startTime' , '$location', '$description', '$patron1', '$patron2', '$isPubrunda')";
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

    static public function update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $IsPubrunda)
    {
        $connection = connect();
        $sql = "UPDATE Events SET Title='$title', DateTime='$dateTime', StartTime='$startTime', 
        Location='$location', Description='$description', Patron1='$patron1', Patron2='$patron2', IsPubrunda='$IsPubrunda' where Id='$id'"; 
        $result = $connection->query($sql);
        $connection = disconnect();
    }

    
}
