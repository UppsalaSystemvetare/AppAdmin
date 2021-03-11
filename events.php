<!DOCTYPE html>
<?php 
include("include/models/event_model.php");
include("include/models/faddrar_model.php");
include("include/html/menu.php");
?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>    
<script src="assets/js/events.js"></script>
<script src="assets/js/eventMap.js"></script>

    <div class="btn-group" style="z-index: 2;" role="group" aria-label="Basic example">
        <button class="btn btn-secondary" type="button">Modify Selected Event</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToCreateEvents()">Add New Events</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToTop()">Back To Top</button>
        <button class="btn btn-danger" type="button" id="delete">Delete <i class="fas fa-trash-alt"></i></button>
    </div>
   
    <table class="table table-striped table-bordered table-sm sortable" id="event-table">
        
        <thead id="table-header">
            <tr>
                <th>Select</th>
                <th>Id</th>
                <th>Name Of Event</th>
                <th>Day</th>
                <th>Starting Time</th>
                <th>Location</th>
                <th>Description</th>
                <th>Patron 1</th>
                <th>Patron 2</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php  
                $result = Events::get_events();
                while($row = $result->fetch_assoc()){ ?>
                <tr> 
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                    <td><?php echo $row["Id"]?></td>
                    <td><?php echo $row["Title"]?></td>
                    <td><?php echo $row["DateTime"]?></td>
                    <td><?php echo $row["StartTime"]?></td>
                    <td><?php echo $row["Location"]?></td>
                    <td><?php echo $row["Description"]?></td>
                    <td style="Width:120px;"><?php echo $row["Patron1"]?></td>
                    <td style="Width:120px;"><?php echo $row["Patron2"]?></td>  
                    <td style="Width:90px;">
                        <?php echo 
                        "<button id=" . $row["Id"] .  " class='btn-xs btn_edit'><i class='fas fa-cog'></i></button>" ?>
                    </td>
                    <input class="Id" type="hidden" value="<?php echo $row["Id"] ?>">

                </tr>
            <?php }?>
        </tbody>
    </table>

    <div class="content" id="create-events">
        <h2>Create new event:</h2>
        <form id="add-event" action="include/functions/createEventDB.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Name:</label>
                <input id="title" name="Name" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Name of the event">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="Desc" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Description of the mission"></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input id="location" name="Location" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Location of the event">
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
                <input type="hidden" id="locationCoords" name="LocationCoords" />
                </div>
            <div class="form-check" style="margin-bottom: 15px;">
                <input type="checkbox" class="form-check-input" name="pubrunda" value="is_pubrunda">
                <label class="form-check-label" name="IsPubrunda" for="exampleCheck1">This event is a pubrunda with missions.</label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="datetime">Date:</label>
                        <input class="form-control" name="Date" type="date" id="datetime">
                    </div>
                    <div class="col">
                        <label for="starttime">Time:</label>
                        <input class="form-control" name="Starttime" type="time" id="starttime">
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
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <select name="Patron2" class="form-control" id="patron2">
                            <option value="" selected>Nykterfadder 1</option>
                            <?php 
                                $result = Faddrar::get_users();
                                while($row = $result->fetch_assoc()){ ?>
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        <h1> - OR - </h1>
        <h2>Create multiple new events: (.xls, .xlsx)</h2>
        <form action="include/functions/createEventDB.php" method="post" enctype="multipart/form-data">
            <div class="form-group input-group-lg">
                <input name="FILE" type="file">
            </div> 
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

