
<?php
include("include/models/weekmissions_model.php");
include("include/html/menu.php");
?>

    <div class="btn-group" role="group" aria-label="Basic example">
        <button class="btn btn-secondary" type="button">Modify Mission</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToCreateWeekMissions()">Add New Week Missions</button>
        <button class="btn btn-secondary" type="button" onclick="scrollToTop()">Back To Top</button>
        <button class="btn btn-danger" type="button" id="delete">Delete <i class="fas fa-trash-alt"></i></button>
    </div>
        
    <table class="table table-striped table-bordered table-sm sortable" id="all_missions">
        <thead id="table-header">
            <tr>
                <th>Select</th>
                <th>Id</th>
                <th>Description</th>
                <th>Point value (0 if user-controlled)</th>
                <!-- <th>Ändra</th>
                <th>Ta bort</th> -->
            </tr>
        </thead>

        <tbody id="all_missions_body">

        <?php 
            $result = WeekMissions::get_missions();
            while($row = $result->fetch_assoc()) { 
        ?>
            <tr>
                <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                <td><?php echo $row["Id"]?></td>
                <td><?php echo $row["Description"]?></td>
                <td><?php echo $row["PointValue"]?></td>
                <!-- <td><button class="btn-xs btn-secondary" id="<?php echo $row['Id'] ?>" onclick="change_mission(<?php echo $row['Id'] ?>)">Ändra</button></td>
                <td><button class="btn-xs btn-danger" id="<?php echo $row['Id'] ?>" onclick="delete_mission(<?php echo $row['Id'] ?>)">Ta bort</button></td> -->
                <input class="Id" type="hidden" value="<?php echo $row["Id"] ?>">
            </tr>
        <?php }?>
        
        </tbody>
    </table>
             
    <div class="content" id="create-missions">
        <h2>Create single new week mission:</h2>
            <form action="createWeekMissionsDB.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input id="desc" name="DESC" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Description of the mission">
                </div>
                <div class="form-group">
                    <label for="point">Point Value</label>
                    <input id="point" name="POINTS" type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Poängvärde...">
                </div> 
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        <h1> - OR - </h1>
        <h2>Create multiple new week missions: (.xls, .xlsx)</h2>
            <form action="createWeekMissionsDB.php" method="post" enctype="multipart/form-data">
                <div class="form-group input-group-lg">
                    <input name="FILE" type="file">
                </div> 
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
            </div>     
    </div>
</body>
<script src="assets/js/weekmission.js"></script>
</html>