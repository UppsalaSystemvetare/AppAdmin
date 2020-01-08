<?php
    require "include/models/missions_model.php";
    $id = $_POST["ID"];
    WeekMissions::delete_mission($id);