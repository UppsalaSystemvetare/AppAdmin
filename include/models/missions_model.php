<?php 
include("header.php");

function get_all_assoc(){
    $connection = connect();
    $all = "SELECT * FROM Misson";
    $result = $connection->query($all);
    $connection = disconnect();
    return $result;
}

?>