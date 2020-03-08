<?php
    require "../models/weekmissions_model.php";
    require_once "../../Classes/PHPExcel/IOFactory.php"; 
    
    if(isset($_POST["DESC"]) && isset($_POST["POINTS"]) && !empty($_POST["DESC"]) && !empty($_POST["POINTS"])){
        $desc = $_POST["DESC"];
        $points = $_POST["POINTS"];
        WeekMissions::create_mission($desc, $points);
    }
    else if(isset($_FILES["FILE"]) && isset($_FILES["FILE"]["tmp_name"])){
        $document = PHPExcel_IOFactory::load($_FILES["FILE"]["tmp_name"]);
        $Sheet = $document->getActiveSheet()->toArray(null);
        for($i = 1; $i < count($Sheet); $i++){
            if($Sheet[$i][0] != "" && $Sheet[$i][1] != ""){
                WeekMissions::create_mission($Sheet[$i][0], $Sheet[$i][1]);
            }
        }
    }
    header('Location: ../../weekmissions.php');