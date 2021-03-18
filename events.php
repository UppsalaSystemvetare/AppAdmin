<!DOCTYPE html>
<?php 
include("include/models/event_model.php");
include("include/models/faddrar_model.php");
include("include/html/menu.php");
?>

    <div class="btn-group" role="group" aria-label="Basic example">
        <!--<button class="btn btn-secondary" type="button">Modify Selected Event</button> -->
        <button class="btn btn-secondary" type="button" onclick="scrollToCreateEvents()">Lägg till nya events</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToTop()">Tillbaka till toppen</button>
        <button class="btn btn-danger" type="button" id="delete">Ta bort valda <i class="fas fa-trash-alt"></i></button>
    </div>
   
    <table class="table table-striped table-bordered table-sm sortable" id="event-table">
        
        <thead id="table-header">
            <tr>
                <th>Select</th>
                <th>Id</th>
                <th>Namn på event</th>
                <th>Dag</th>
                <th>Klockslag</th>
                <th>Plats</th>
                <th>Beskrivning</th>
                <th>Nykterfadder</th>
                <th>Nykterfadder</th>
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
                    <td style="Width:120px;"><?php echo $row["Patron1"]?></td> <!-- Lägg till så att namnet på nykterfaddrar hämtas, och inte bara id? Och rediger isf width så det funkar -->
                    <td style="Width:120px;"><?php echo $row["Patron2"]?></td>  
                    <td style="Width:50px;">
                        <?php echo 
                        "<a href=\"events_edit.php?id=" . $row["Id"] .  "\"> <button id=" . $row["Id"] .  " class='btn-xs btn_edit'><i class='fas fa-cog'></i></button></a>" ?>
                    </td>
                    <input class="Id" type="hidden" value="<?php echo $row["Id"] ?>">

                </tr>
            <?php }?>
        </tbody>
    </table>

    <div class="content" id="create-events">
        <h2>Skapa ett nytt event:</h2>
        <form id="add-event" action="include/functions/createEventDB.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Namn:</label>
                <input id="title" name="Name" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Namn på eventet">
            </div>
            <div class="form-group">
                <label for="description">Beskrivning:</label>
                <textarea id="description" name="Desc" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Beskrivning av eventet"></textarea>
            </div>
            <div class="form-group">
                <label for="location">Plats:</label>
                <input id="location" name="Location" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Plats för event">
            </div>
            <div class="form-check" style="margin-bottom: 15px;">
                <input type="checkbox" class="form-check-input" name="pubrunda" value="is_pubrunda">
                <label class="form-check-label" name="IsPubrunda" for="exampleCheck1">Detta event är en pubrunda med uppdrag.</label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="datetime">Datum:</label>
                        <input class="form-control" name="Date" type="date" id="datetime">
                    </div>
                    <div class="col">
                        <label for="starttime">Klockslag:</label>
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
            <input class="btn btn-primary" type="submit" value="Skapa">
        </form>
        <h1> - ELLER - </h1>
        <h2>Skapa flera event från en excelfil: (.xls, .xlsx)</h2>
        <form action="include/functions/createEventDB.php" method="post" enctype="multipart/form-data">
            <div class="form-group input-group-lg">
                <input name="FILE" type="file">
            </div> 
            <input class="btn btn-primary" type="submit" value="Skapa flera">
        </form>
    </div>
</body>
    
<script src="assets/js/events.js"></script>
</html>

