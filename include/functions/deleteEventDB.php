<?php
    require "../../include/models/event_model.php";
    $id = $_POST["ID"];
    Events::delete_event($id);