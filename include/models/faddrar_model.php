<?php
  class Faddrar{

    static public function get_users(){
      $connection = connect();
      $query = "SELECT * FROM Faddrar";
      $result = $connection->query($query);
      $connection = disconnect();

      return $result;
    }

    static public function change_rank($id, $rank){
      $connection = connect();
      $query = "UPDATE Faddrar SET rank = '$rank' WHERE id = '$id'";
      $result = $connection->query($query);
      $connection = disconnect();
    }

    static public function change_team($id, $team){
      $connection = connect();
      $query = "UPDATE Faddrar SET team = '$team' WHERE id = '$id'";
      $result = $connection->query($query);
      $connection = disconnect();
    }

    static public function delete_user($id){
      $connection = connect();
      $query = "DELETE FROM Faddrar WHERE id = '$id'";
      $result = $connection->query($query);
      $connection = disconnect();

      return $result;
    }

    static public function filter(){
      //Vad ska den här funktionen göra?
    }

    static public function change_number(){
      $connection = connect();
      $query = "UPDATE Faddrar SET Number = '$number' WHERE id = '$id'";
      $result = $connection->query($query);
      $connection = disconnect();
    }
  }
