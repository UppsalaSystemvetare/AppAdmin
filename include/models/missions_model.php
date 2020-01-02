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

    static public function change_rank($id, $rank){
        $connection = connect();
        $query = "UPDATE Users SET Rank = '$rank' WHERE ID = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function change_team($id, $team){
        $connection = connect();
        $query = "UPDATE Users SET Team = '$team' WHERE ID = '$id'";
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