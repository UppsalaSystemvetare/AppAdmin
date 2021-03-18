<?php
    require "../../include/models/missions_model.php";

    $connection = connect();
    $id = $_POST["ID"];
    $desc = $_POST["DESC"];
    $points = $_POST["POINTS"];
    Missions::change_mission($id, $desc, $points);

    header('Location: ../../missions.php');