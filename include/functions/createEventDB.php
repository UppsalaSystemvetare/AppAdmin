<?php
    require "../models/event_model.php";
    require_once "../../Classes/PHPExcel/IOFactory.php"; 
    $connection = connect();
    
    // using form
    if(isset($_POST['Name']) && isset($_POST['Date']) && 
        isset($_POST['Starttime']) && isset($_POST['Location']) && 
        isset($_POST['Desc']) && isset($_POST['Patron1']) && isset($_POST['Patron2']) && isset($_POST['Patron3']) && isset($_POST['Patron4']) && isset($_POST['LocationCoords'])){
        
        $title = mysqli_real_escape_string($connection, $_POST['Name']);
        $description = mysqli_real_escape_string($connection, $_POST['Desc']);
        $location = mysqli_real_escape_string($connection, $_POST['Location']);
        $dateTime = mysqli_real_escape_string($connection, $_POST['Date']);
        $startTime = mysqli_real_escape_string($connection, $_POST['Starttime']);
        $patron1 = mysqli_real_escape_string($connection, $_POST['Patron1']);
        $patron2 = mysqli_real_escape_string($connection, $_POST['Patron2']);
        $patron3 = mysqli_real_escape_string($connection, $_POST['Patron3']);
        $patron4 = mysqli_real_escape_string($connection, $_POST['Patron4']);
        $locationCoords = mysqli_real_escape_string($connection, $_POST['LocationCoords']);

        Events::create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $patron3, $patron4, $locationCoords); 
    }

    // TODO: Fixa på exceldelen också
    // using excel
    else if(isset($_FILES["FILE"]) && isset($_FILES["FILE"]["tmp_name"])){
        $document = PHPExcel_IOFactory::load($_FILES["FILE"]["tmp_name"]);
        $Sheet = $document->getActiveSheet()->toArray(null);
        for($i = 1; $i < count($Sheet); $i++){
            if($Sheet[$i][0] != "" && $Sheet[$i][1] != "" && $Sheet[$i][2] != "" && 
            $Sheet[$i][3] != "" && $Sheet[$i][4] != "" && $Sheet[$i][5] != "" && 
            $Sheet[$i][6] != ""){
                Events::create_event($Sheet[$i][0], $Sheet[$i][1],  $Sheet[$i][2],  $Sheet[$i][3],  $Sheet[$i][4],  $Sheet[$i][5],  $Sheet[$i][6],  $Sheet[$i][7]);
            }
        }
    }

    header('Location: ../../events.php');