<?php
class Users{
    static public function get_users(){
      $connection = connect();
      $all = "SELECT * FROM Users";
      $result = $connection->query($all);
      $connection = disconnect();

      return $result;
    }

    static public function change_team($id, $rank){
      $connection = connect();
      $query = "UPDATE Users SET Rank = '$rank' WHERE ID = '$id'";
      if(!$result = $connection->query($result)){
        echo("Query error: " . $result->query_error);
        header("Location:../users.php");
      }
    }
  }
 ?>
