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
      $result = $connection->query($result);
      $connection = disconnect();
      return $result;
    }

    //Vill vi kunna ta bort användare utifrån fler egenskaper än id, ex namn? C.
    static public function delete_user($id){
      $connection = connect();
      $query = "DELETE FROM Users WHERE ID = '$id'";
      $result = $connection->query($result);
      $connection = disconnect();
      return $result;
    }

    static public function search($value){
      $connection = connect();
      $query = "SELECT * FROM Users WHERE ID = '$value' OR
                                          User_ID = '$value' OR
                                          Rank = '$value' OR
                                          Team = '$value'";
      $result = $connection->query($result);
      $connection = disconnect();
      return $result;
    }
  }

 ?>
