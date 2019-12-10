<?php
require "include/models/header.php";
require "include/models/faddrar_model.php";

$Number = $_POST["Number"];
$ID = $_POST["ID"];
Faddrar::change_number($ID, $Number);
