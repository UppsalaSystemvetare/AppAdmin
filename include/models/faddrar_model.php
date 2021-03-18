<?php
require_once "header.php";

class Faddrar
{

    static public function get_users()
    {
        $connection = connect();
        $query = "SELECT * FROM Faddrar";
        $result = $connection->query($query);
        $connection = disconnect();
        return $result;
    }

    static public function create_fadder($name, $rank, $team, $nr, $imgURL)
    {
        $connection = connect();
        $query = "INSERT INTO Faddrar (name, rank, team, Number, imgURL) VALUES ('$name', '$rank', '$team', '$nr', '$imgURL')";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function change_rank($id, $rank)
    {
        $connection = connect();
        $query = "UPDATE Faddrar SET rank = '$rank' WHERE id = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function change_team($id, $team)
    {
        $connection = connect();
        $query = "UPDATE Faddrar SET team = '$team' WHERE id = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
    }

    static public function delete_user($id)
    {
        $connection = connect();
        $query = "DELETE FROM Faddrar WHERE id = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();

        return $result;
    }

    static public function filter()
    {
        //Vad ska den här funktionen göra?
    }

    static public function change_number($id, $number)
    {
        $connection = connect();
        $query = "UPDATE Faddrar SET Number = '$number' WHERE id = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
    }
    
    static public function change_fadder($id, $name, $nr, $img)
    {
        $connection = connect();
        $query = "UPDATE Faddrar SET name = '$name', imgURL = '$img', Number = '$nr' WHERE id = '$id'";
        $result = $connection->query($query);
        $connection = disconnect();
    }
}
