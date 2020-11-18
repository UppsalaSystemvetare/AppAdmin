<?php
include("header.php");

class WeekMissions
{

    static public function get_missions()
    {
        $connection = connect();
        $all = "SELECT * FROM WeekMission";
        $result = $connection->query($all);
        $connection = disconnect();
        return $result;
    }

    static public function create_mission($desc, $points)
    {
        $connection = connect();
        $query = "INSERT INTO `WeekMission` (`Description`, `PointValue`) VALUES ('$desc', '$points')";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function change_mission($id, $desc, $points)
    {
        $connection = connect();
        $query = "UPDATE WeekMission SET Description = '$desc', PointValue = '$points' WHERE ID = '$id'"; // TODO ändra alla lags koppling med uppdraget
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function delete_mission($id)
    {
        $connection = connect();
        $query = "DELETE FROM WeekMission WHERE Id = '$id'"; // TODO ta bort alla lags koppling med uppdraget i missionyellow, missiongreen osv
        $result = $connection->query($query);
        $connection = disconnect();
        return $result;
    }
}
