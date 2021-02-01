<?php
    require "../../include/models/event_model.php";
    $id = $_POST["ID"];
    Events::update_event($id, $title, $dateTime, $startTime, $location, $description, $patron1, $patron2);

