<?php
    require "../../include/models/weekmissions_model.php";
    $id = $_POST["ID"];
    $desc = $_POST["DESC"];
    $points = $_POST["POINTS"];
    $week = $_POST['WEEK'];
    WeekMissions::change_mission($id, $desc, $points, $week);

    header("Location: ../../weekmissions.php?WEEK=${week}");