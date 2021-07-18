<?php
    require "../models/missions_model.php";
    require_once "../../Classes/PHPExcel/IOFactory.php"; 
    
    // using form
    if(isset($_POST["DESC"]) && isset($_POST["POINTS"]) && !empty($_POST["DESC"])){
        $desc = $_POST["DESC"];
        $points = $_POST["POINTS"];
        Missions::create_mission($desc, $points);
    }

    // using excel
    else if(isset($_FILES["FILE"]) && isset($_FILES["FILE"]["tmp_name"])){
        $document = PHPExcel_IOFactory::load($_FILES["FILE"]["tmp_name"]);
        $Sheet = $document->getActiveSheet()->toArray(null);
        for($i = 1; $i < count($Sheet); $i++){
            if($Sheet[$i][0] != "" && $Sheet[$i][1] != ""){
                Missions::create_mission($Sheet[$i][0], $Sheet[$i][1]);
            }
        }
    }
    
    header('Location: ../../missions.php');