<?php
    require "include/models/missions_model.php";
    require_once "classes/PHPExcel/IOFactory.php"; 
    
    if(isset($_POST["DESC"]) && isset($_POST["POINTS"]) && !empty($_POST["DESC"]) && !empty($_POST["POINTS"])){
        $desc = $_POST["DESC"];
        $points = $_POST["POINTS"];
        Missions::create_mission($desc, $points);
    }
    if(isset($_FILES["FILE"]) && isset($_FILES["FILE"]["tmp_name"])){
        $document = PHPExcel_IOFactory::load($_FILES["FILE"]["tmp_name"]);
        $Sheet = $document->getActiveSheet()->toArray(null);
        for($i = 1; $i < count($Sheet); $i++){
            Missions::create_mission($Sheet[$i][0], $Sheet[$i][1]);
        }
    }
    header('Location: missions.php');