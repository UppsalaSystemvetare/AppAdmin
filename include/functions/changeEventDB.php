<?php
    require "../../include/models/event_model.php";

    $connection = connect();

/*
    var_dump ($_POST["Date"]);
    var_dump ($_POST["Starttime"]);
    var_dump ($_POST["Patron1"]);
    var_dump ($_POST["Patron2"]);


    $id = $_POST["id"]; //ändra till liten bokstav!!
    $title = $_POST["Name"];
    $dateTime = $_POST["Date"];
    $startTime = $_POST["Starttime"];
    $location = $_POST["Location"];
    $description = $_POST["Desc"];
    $patron1 = $_POST["Patron1"];
    $patron2 = $_POST["Patron2"];

    var_dump ($dateTime);
    var_dump ($startTime);
    var_dump ($patron1);
    var_dump ($patron2);

   
    
    if(isset($_POST['pubrunda'])){
        $IsPubrunda = 1;
    } else {
        $IsPubrunda = 0;
    }

   */

  if(isset($_POST['Name']) && isset($_POST['Date']) && 
  isset($_POST['Starttime']) && isset($_POST['Location']) && 
  isset($_POST['Desc']) && isset($_POST['Patron1']) && isset($_POST['Patron2'])){
  
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $title = mysqli_real_escape_string($connection, $_POST['Name']);
    $dateTime = mysqli_real_escape_string($connection, $_POST['Date']);
    $startTime = mysqli_real_escape_string($connection, $_POST['Starttime']);
    $location = mysqli_real_escape_string($connection, $_POST['Location']);
    $description = mysqli_real_escape_string($connection, $_POST['Desc']);
    $patron1 = mysqli_real_escape_string($connection, $_POST['Patron1']);
    $patron2 = mysqli_real_escape_string($connection, $_POST['Patron2']);

    var_dump ($dateTime);
    var_dump ($startTime);
    var_dump ($patron1);
    var_dump ($patron2);
  
    if(isset($_POST['pubrunda'])){
          $IsPubrunda = 1;
    } else {
          $IsPubrunda = 0;
    }

    //Events::create_event($title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $IsPubrunda); 
    Events::update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $IsPubrunda);
    }

    //Events::update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2, $IsPubrunda);
 
