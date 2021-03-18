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
        $query = "DELETE FROM Misson WHERE Id = '$id'"; // TODO ta bort alla lags koppling med uppdraget i missionyellow, missiongreen osv
        $result = $connection->query($query);
        $connection = disconnect();
        return $result;
    }
}

?>