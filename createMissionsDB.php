<?php
    require "include/models/missions_model.php";
    $desc = $_GET["DESC"];
    $points = $_GET["POINTS"];
    if(isset($desc) && isset($points)){
        Missions::create_mission($desc, $points);
    }
    header('Location: missions.php');