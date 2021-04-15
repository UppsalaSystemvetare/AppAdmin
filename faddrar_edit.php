<!DOCTYPE html>
<?php
include("include/models/header.php");
include("include/html/menu.php");
include("include/models/faddrar_model.php");

if(!isset($_GET['id'])) {
  //  die('id not provided');  
    header('Location: ./faddrar.php');
}
  
$id = $_GET['id'];
$connection = connect();
$sql = "SELECT * FROM `Faddrar` WHERE id='$id'";
       // SELECT * FROM Mission where id =$id";

$result =$connection->query($sql);
$connection = disconnect();

if($result->num_rows != 1) {
   // die('id is not in db');
    header('Location: ./faddrar.php');
}

$data = $result->fetch_assoc();  

?>

<div class="content" id="create-faddrar">
        <h2>Redigera fadder:</h2>
        <form action="include/functions/changeFadderDB.php" id="fadder-form" method="post" enctype="multipart/form-data">
        <input id="id" name="ID" type="hidden" value="<?= $data['id']?>"> 
            <div class="form-group">
                <label for="name">Namn</label>
                <input id="name" name="NAME" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['name']?>">
            </div>
            <!-- Här kan ev rank och team läggas om man vill --> 
            <div class="form-group">
                <label for="number">Telefonnummer</label>
                <input id="number" name="NR" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['Number']?>">
            </div> 
            <div class="form-group">
                <label for="imgurl">Bild-länk</label>
                <input id="imgurl" name="IMG" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['imgURL']?>">
            </div> 
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
</div>


