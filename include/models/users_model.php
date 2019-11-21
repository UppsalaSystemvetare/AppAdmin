<?php
class User{
    static public function get_users{
      $connection = connect();
      $all = "SELECT * FROM Users";
      $result = $connection->query($all);
      $connection = disconnect();
    }
    static publc function list_users{

    }
}
 ?>
