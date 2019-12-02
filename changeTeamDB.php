<?php
require "include/models/users_model.php";

$Team = $_POST["Team"];
$ID = $_POST["ID"];
var_dump($Team);
var_dump($ID);
echo Users::change_team($ID, $Team);