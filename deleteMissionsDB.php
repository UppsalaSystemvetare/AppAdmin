<?php
    require "include/models/missions_model.php";
    $id = $_POST["ID"];
    Missions::delete_mission($id);