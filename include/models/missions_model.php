<?php 
include("header.php");

class Missions{

    static public function get_missions(){
        $connection = connect();
        $all = "SELECT * FROM Misson";
        $result = $connection->query($all);
        $connection = disconnect();
        return $result;
    }

    static public function create_mission($desc, $points){
        $connection = connect();
        $query = "INSERT INTO `Misson` (`Description`, `PointValue`) VALUES ('$desc', '$points')";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function change_mission($id, $desc, $points){
        $connection = connect();
        $query = "UPDATE Misson SET Description = '$desc', PointValue = '$points' WHERE ID = '$id'"; 
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function delete_mission($id){
        $connection = connect();
        $query = "DELETE FROM Misson WHERE Id = '$id'"; 
        $result = $connection->query($query);

        $greenquery = "DELETE FROM `Misson_Green` WHERE `Misson_Id` = '$id'";
        $greenresult = $connection->query($greenquery);

        $bluequery = "DELETE FROM `Misson_Blue` WHERE `Misson_Id` = '$id'";
        $blueresult = $connection->query($bluequery);

        $yellowquery = "DELETE FROM `Misson_Yellow` WHERE `Misson_Id` = '$id'";
        $yellowresult = $connection->query($yellowquery);

        $redquery = "DELETE FROM `Misson_Red` WHERE `Misson_Id` = '$id'";
        $redresult = $connection->query($redquery);

        $connection = disconnect();
        return $result;
    }

}

?>