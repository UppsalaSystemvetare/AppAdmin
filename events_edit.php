<!DOCTYPE html>
<?php
include("include/models/event_model.php");
include("include/models/faddrar_model.php");
include("include/html/menu.php");

if(!isset($_GET['id'])) {
  //  die('id not provided');  
    header('Location: ./events.php');
}
  
$id = $_GET['id'];
$connection = connect();
$sql = "SELECT * FROM Events where id =$id";
$result =$connection->query($sql);
$connection = disconnect();

if($result->num_rows != 1) {
   // die('id is not in db');
    header('Location: ./events.php');
}

$data = $result->fetch_assoc();
?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>    
<script src="assets/js/events.js"></script>
<script src="assets/js/eventMap.js"></script>

<div class="content" id="edit-events">
        <h2>Redigera event:</h2>
        <form id="edit-event" action="include/functions/changeEventDB.php" method="post" enctype="multipart/form-data">
        <input id="id" name="id" type="hidden" value="<?= $data['Id']?>"> 
            <div class="form-group">
                <label for="title">Namn på event:</label>
                <input id="title" name="Name" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['Title']?>"> 
            </div>

            <div class="form-group">
                <label for="description">Beskrivning:</label>
                <textarea id="description" name="Desc" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" > <?= $data['Description']?>  </textarea>
            </div>
            <div class="form-group">
                <label for="location">Plats:</label>
                <input id="location" name="Location" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="<?= $data['Location']?>" >
            </div>
            <div class="form-group">
                <input
                 id="pac-input"
                 class="controls form-control"
                 type="text"
                 placeholder="Adress/Namn"/>
                <div id="map"></div>
                <script
                 type="text/javascript"
                 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjmPlXy3hVcNF3Ifaww7-0jb_utpXNq5s&callback=initMap&libraries=places"
                 async
                ></script>
                <input type="hidden" id="locationCoords" name="LocationCoords" value=<?= $data['LocationCoords']?> />
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="datetime">Datum:</label>
                        <input class="form-control" name="Date" type="date" id="datetime" value="<?= $data['DateTime']?>">
                    </div>
                    <div class="col">
                        <label for="starttime">Klockslag:</label>
                        <input class="form-control" name="Starttime" type="time" id="starttime" value="<?= $data['StartTime']?>">
                    </div>
                </div>
            </div>
            <label for="patron1">Nykterfaddrar:</label>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <select name="Patron1" class="form-control" id="patron1">
                            <option value="" selected>Nykterfadder 1</option>
                            <?php 
                                $result = Faddrar::get_users(); 
                               
                                while($row = $result->fetch_assoc()){ ?>
                                <option value="<?php echo $row["id"] ?>"

                                <?php 
                                if ($row["id"] == $data['Patron1'] ) {echo "selected";}
                                ?>

                                ><?php echo $row["name"] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="col">
                        <select name="Patron2" class="form-control" id="patron2">
                            <option value="" selected>Nykterfadder 2</option>
                            <?php 
                                $result = Faddrar::get_users();
                                while($row = $result->fetch_assoc()){ ?>
                                <option value="<?php echo $row["id"] ?>"
                                
                                <?php 
                                if ($row["id"] == $data['Patron2'] ) {echo "selected";}
                                ?>

                                ><?php echo $row["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <select name="Patron3" class="form-control" id="patron3">
                            <option value="" selected>Nykterfadder 3</option>
                            <?php 
                                $result = Faddrar::get_users(); 
                               
                                while($row = $result->fetch_assoc()){ ?>
                                <option value="<?php echo $row["id"] ?>"

                                <?php 
                                if ($row["id"] == $data['Patron3'] ) {echo "selected";}
                                ?>

                                ><?php echo $row["name"] ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="col">
                        <select name="Patron4" class="form-control" id="patron4">
                            <option value="" selected>Nykterfadder 4</option>
                            <?php 
                                $result = Faddrar::get_users();
                                while($row = $result->fetch_assoc()){ ?>
                                <option value="<?php echo $row["id"] ?>"
                                
                                <?php 
                                if ($row["id"] == $data['Patron4'] ) {echo "selected";}
                                ?>

                                ><?php echo $row["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Uppdatera">
        </form>
</div>
