<?php
  class Users{

    static public function get_users(){
      $connection = connect();
      $query = "SELECT * FROM Users";
      $result = $connection->query($query);
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

    static public function delete_user($id){
      $connection = connect();
      $query = "DELETE FROM Users WHERE ID = '$id'";
      $result = $connection->query($query);
      $connection = disconnect();

      return $result;
    }

    static public function filter(){
      //Vad ska den här funktionen göra?
    }
  }
