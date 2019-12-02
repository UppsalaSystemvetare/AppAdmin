<?php
require "include/models/users_model.php";

if (!isset($_POST["Team"])) {
    // header("location: index.php");
    echo "något gick fel";
}

$team = $_POST["Team"];
$ID = $_POST["ID"];
Users::change_team($ID, $Team); 