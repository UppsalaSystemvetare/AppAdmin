<?php
    require "../../include/models/weekmissions_model.php";
    $id = $_POST["ID"];
    $desc = $_POST["DESC"];
    $points = $_POST["POINTS"];
    WeekMissions::change_mission($id, $desc, $points);

    header('Location: ../../weekmissions.php');