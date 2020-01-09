<?php
require "include/models/header.php";

require "include/models/users_model.php";

$Team = $_POST["Team"];
$ID = $_POST["ID"];
Users::change_team($ID, $Team);

require "include/models/faddrar_model.php";

$Team = $_POST["Team"];
$ID = $_POST["ID"];
Faddrar::change_team($ID, $Team);

