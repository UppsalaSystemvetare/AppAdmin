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

    static public function create_mission($desc, $points, $week)
    {
        $connection = connect();
        $query = "INSERT INTO `WeekMission` (`Description`, `PointValue`, `Week`) VALUES ('$desc', '$points', $week)";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function change_mission($id, $desc, $points, $week)
    {
        $connection = connect();
        $query = "UPDATE WeekMission SET Description = '$desc', PointValue = '$points', Week = $week WHERE ID = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function delete_mission($id)
    {
        $connection = connect();
        $query = "DELETE FROM WeekMission WHERE Id = '$id'"; 
        $result = $connection->query($query);

        $greenquery = "DELETE FROM `WeekMission_Green` WHERE `Mission_Id` = '$id'";
        $greenresult = $connection->query($greenquery);

        $bluequery = "DELETE FROM `WeekMission_Blue` WHERE `Mission_Id` = '$id'";
        $blueresult = $connection->query($bluequery);

        $yellowquery = "DELETE FROM `WeekMission_Yellow` WHERE `Mission_Id` = '$id'";
        $yellowresult = $connection->query($yellowquery);

        $redquery = "DELETE FROM `WeekMission_Red` WHERE `Mission_Id` = '$id'";
        $redresult = $connection->query($redquery);

        $connection = disconnect();
        return $result;
    }

    static public function get_week_from_params()
    {
        $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url_components = parse_url($url);

        $week = "hej";

        if(isset($url_components['query'])) {
            parse_str($url_components['query'], $params);
            $week = $params['WEEK'];
        }

        return $week;
    }
}
