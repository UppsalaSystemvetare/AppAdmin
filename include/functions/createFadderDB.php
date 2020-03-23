<?php
    require "../models/faddrar_model.php";
    require_once "../../Classes/PHPExcel/IOFactory.php"; 
    
    // using form
    if(isset($_POST["NAME"]) && !empty($_POST["NAME"]) && 
        isset($_POST["RANK"]) && !empty($_POST["RANK"]) &&
        isset($_POST["TEAM"]) && !empty($_POST["TEAM"]) &&
        isset($_POST["NR"]) && !empty($_POST["NR"]) &&
        isset($_POST["IMG"]) && !empty($_POST["IMG"])){

        $name = $_POST["NAME"];
        $rank = $_POST["RANK"];
        $team = $_POST["TEAM"];
        $nr = $_POST["NR"];
        $imgURL = $_POST["IMG"];

        Faddrar::create_fadder($name, $rank, $team, $nr, $imgURL);
    }

    // using excel
    else if(isset($_FILES["FILE"]) && isset($_FILES["FILE"]["tmp_name"])){
        $document = PHPExcel_IOFactory::load($_FILES["FILE"]["tmp_name"]);
        $Sheet = $document->getActiveSheet()->toArray(null);
        for($i = 1; $i < count($Sheet); $i++){
            if($Sheet[$i][0] != "" && $Sheet[$i][1] != "" && $Sheet[$i][2] != "" && $Sheet[$i][3] != "" && $Sheet[$i][4] != ""){
                Faddrar::create_fadder($Sheet[$i][0], $Sheet[$i][1],  $Sheet[$i][2],  $Sheet[$i][3],  $Sheet[$i][4]);
            }
        }
    }
    
    header('Location: ../../faddrar.php');