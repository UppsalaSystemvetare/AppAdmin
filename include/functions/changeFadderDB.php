<?php
    require "../../include/models/faddrar_model.php";

    $connection = connect();
    $id = $_POST["ID"];
    $name = $_POST["NAME"];
    $nr = $_POST["NR"];
    $img = $_POST["IMG"];
    Faddrar::change_fadder($id, $name, $nr, $img);

    header('Location: ../../faddrar.php');