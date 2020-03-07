<?php
    require "../models/event_model.php";
    require_once "../../Classes/PHPExcel/IOFactory.php"; 
    $connection = connect();
    
    if(isset($_POST['Name']) && isset($_POST['Date']) && 
        isset($_POST['Starttime']) && isset($_POST['Location']) && 
        isset($_POST['Desc']) && isset($_POST['Patron1']) && isset($_POST['Patron2'])){
        
            $title = mysqli_real_escape_string($connection, $_POST['Name']);
        $description = mysqli_real_escape_string($connection, $_POST['Desc']);
        $location = mysqli_real_escape_string($connection, $_POST['Location']);
        $dateTime = mysqli_real_escape_string($connection, $_POST['Date']);
        $startTime = mysqli_real_escape_string($connection, $_POST['Starttime']);
        $patron1 = mysqli_real_escape_string($connection, $_POST['Patron1']);
        $patron2 = mysqli_real_escape_string($connection, $_POST['Patron2']);
        
        if(isset($_POST['pubrunda'])){
            $IsPubrunda = 1;
        } else {
            $IsPubrunda = 0;
        }

        Events::create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $IsPubrunda); 
    }
    header('Location: ../../events.php');