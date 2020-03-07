<?php
    require "../../include/models/weekmissions_model.php";
    $id = $_POST["ID"];
    WeekMissions::delete_mission($id);