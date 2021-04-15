<?php
require "../../include/models/faddrar_model.php";

$ID = $_POST["ID"];
Faddrar::delete_fadder($ID);