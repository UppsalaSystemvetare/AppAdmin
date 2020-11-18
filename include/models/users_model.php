<?php
class Users
{

  public $wp_users = [];

  function __construct()
  {
    $this->get_wp_users();
  }

  static public function get_users()
  {
    $connection = connect();
    $query = "SELECT * FROM Users";
    $result = $connection->query($query);
    $connection = disconnect();
    return $result;
  }

  public function get_wp_users()
  {
    $connection = connect2();
    $query = "SELECT a.id, b1.meta_value AS first_name, b2.meta_value as last_name
                    FROM wp_users a
                    INNER JOIN wp_usermeta b1 ON b1.user_id = a.ID AND b1.meta_key = 'first_name' 
                    INNER JOIN wp_usermeta b2 ON b2.user_id = a.ID AND b2.meta_key = 'last_name'";
    $result = $connection->query($query);
    while ($row = $result->fetch_row()) {
      $rows[] = $row;
    }
    $this->wp_users = $rows;
    $connection = disconnect();
  }

  public function get_user_rank_text($rank)
  {
    switch ($rank) {
      case (1):
        return "Recce";
      case (2):
        return "Fadder";
      case (3):
        return "Kapten";
      case (4):
        return "General";
    }
  }

  public function get_wp_name($id)
  {
    foreach ($this->wp_users as $user) {
      if (strcmp($user[0], strval($id)) == 0) {
        return $user[1] . " " . $user[2];
      }
    }
    return "User not found";
  }


  static public function change_rank($id, $rank)
  {
    $connection = connect();
    $query = "UPDATE Users SET Rank = '$rank' WHERE ID = '$id'";
    $result = $connection->query($query);
    $connection = disconnect();
  }

  static public function change_team($id, $team)
  {
    $connection = connect();
    $query = "UPDATE Users SET Team = '$team' WHERE ID = '$id'";
    $result = $connection->query($query);
    $connection = disconnect();
  }

  static public function delete_user($id)
  {
    $connection = connect();
    $query = "DELETE FROM Users WHERE ID = '$id'";
    $result = $connection->query($query);
    $connection = disconnect();

    return $result;
  }

  static public function filter()
  {
    //Vad ska den här funktionen göra?
  }
}
