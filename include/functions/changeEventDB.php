<?php
    require "../../include/models/event_model.php";

    $connection = connect();

    $id = $_POST["Id"];
    $title = $_POST["Name"];
    $dateTime = $_POST["Date"];
    $startTime = $_POST["Starttime"];
    $location = $_POST["Location"];
    $description = $_POST["Desc"];
    $patron1 = $_POST["Patron1"];
    $patron2 = $_POST["Patron2"];
    
    if(isset($_POST['pubrunda'])){
        $IsPubrunda = 1;
    } else {
        $IsPubrunda = 0;
    }

    Events::update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $IsPubrunda);
 
 


