<?php
class Users{
    static public function get_users(){
      $connection = connect();
      $all = "SELECT * FROM Users";
      $result = $connection->query($all);
      $connection = disconnect();

      return $result;
    }

    static public function change_team($id, $team){
      $connection = connect();
      $query = "UPDATE Users SET Team = '$team' WHERE ID = '$id'";
      if(!$result = $connection->query($query)){
        echo("Query error: " . $result->query_error);
        header("Location:../users.php");
      }
    }
  }
 ?>
