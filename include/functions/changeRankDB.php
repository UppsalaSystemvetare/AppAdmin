<?php
require "../../include/models/header.php";
require "../../include/models/users_model.php";

$Rank = $_POST["Rank"];
$ID = $_POST["ID"];
Users::change_rank($ID, $Rank);

require "../../include/models/faddrar_model.php";

$Rank = $_POST["Rank"];
$ID = $_POST["ID"];
Faddrar::change_rank($ID, $Rank);

