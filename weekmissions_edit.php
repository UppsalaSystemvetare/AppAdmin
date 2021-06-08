<!DOCTYPE html>
<?php
include("include/models/weekmissions_model.php");
include("include/html/menu.php");

if(!isset($_GET['id'])) {
  //  die('id not provided');  
    header('Location: ./weekmissions.php');
}
  
$id = $_GET['id'];
$connection = connect();
$sql = "SELECT * FROM `WeekMission` WHERE id='$id'";
       // SELECT * FROM Mission where id =$id";

$result =$connection->query($sql);
$connection = disconnect();

if($result->num_rows != 1) {
   // die('id is not in db');
    header('Location: ./weekmissions.php');
}

$data = $result->fetch_assoc();  
?>

<div class="content" id="create-missions">
    <h2>Redigera veckouppdrag:</h2>
    <form action="include/functions/changeWeekMissionsDB.php" id="edit-weekmission-form" method="post" enctype="multipart/form-data">
    <input id="id" name="ID" type="hidden" value="<?= $data['Id']?>"> 
        <div class="form-group">
            <label for="week">Week Number</label>
            <select id="week" name="WEEK" >
                <?php for ($i=1; $i < 54; $i++) :?>
                    <option value="<?=$i?>" <?= ($i == $week) ? selected : '' ?>><?=$i?></option>
                <?php endfor ?>
            </select>
        </div>
        <div class="form-group">
            <label for="desc">Beskrivning</label>
            <input id="desc" name="DESC" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['Description']?>">
        </div>
        <div class="form-group">
            <label for="point">Poängvärde</label>
            <input id="point" name="POINTS" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['PointValue']?>">
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
</div>

