<?php
    require "include/models/missions_model.php";
    $id = $_POST["ID"];
    $desc = $_POST["DESC"];
    $points = $_POST["POINTS"];
    Missions::change_mission($id, $desc, $points);