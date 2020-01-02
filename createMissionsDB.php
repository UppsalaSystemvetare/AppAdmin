<?php
    require "include/models/missions_model.php";
    
    if(isset($_GET["DESC"]) && isset($_GET["POINTS"])){
        $desc = $_GET["DESC"];
        $points = $_GET["POINTS"];
        Missions::create_mission($desc, $points);
    }

    if(isset($_POST["FILE"])){
        var_dump($_POST["FILE"]);
    }
    // header('Location: missions.php');