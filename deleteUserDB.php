<?php
require "include/models/header.php";
require "include/models/users_model.php";

$ID = $_POST["ID"];
Users::delete_user($ID);